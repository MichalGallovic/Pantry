<?php

namespace Tests\Feature;

use App\Grocery;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\JsonResponse;
use Tests\ApiTestCase;

class GroceryApiTest extends ApiTestCase
{
    use RefreshDatabase;

    public function test_grocery_pagination()
    {
        $this->assertPaginationOnRoute(Grocery::class, 'api.groceries.index');
    }

    public function test_grocery_embedded_relations()
    {
        factory(Grocery::class)->create();

        $grocery = Grocery::with(['unitType', 'shop'])->first();

        $response = $this->json('GET', route('api.groceries.index'), ['embed' => 'unit-type,shop']);

        $this->assertResponse($response, [$grocery->toArray()]);
    }

    public function test_create_grocery()
    {
        /** @var array */
        $newGrocery = factory(Grocery::class)->make();

        $response = $this->post(route('api.groceries.store'), $newGrocery->makeVisible(['shop_id', 'unit_type_id'])->toArray());

        $this->assertResponse($response, $newGrocery->makeHidden(['shop_id', 'unit_type_id'])->toArray(), JsonResponse::HTTP_CREATED);
    }

    public function test_cannot_create_grocery_with_invalid_data()
    {
        $newGrocery = ['name' => 'Just new food'];

        $response = $this->post(route('api.groceries.store'), $newGrocery);

        $this->assertError($response, JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function test_can_retrieve_grocery_by_id()
    {
        $grocery = factory(Grocery::class)->create();

        $response = $this->get(route('api.groceries.show', $grocery->id));

        $this->assertResponse($response, $grocery->toArray());
    }

    public function test_can_retrieve_single_grocery_relations()
    {
        factory(Grocery::class)->create();
        $grocery = Grocery::with('shop')->first();

        $response = $this->json('GET', route('api.groceries.show', $grocery->id), ['embed' => 'unit-type,shop']);

        $this->assertResponse($response, $grocery->toArray());
    }

    public function test_returns_error_on_unknown_grocery()
    {
        $response = $this->get(route('api.groceries.show', 1));

        $this->assertError($response, JsonResponse::HTTP_NOT_FOUND);
    }

    public function test_update_existing_grocery()
    {
        $grocery = factory(Grocery::class)->create();

        $grocery->name = 'New food';

        $response = $this->put(route('api.groceries.update', $grocery->id), $grocery->makeVisible(['shop_id', 'unit_type_id'])->toArray());

        $this->assertResponse($response, $grocery->makeHidden(['shop_id', 'unit_type_id'])->toArray(), JsonResponse::HTTP_OK);
    }

    public function test_returns_error_on_updating_unknown_grocery()
    {
        $updateData = ['name' => 'New Food'];

        $response = $this->put(route('api.shops.update', 1), $updateData);

        $this->assertError($response, JsonResponse::HTTP_NOT_FOUND);
    }

    public function test_deletes_existing_grocery()
    {
        $grocery = factory(Grocery::class)->create();

        $response = $this->delete(route('api.groceries.destroy', $grocery->id));

        $this->assertSuccess($response, JsonResponse::HTTP_OK);
    }

    public function test_cannot_delete_unknown_grocery()
    {
        $response = $this->delete(route('api.groceries.destroy', 1));

        $this->assertError($response, JsonResponse::HTTP_NOT_FOUND);
    }
}
