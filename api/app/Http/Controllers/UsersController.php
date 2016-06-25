<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Achievement;
use Illuminate\Support\Facades\Response;


use App\Http\Requests;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

        return response()->json(compact('user'));
    }


    public function add_achievements(Request $request) {


        $user = User::findOrFail($request['user_id']);
        $user->achievements()->attach($request['achievements_id']);
        dd($request['achievements_id']);

    }

    /**
     * TODO : UPDATE
     * TODO : SHOW
     * TODO : DELETE
     * We don't need store, we have RegisterController !!!
     */
}
