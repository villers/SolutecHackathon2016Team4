<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use App\Http\Requests;
use Illuminate\Support\Facades\Response;


class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Notification::all();

        return Response::json(compact('notifications'), [], JSON_NUMERIC_CHECK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateNotificationRequest $request)
    {
        $notification = Notification::create([
            'user_id'  => $request['user_id'],
            'has_read' => $request['has_read'],
            'message'  => $request['message'],
        ]);

        $message = 'La notification a bien été enregistré !';

        return Response::json(compact('message', 'notification'), 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notification = Notification::findOrFail($id);

        return Response::json(compact('notification'), [], JSON_NUMERIC_CHECK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $notification = Notification::findOrFail($id);

        $notification->user_id = $request['user_id'];
        $notification->has_read = $request['has_read'];
        $notification->message = $request['message'];

        $message = 'La catégorie a bien été édité !';

        return Response::json(compact('message', 'notification'), [], JSON_NUMERIC_CHECK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notification = Notification::find($id);

        $notification->delete();

        return response()->json(['status' => 'true', 'message' => 'Notification supprimé !']);
    }
}
