<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests;
use Illuminate\Support\Facades\Response;
use DB;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $categories = Category::all();

        return Response::json(compact('categories'),200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\CreateCategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateCategoryRequest $request)
    {
        $category = Category::create(['name' => $request['name']]);

        $message = 'La catégorie a bien été enregistré !';

        return Response::json(compact('message', 'category'),200,[], JSON_NUMERIC_CHECK);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);

        return Response::json(compact('category'), 200, [], JSON_NUMERIC_CHECK);
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
        $category = Category::findOrFail($id);

        $category->message = $request['name'];

        $category->save();

        $message = 'La catégorie a bien été édité !';

        return Response::json(compact('message', 'category'), 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        $message = 'La catégorie a bien été supprimé !';

        return Response::json(compact('message', 'category'), 200, [], JSON_NUMERIC_CHECK);
    }
}
