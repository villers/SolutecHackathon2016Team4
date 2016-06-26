<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
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
        $achievements = Achievement::all();
        return Response::json(compact('achievements'), 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\CreateAchievementRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateAchievementRequest $request)
    {
        $achievement = Achievement::create([
            "message" => $request["message"],
            "points"  => $request["points"],
            "icon"    => $request["icon"],
        ]);
        $message = 'Le haut-fait a bien été enregistré !';
        return Response::json(compact('message', 'achievement'), 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $achievement = Achievement::findOrFail($id);
        return Response::json(compact('achievement'), 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Requests\CreateAchievementRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CreateAchievementRequest $request, $id)
    {
        $achievement = Achievement::findOrFail($id);
        $achievement->message = $request['message'];
        $achievement->points  = $request['points'];
        $achievement->icon    = $request['icon'];
        $achievement->save();
        $message = 'Le haut-fait a bien été édité !';
        return Response::json(compact('message', 'achievement'), 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $achievement = Achievement::findOrFail($id);
        $achievement->delete();
        $message = 'Le haut-fait a bien été supprimé !';
        return Response::json(compact('message', 'achievement'), 200, [], JSON_NUMERIC_CHECK);
    }
}
