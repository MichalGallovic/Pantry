<?php

namespace Tests\Feature;

use App\ShoppingList;
use Tests\ApiTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShoppingListItemApiTest extends ApiTestCase
{
    use RefreshDatabase;

    public function test_shopping_list_items_returns_all_items()
    {
        $shoppingList = factory(ShoppingList::class)->state('with-items')->create();

        $response = $this->get(route('api.shopping-list-items.index'));

        $this->assertResponse($response, $shoppingList->shoppingListItems->toArray());
    }

    public function test_shopping_list_items_with_embedded_relations()
    {
        $shoppingList = factory(ShoppingList::class)->state('with-items')->create();

        $response = $this->json('GET', route('api.shopping-list-items.index'), ['embed' => 'groceries,shoppingList']);

        $this->assertResponse($response, $shoppingList->shoppingListItems->toArray());
    }
}
