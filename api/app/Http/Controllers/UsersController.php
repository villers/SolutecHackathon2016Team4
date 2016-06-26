<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Achievement;
use Illuminate\Support\Facades\Auth;
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
        $users = User::all();

        return Response::json(compact('users'), 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Store User Achievement
     * @param Request $request
     */
    public function storeAchievement(Request $request)
    {
        $user = User::findOrFail($request['user_id']);

        $user->achievements()->attach($request['achievements_id']);

        $message = 'Le haut-fait a bien été ajouté !';

        return Response::json(compact('message'), 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Show single User
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return Response::json(compact('user'), 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Update user data
     * @param Requests\UpdateUserRequest $request
     * @param $id
     * @return mixed
     */
    public function update(Requests\UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $user->type = $request['type'];
        $user->points = $request['points'];
        $user->last_name = $request['last_name'];
        $user->first_name = $request['first_name'];
        $user->login = $request['login'];
        $user->email = $request['email'];
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
        $user->premium = $request['premium'];
        $user->date_premium = $request["date_premium"];

        if ($request['password']) {
            $user->password = bcrypt($request['password']);
        }

        $message = 'L\'utilisateur a bien été édité !';

        $user->save();

        return Response::json(compact('message', 'user'), 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Destroy user
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        $message = 'L\'utilisateur a bien été supprimé !';

        return Response::json(compact('message', 'user'), 200, [], JSON_NUMERIC_CHECK);
    }
}
