<?php

use App\Http\Controllers\Api\GroceryApiController;
use App\Http\Controllers\Api\RecipeApiController;
use App\Http\Controllers\Api\SettingsApiController;
use App\Http\Controllers\Api\ShopApiController;
use App\Http\Controllers\Api\ShopGroceriesApiController;
use App\Http\Controllers\Api\ShoppingListItemApiController;
use App\Http\Controllers\Api\ShoppingListItemsOrderApiController;
use App\Http\Controllers\Api\UnitTypeApiController;
use App\Http\Controllers\Api\ShoppingListApiController;
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

    Route::put('shopping-lists/items/order', [ShoppingListItemsOrderApiController::class, 'update'])
        ->name('shopping-list-items.order.update');

    Route::resource('shopping-lists/items', ShoppingListItemApiController::class, [
        'only' => ['index', 'store', 'update', 'destroy'],
        'names' => [
            'index' => 'shopping-list-items.index',
            'store' => 'shopping-list-items.store',
            'update' => 'shopping-list-items.update',
            'destroy' => 'shopping-list-items.destroy'
        ]
    ]);

    Route::resource('shopping-lists', ShoppingListApiController::class, [
        'only' => ['index', 'show', 'store', 'update', 'destroy']
    ]);

    Route::get('settings', ['uses' => SettingsApiController::class, 'as' => 'settings.index']);
});
