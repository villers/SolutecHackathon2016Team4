<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;


class AuthenticateController extends Controller
{
    public function __construct()
    {
        // Apply the jwt.auth middleware to all methods in this controller
        // except for the authenticate method. We don't want to prevent
        // the user from retrieving their token if they don't already have it
        $this->middleware('jwt.auth', ['except' => ['authenticate']]);
    }

    /**
     * Return a JWT
     **/
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            // verify the credentials / create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['status'=> false, 'error' => 'Ce compte n\'existe pas ou les informations sont erronées'], 401);
            }
        } catch (JWTException $e) {
            // when wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        // if no errors return a JWT
        $status = true;


        $user = User::where('email', $credentials['email'])->first();
        return response()->json(compact('status', 'token', 'user'));
    }

    public function active_account($data){

        $user = User::where('token_active', $data)->first();

        $user->active = 1;
        $user->token_active = 0;
        $user->save();

        return response()->json(compact(['status' => true, 'message' => 'Compte activé, vous pouvez vous connecter !']));

    }
}
