<?php

namespace App\Http\Controllers;

use App\Recipe;
 
class RecipeAPIController extends Controller
{
    public function index()
    {
        return Recipe::all();
    }
 
    public function show($id)
    {
        return Recipe::with(['groceries'])->find($id);
    }

    public function store(Request $request)
    {
        return Recipe::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->update($request->all());

        return $recipe;
    }

    public function delete(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
