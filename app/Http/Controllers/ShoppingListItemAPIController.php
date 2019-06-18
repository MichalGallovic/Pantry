<?php

namespace App\Http\Controllers;

use App\ShoppingListItem;
 
class ShoppingListItemAPIController extends Controller
{
    public function index()
    {
        return ShoppingListItem::all();
    }
 
    public function show($id)
    {
        return ShoppingListItem::with(['shoppingList'])->find($id);
    }

    public function store(Request $request)
    {
        return ShoppingListItem::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $shoppingListItem = ShoppingListItem::findOrFail($id);
        $shoppingListItem->update($request->all());

        return $shoppingListItem;
    }

    public function delete(Request $request, $id)
    {
        $shoppingListItem = ShoppingListItem::findOrFail($id);
        $shoppingListItem->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
