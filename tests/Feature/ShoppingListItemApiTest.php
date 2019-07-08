<?php

namespace Tests\Feature;

use App\ShoppingList;
use App\ShoppingListItem;
use Illuminate\Http\JsonResponse;
use Tests\ApiTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShoppingListItemApiTest extends ApiTestCase
{
    use RefreshDatabase;

    public function test_shopping_list_items_returns_all_items()
    {
        $shoppingList = factory(ShoppingList::class)->state('with-items')->create();

        $response = $this->get(route('api.shopping-list-items.index'));

        $this->assertResponse($response, $shoppingList->items->makeHidden(['grocery_id', 'shopping_list_id'])->toArray());
    }

    public function test_shopping_list_items_with_embedded_relations()
    {
        factory(ShoppingList::class)->state('with-items')->create();
        $shoppingListItems = ShoppingListItem::with(['grocery', 'shoppingList'])->get();

        $response = $this->json('GET', route('api.shopping-list-items.index'), ['embed' => 'grocery,shopping-list']);

        $this->assertResponse($response, $shoppingListItems->toArray());
    }

    public function test_create_shopping_list_item_without_grocery()
    {
        $shoppingList = factory(ShoppingList::class)->create();
        $newShoppingListItem = factory(ShoppingListItem::class)->make(['shopping_list_id' => $shoppingList->id]);

        $response = $this->post(route('api.shopping-list-items.store'), $newShoppingListItem->toArray());

        $this->assertResponse($response, $newShoppingListItem->toArray(), JsonResponse::HTTP_CREATED);
    }

    public function test_cannot_create_shopping_list_item_with_grocery_and_name_undefined()
    {
        $shoppingList = factory(ShoppingList::class)->create();
        $newShoppingListItem = factory(ShoppingListItem::class)
            ->make(['shopping_list_id' => $shoppingList->id, 'name' => null]);

        $response = $this->post(route('api.shopping-list-items.store'), $newShoppingListItem->toArray());

        $this->assertError($response);
    }

    public function test_create_shopping_list_item_with_grocery_item()
    {
        $shoppingList = factory(ShoppingList::class)->create();
        $newShoppingListItem = factory(ShoppingListItem::class)
            ->state('with-grocery')
            ->make(['shopping_list_id' => $shoppingList->id]);

        $response = $this->post(route('api.shopping-list-items.store'), $newShoppingListItem->toArray());

        $this->assertResponse($response, $newShoppingListItem->toArray(), JsonResponse::HTTP_CREATED);
    }

    public function test_update_existing_shopping_list_item()
    {
        $shoppingList = factory(ShoppingList::class)->create();
        $shoppingListItem = factory(ShoppingListItem::class)->create(['shopping_list_id' => $shoppingList->id]);

        $shoppingListItem['name'] = 'Updated shopping stuff';

        $response = $this->put(route('api.shopping-list-items.update', $shoppingListItem->id), $shoppingListItem->toArray());

        $this->assertResponse($response, $shoppingListItem->toArray(), JsonResponse::HTTP_OK);
    }

    public function test_returns_error_on_updating_unknown_shopping_list_item()
    {
        $updateData = ['name' => 'Updated shopping stuff'];

        $response = $this->put(route('api.shopping-list-items.update', 1), $updateData);

        $this->assertError($response, JsonResponse::HTTP_NOT_FOUND);
    }

    public function test_deletes_existing_shopping_list_item()
    {
        $shoppingList = factory(ShoppingList::class)->create();
        $shoppingListItem = factory(ShoppingListItem::class)->create(['shopping_list_id' => $shoppingList->id]);

        $response = $this->delete(route('api.shopping-list-items.destroy', $shoppingListItem->id));

        $this->assertSuccess($response, JsonResponse::HTTP_OK);
        $this->assertDatabaseMissing('shopping_list_items', ['shopping_list_id' => $shoppingListItem->id]);
    }

    public function test_cannot_delete_unknown_shopping_list()
    {
        $response = $this->delete(route('api.shopping-list-items.destroy', 1));

        $this->assertError($response, JsonResponse::HTTP_NOT_FOUND);
    }
}
