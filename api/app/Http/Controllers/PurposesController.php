<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Purpose;

use App\Achievement;

use App\Http\Requests;

class PurposesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purpose = Purpose::all();
        return Response::json(compact('purpose'), 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purpose = Purpose::findOrFail($id);
        return Response::json(compact('purpose'), 200, [], JSON_NUMERIC_CHECK);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreatePurposeRequest $request)
    {
        $purpose = Purpose::create([
            'from_user_id' => $request['from_user_id'],
            'to_user_id' => $request['to_user_id'],
            'message' => $request['message'],
        ]);

        $message = 'La proposition a bien été crée';

        return Response::json(compact('message', 'purpose'), 200, [], JSON_NUMERIC_CHECK);
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
        $purpose = Purpose::findOrFail($id);

        $purpose->from_user_id = $request['from_user_id'];
        $purpose->to_user_id = $request['to_user_id'];
        $purpose->message = $request['message'];

        $purpose->save();

        $message = 'La proposition a bien été édité !';

        return Response::json(compact('message', 'proposition'), 200, [], JSON_NUMERIC_CHECK);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purpose = Purpose::findOrFail($id);
        $purpose->delete();
        $message = 'La proposition a bien été supprimé !';
        return Response::json(compact('message', 'proposition'), 200, [], JSON_NUMERIC_CHECK);
    }
}