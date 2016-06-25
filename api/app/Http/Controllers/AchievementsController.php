<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Achievement;

use App\Http\Requests;

class AchievementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $achievement = Achievement::all();
        return response()->json(compact('achievement'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateAchievementRequest $request)
    {
        $achievement = Achievement::create([
            "message" => $request["message"],
            "points" => $request["points"],
            "icon" => $request["icon"]
            ]);
        $status = true;
        $message = 'Haut-fait crée !';
        return response()->json(compact('status', 'message', 'achievement'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $achievement = Achievement::findOrFail($id);
        return response()->json(compact('achievement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CreateAchievementRequest $request, $id)
    {
        $achievement = Achievement::findOrFail($id);
        $achievement->message = $request['message'];
        $achievement->points = $request['points'];
        $achievement->icon = $request['icon'];
        $achievement->save();
        return response()->json(['status' => 'true', 'message' => 'Haut-fait édité !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $achievement = Achievement::findOrFail($id);
        $achievement->delete();
        return response()->json(['status' => 'true', 'message' => 'Haut-fait supprimé !']);
    }
}
