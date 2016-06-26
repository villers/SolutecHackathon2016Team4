<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;
use App\Jobs\SendMail;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthenticateController extends Controller
{
    const PUBLIC_REDIRECTION = 'http://localhost:3002';

    public function __construct()
    {
        // Apply the jwt.auth middleware to all methods in this controller
        // except for the authenticate method. We don't want to prevent
        // the user from retrieving their token if they don't already have it
        $this->middleware('jwt.auth', ['except' => ['postLogin', 'postRegister', 'getActive']]);
    }

    /**
     * Return a JSON Web Token for authentication
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postLogin(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');
            $token = JWTAuth::attempt($credentials);

            // Verify the credentials / create a token for the user
            if (!$token) {
                throw new JWTException('Ce compte n\'existe pas ou les informations sont erronées', 401);
            }

            $user = User::where('email', $credentials['email'])->firstOrFail();

            if (!$user['attributes']['is_active']) {
                throw new JWTException('Ce compte n\'est pas activé.', 401);
            }

            return Response::json(compact('token', 'user'), 200, [], JSON_NUMERIC_CHECK);

        } catch (JWTException $e) {
            // When wrong
            return Response::json(['error' => $e->getMessage()], $e->getStatusCode(), [], JSON_NUMERIC_CHECK);
        }
    }

    /**
     * Register user account
     * @param Requests\CreateUserRequest $request
     * @return mixed
     */
    public function postRegister(Requests\CreateUserRequest $request)
    {
        $confirmation_code = str_random(30);

        $user = User::create([
            'first_name'     => $request['first_name'],
            'last_name'      => $request['last_name'],
            'login'          => $request['login'],
            'email'          => $request['email'],
            'password'       => \Hash::make($request['password']),
            'country'        => $request['country'],
            'city'           => $request['city'],
            'postal_code'    => $request['postal_code'],
            'address_number' => $request['address_number'],
            'address'        => $request['address'],
            'is_active'      => 0,
            'token_active'   => $confirmation_code,


            //  ++++++++  Modifications a partir d'ici (ci dessous) ++++++++++++


            'graduation'   => $request['graduation'],
            'lang'         => $request['lang'],
            'can_drive'    => $request['can_drive'],
            'phone_number' => $request['phone_number'],
        ]);

        /*
         *
         *            +++++++++++++    POSTS A VERIFIER CI DESSUS !!! ++++++++++++++++
         *
         *
         */

        $message = 'Félicitation, votre inscription a bien été pris en compte !';

        $this->dispatch(new SendMail($user));

        return Response::json(compact('message', 'user'), 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Consume token
     * @param {String} $data
     * @return mixed
     */
    public function getActive($data)
    {
        $user = User::where('token_active', $data)->firstOrFail();

        $user->is_active = 1;
        $user->token_active = 0;
        $user->save();

        return redirect(self::PUBLIC_REDIRECTION);
    }

    /**
     * Get authenticate user information
     * @return mixed
     */
    public function getMe()
    {
        $user = Auth::user()->with('achievements', 'notifications', 'votes')->get();

        return Response::json($user[Auth::user()->id - 1], 200, [], JSON_NUMERIC_CHECK);
    }
}
