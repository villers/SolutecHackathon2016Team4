<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use Illuminate\Support\Facades\Response;



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
        $jobs = Job::all();

        return Response::json(compact('jobs'), 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateJobRequest $request)
    {
        $job = Job::create([
            'user_id'         => $request['user_id'],
            'category_id'     => $request['category_id'],
            'country'         => $request['country'],
            'city'            => $request['city'],
            'postal_code'     => $request['postal_code'],
            'entreprise_desc' => $request['entreprise_desc'],
            'message'         => $request['message'],
            'lang'            => $request['lang'],
            'graduation'      => $request['graduation'],
            'salary'          => $request['salary'],
        ]);

        $message = 'Le job a bien été enregistré';

        return Response::json(compact('message', 'job'), 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::findOrFail($id);

        return Response::json(compact('job'), 200, [], JSON_NUMERIC_CHECK);
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
        $job = Job::findOrFail($id);

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

        $message = 'Le job a bien été édité !';

        return Response::json(compact('message', 'job'), 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::findOrFail($id);

        $job->delete();

        $message = 'Le job a bien été supprimé !';

        return Response::json(compact('message', 'job'), 200, [], JSON_NUMERIC_CHECK);
    }
}
