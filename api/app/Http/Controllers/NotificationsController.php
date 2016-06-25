<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;

use App\Http\Requests;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notification = Notification::all();
        return response()->json(compact('notification'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateNotificationRequest $request)
    {
        $notification = Notification::create([
            "user_id" => $request['user_id'],
            "has_read" => $request['has_read'],
            "message" => $request['message'],
            ]);
        $status = true;
        $message = 'Notification crée !';
        return response()->json(compact('status', 'message', 'notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notification = Notification::findOrFail($id);
        return response()->json(compact('notification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $notification = Notification::findOrFail($id);
        $notification->user_id = $request['user_id'];
        $notification->has_read = $request['has_read'];
        $notification->message = $request['message'];
        $notification->save();
        return response()->json(['status' => 'true', 'message' => 'notification édité !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notification = Notification::find($id);
        $notification->delete();
        return response()->json(['status' => 'true', 'message' => 'Notification supprimé !']);
    }
}
