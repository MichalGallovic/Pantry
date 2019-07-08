<?php

namespace Tests\Feature;

use App\Grocery;
use App\ShoppingList;
use App\ShoppingListItem;
use Illuminate\Http\JsonResponse;
use Tests\ApiTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShoppingListApiTest extends ApiTestCase
{
    use RefreshDatabase;

    public function test_shopping_list_pagination()
    {
        $this->assertPaginationOnRoute(ShoppingList::class, 'api.shopping-lists.index');
    }

    public function test_shopping_list_embedded_relations()
    {
        factory(ShoppingList::class)->state('with-items')->create();

        $grocery = ShoppingList::with('items')->first();
        $grocery->items = $grocery->items->makeHidden(['shopping_list_id', 'grocery_id'])->toArray();

        $response = $this->json('GET', route('api.shopping-lists.index'), ['embed' => 'items']);

        $this->assertResponse($response, [$grocery->toArray()]);
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
        $shoppingList->items = $shoppingList->items->makeHidden(['grocery_id', 'shopping_list_id'])->toArray();

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

    /**
     * @return array
     */
    private function makeShoppingListWithItems()
    {
        /** @var array */
        $newShoppingList = factory(ShoppingList::class)->make();
        $noGroceryItems  = factory(ShoppingListItem::class, 5)->make();
        $groceryItems    = factory(ShoppingListItem::class, 5)
            ->state('with-grocery')
            ->make()
            ->map(function (ShoppingListItem $item) {
                return [
                    'order'      => $item->order,
                    'completed'  => $item->completed,
                    'grocery_id' => $item->grocery_id
                ];
            });

        $newShoppingList->items = $groceryItems->concat($noGroceryItems)->toArray();

        return $newShoppingList->toArray();
    }
}
