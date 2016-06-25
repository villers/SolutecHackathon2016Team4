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

    public function show($id)
    {
        $user = User::findOrFail($id);

        return response()->json(compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->type = $request['type'];
        $user->points = $request['points'];
        $user->last_name = $request['last_name'];
        $user->first_name = $request['first_name'];
        $user->login = $request['login'];
        $user->email = $request['email'];
        $user->password = $request['password'];
        $user->country = $request['country'];
        $user->city = $request['city'];
        $user->postal_code = $request['postal_code'];
        $user->address_number = $request['address_number'];
        $user->address = $request['address'];
        $user->is_active = $request['is_active'];
        $user->token_active = $request['token_active'];
        $user->updated_at = $request['updated_at'];
        $user->graduation = $request['graduation'];
        $user->lang = $request['lang'];
        $user->can_drive = $request['can_drive'];

        $message = "Success: User updated";

        $user->save();
        return response()->json(compact('message', 'user'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return response()->json(['status' => 'true', 'message' => 'Success: User deleted']);
    }
}
