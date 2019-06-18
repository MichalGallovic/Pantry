<?php

namespace App\Http\Controllers;

use App\Shop;
 
class ShopAPIController extends Controller
{
    public function index()
    {
        return Shop::all();
    }
 
    public function show($id)
    {
        return Shop::with(['groceries'])->find($id);
    }

    public function store(Request $request)
    {
        return Shop::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $shop = Shop::findOrFail($id);
        $shop->update($request->all());

        return $shop;
    }

    public function delete(Request $request, $id)
    {
        $shop = Shop::findOrFail($id);
        $shop->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
