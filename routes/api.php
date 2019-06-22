<?php

use App\Http\Controllers\Api\ShopApiController;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
* Snippet for a quick route reference
*/
Route::get('/', function (Router $router) {
    return collect($router->getRoutes()->getRoutesByMethod()["GET"])->map(function($value, $key) {
        return url($key);
    })->values();   
});

Route::name('api.')->group(function () {
//    Route::resource('groceries', 'GroceryAPIController', [
//        'only' => ['index', 'show', 'store', 'update', 'delete']
//    ]);
//
//    Route::resource('recipes', 'RecipeAPIController', [
//        'only' => ['index', 'show', 'store', 'update', 'delete']
//    ]);

    Route::resource('shops', ShopApiController::class, [
        'only' => ['index', 'show', 'store', 'update', 'destroy']
    ]);
//
//    Route::resource('shoppingLists', 'ShoppingListAPIController', [
//        'only' => ['index', 'show', 'store', 'update', 'delete']
//    ]);
//
//    Route::resource('shoppingListItems', 'ShoppingListItemAPIController', [
//        'only' => ['index', 'show', 'store', 'update', 'delete']
//    ]);
});
