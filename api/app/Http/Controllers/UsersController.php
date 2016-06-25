<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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

    /**
     * TODO : UPDATE
     * TODO : SHOW
     * TODO : DELETE
     * We don't need store, we have RegisterController !!!
     */
}
