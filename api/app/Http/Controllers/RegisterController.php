<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


use App\Http\Requests;

class RegisterController extends Controller
{


        public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Requests\CreateUserRequest $request) {
        $confirmation_code = str_random(30);

        $user = User::create([
                'first_name' => $request['first_name'],
                'last_name' => $request['last_name'],
                'login' => $request['login'],
                'email' => $request['email'],
                'password' => \Hash::make($request['password']),
                'country' => $request['country'],
                'city' => $request['city'],
                'postal_code' => $request['postal_code'],
                'address_number' => $request['address_number'],
                'address' => $request['address'],
                'type' => $request['type'],
                'is_active' => 0,
                'token_active' => $confirmation_code,
            ]);

            $status = true;
            $message = 'Vous êtes inscrit';

            return response()->json(compact('status', 'message', 'user'));
    }

    public function active_account($data){

        $user = User::where('token_active', $data)->first();

            $user->is_active = 1;
            $user->token_active = 0;
            $user->save();

            return response()->json(compact(['status' => false, 'message' => 'Erreur token']));
    }
}
