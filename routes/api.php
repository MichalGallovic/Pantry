<?php

use App\Http\Controllers\Api\GroceryApiController;
use App\Http\Controllers\Api\PlaceApiController;
use App\Http\Controllers\Api\RecipeApiController;
use App\Http\Controllers\Api\SettingsApiController;
use App\Http\Controllers\Api\ShopApiController;
use App\Http\Controllers\Api\ShopGroceriesApiController;
use App\Http\Controllers\Api\ShoppingListItemApiController;
use App\Http\Controllers\Api\ShoppingListItemsOrderApiController;
use App\Http\Controllers\Api\UnitTypeApiController;
use App\Http\Controllers\Api\ShoppingListApiController;
use App\Http\Controllers\Api\ShoppingListItemsApiController;
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

    Route::get('shops/{id}/groceries', ['uses' => ShopGroceriesApiController::class, 'as' => 'shops.groceries.index']);
    Route::resource('shops', ShopApiController::class, [
        'only' => ['index', 'show', 'store', 'update', 'destroy']
    ]);

    Route::resource('groceries', GroceryApiController::class, [
        'only' => ['index', 'show', 'store', 'update', 'destroy']
    ]);

    Route::resource('unit-types', UnitTypeApiController::class, [
        'only' => ['index', 'show']
    ]);

    Route::resource('recipes', RecipeApiController::class, [
        'only' => ['index', 'show', 'store', 'update', 'destroy']
    ]);

    Route::put('shopping-lists/{id}/items', [ShoppingListItemsApiController::class, 'update'])
        ->name('shopping-list-items.update');

    Route::put('shopping-lists/items/order', [ShoppingListItemsOrderApiController::class, 'update'])
        ->name('shopping-lists-items.order.update');

    Route::resource('shopping-lists/items', ShoppingListItemApiController::class, [
        'only' => ['index', 'store', 'update', 'destroy'],
        'names' => [
            'index' => 'shopping-lists-items.index',
            'store' => 'shopping-lists-items.store',
            'update' => 'shopping-lists-items.update',
            'destroy' => 'shopping-lists-items.destroy'
        ]
    ]);

    Route::resource('shopping-lists', ShoppingListApiController::class, [
        'only' => ['index', 'show', 'store', 'update', 'destroy']
    ]);

    Route::get('settings', ['uses' => SettingsApiController::class, 'as' => 'settings.index']);

    Route::resource('places', PlaceApiController::class, [
        'only' => ['index', 'store', 'update', 'destroy']
    ]);
});
