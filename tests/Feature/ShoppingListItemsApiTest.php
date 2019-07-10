<?php

namespace Tests\Feature;

use App\ShoppingList;
use App\ShoppingListItem;
use Tests\ApiTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Traits\WithShoppingList;

class ShoppingListItemsApiTest extends ApiTestCase
{
    use RefreshDatabase, WithShoppingList;

    public function test_cannot_replace_shopping_list_items_with_empty_items()
    {
        $shoppingList = $this->createShoppingListWithItems();

        $response = $this->put(route('api.shopping-list-items.update', $shoppingList->id), []);

        $this->assertError($response);

        $response = $this->put(route('api.shopping-list-items.update', $shoppingList->id), ['items' => []]);

        $this->assertError($response);
    }

    public function test_replace_shopping_list_items_with_different_items()
    {
        $shoppingList = $this->createShoppingListWithItems();

        $response = $this->put(
            route('api.shopping-list-items.update', $shoppingList->id),
            ['items' => collect($shoppingList->items)->slice(0,3)->toArray()]
        );

        $this->assertSuccess($response);

        $updatedItems = ShoppingList::find($shoppingList->id)->items;

        $updatedItems->each(function (ShoppingListItem $item) {
            $this->assertDatabaseHas('shopping_list_items', ['id' => $item->id]);
        });

        $this->assertCount(3, $updatedItems);
    }
}
