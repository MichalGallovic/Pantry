<?php

namespace App\Http\Controllers;

use App\Grocery;
 
class GroceryAPIController extends Controller
{
    public function index()
    {
        return Grocery::all();
    }
 
    public function show($id)
    {
        return Grocery::with(['shop', 'recipes'])->find($id);
    }

    public function store(Request $request)
    {
        return Grocery::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $grocery = Grocery::findOrFail($id);
        $grocery->update($request->all());

        return $grocery;
    }

    public function delete(Request $request, $id)
    {
        $grocery = Grocery::findOrFail($id);
        $grocery->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
