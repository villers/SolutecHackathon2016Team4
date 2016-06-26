<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Vote;

use App\Http\Requests;

class VotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $votes = Vote::all();

        return Response::json(compact('votes'), 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vote = Vote::findOrFail($id);

        return Response::json(compact('vote'), 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Requests\UpdateVoteRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UpdateVoteRequest $request, $id)
    {
        $vote = Vote::findOrFail($id);

        $vote->user_id = $request['user_id'];
        $vote->note = $request['note'];

        $vote->save();

        $message = 'Le vote a bien été édité !';

        return Response::json(compact('message', 'vote'), 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\CreateVoteRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateVoteRequest $request)
    {
        $vote = Vote::create([
            'user_id' => $request['user_id'],
            'note'    => $request['note'],
        ]);

        $message = 'Le vote a bien été crée';

        return Response::json(compact('message', 'vote'), 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vote = Vote::findOrFail($id);

        $vote->delete();

        $message = 'Le vote a bien été supprimé !';

        return Response::json(compact('message', 'vote'), 200, [], JSON_NUMERIC_CHECK);
    }
}
