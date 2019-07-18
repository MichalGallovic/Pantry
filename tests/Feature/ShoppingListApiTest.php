<?php

namespace Tests\Feature;

use App\Grocery;
use App\ShoppingList;
use App\ShoppingListItem;
use Illuminate\Http\JsonResponse;
use Tests\ApiTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Traits\WithShoppingList;

class ShoppingListApiTest extends ApiTestCase
{
    use RefreshDatabase, WithShoppingList;

    public function test_shopping_list_pagination()
    {
        $this->assertPaginationOnRoute(ShoppingList::class, 'api.shopping-lists.index');
    }

    public function test_show_shopping_list_embedded_items_with_groceries_relations()
    {
        $shoppingList = factory(ShoppingList::class)->state('with-grocery-items')->create();

        $response = $this->json('GET', route('api.shopping-lists.show', $shoppingList->id), ['embed' => 'items-with-groceries']);

        $this->assertResponse($response, $shoppingList->toArray());
    }

    public function test_create_shopping_list()
    {
        $newShoppingList = $this->makeShoppingListWithItems();

        $response = $this->post(route('api.shopping-lists.store'), $newShoppingList);

        $shoppingList = ShoppingList::first();

        $this->assertResponse(
            $response,
            ['id' => $shoppingList->id, 'name' => $shoppingList->name, 'items_count' => 10],
            JsonResponse::HTTP_CREATED
        );
    }

    public function test_cannot_create_duplicate_shopping_lists()
    {
        $newShoppingList = $this->makeShoppingListWithItems();

        $this->post(route('api.shopping-lists.store'), $newShoppingList);
        $response = $this->post(route('api.shopping-lists.store'), $newShoppingList);

        $this->assertError($response, JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function test_can_retrieve_shopping_list_by_id()
    {
        $shoppingList = factory(ShoppingList::class)->create();

        $response = $this->get(route('api.shopping-lists.show', $shoppingList->id));

        $this->assertResponse($response, $shoppingList->toArray());
    }

    public function test_can_retrieve_shopping_list_relations()
    {
        factory(ShoppingList::class)->state('with-items')->create();
        $shoppingList = ShoppingList::with('items')->first();
        $shoppingList['items'] = $shoppingList->items->makeHidden(['grocery_id', 'shopping_list_id'])->toArray();

        $response = $this->json('GET', route('api.shopping-lists.show', $shoppingList->id), ['embed' => 'items']);

        $this->assertResponse($response, $shoppingList->toArray());
    }

    public function test_returns_error_on_unknown_shopping_list()
    {
        $response = $this->get(route('api.shopping-lists.show', 1));

        $this->assertError($response, JsonResponse::HTTP_NOT_FOUND);
    }

    public function test_update_existing_shopping_list()
    {
        $shoppingList = factory(ShoppingList::class)->create();

        $updateData = ['name' => 'Updated shopping list'];

        $response = $this->put(route('api.shopping-lists.update', $shoppingList->id), $updateData);

        $this->assertResponse($response, array_merge(['id' => $shoppingList->id], $updateData), JsonResponse::HTTP_OK);
    }

    public function test_returns_error_on_updating_unknown_shopping_list()
    {
        $updateData = ['name' => 'Desired update'];

        $response = $this->put(route('api.shopping-lists.update', 1), $updateData);

        $this->assertError($response, JsonResponse::HTTP_NOT_FOUND);
    }

    public function test_deletes_existing_shopping_list()
    {
        $shoppingList = factory(ShoppingList::class)->state('with-items')->create();

        $response = $this->delete(route('api.shopping-lists.destroy', $shoppingList->id));

        $this->assertSuccess($response, JsonResponse::HTTP_OK);
        $this->assertDatabaseMissing('shopping_list_items', ['shopping_list_id' => $shoppingList->id]);
    }

    public function test_cannot_delete_unknown_shopping_list()
    {
        $response = $this->delete(route('api.shopping-lists.destroy', 1));

        $this->assertError($response, JsonResponse::HTTP_NOT_FOUND);
    }
}
