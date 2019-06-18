<?php

namespace App\Http\Controllers;

use App\ShoppingList;
 
class ShoppingListAPIController extends Controller
{
    public function index()
    {
        return ShoppingList::all();
    }
 
    public function show($id)
    {
        return ShoppingList::with(['shoppingListItems'])->find($id);
    }

    public function store(Request $request)
    {
        return ShoppingList::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $shoppingList = ShoppingList::findOrFail($id);
        $shoppingList->update($request->all());

        return $shoppingList;
    }

    public function delete(Request $request, $id)
    {
        $shoppingList = ShoppingList::findOrFail($id);
        $shoppingList->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
