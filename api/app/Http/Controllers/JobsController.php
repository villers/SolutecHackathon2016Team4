<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;


use App\Http\Requests;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job = Job::all();

        return response()->json(compact('job'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateJobRequest $request)
    {
        $job = Job::create([
            "user_id" => $request['user_id'],
            "category_id" => $request['category_id'],
            "country" => $request['country'],
            "city" => $request['city'],
            "postal_code" => $request['postal_code'],
            "entreprise_desc" => $request['entreprise_desc'],
            "message" => $request['message'],
            "lang" => $request['lang'],
            "graduation" => $request['graduation'],
            "salary" => $request['salary'],
        ]);


        $status = true;
        $message = 'Job crée';

        return response()->json(compact('status', 'message', 'job'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $job = Job::find($id);

        $job->user_id = $request['user_id'];
        $job->category_id = $request['category_id'];
        $job->country = $request['country'];
        $job->city = $request['city'];
        $job->postal_code = $request['postal_code'];
        $job->entreprise_desc = $request['entreprise_desc'];
        $job->message = $request['message'];
        $job->lang = $request['lang'];
        $job->graduation = $request['graduation'];
        $job->salary = $request['salary'];

        $job->save();

        return response()->json(['status' => 'true', 'message' => 'Job édité !']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::find($id);

        $job->delete();

        return response()->json(['status' => 'true', 'message' => 'Job supprimé !']);

    }
}
