<?php

namespace Tests\Feature;

use App\Shop;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\JsonResponse;
use Tests\ApiTestCase;

class ShopApiTest extends ApiTestCase
{
    use RefreshDatabase;

    public function test_shop_pagination()
    {
        $this->assertPaginationOnRoute(Shop::class, 'api.shops.index');
    }

    public function test_can_retrieve_relations_of_shops()
    {
        $this->withoutExceptionHandling();
        factory(Shop::class)->state('with-groceries')->create();
        $shop = Shop::with('groceries')->first();

        $response = $this->json('GET', route('api.shops.index'), ['embed' => 'groceries']);

        $this->assertResponse($response, [$shop->toArray()]);
    }

    public function test_create_shop()
    {
        $newShop = ['name' => 'Lidl'];

        $response = $this->post(route('api.shops.store'), $newShop);

        $this->assertResponse($response, $newShop, JsonResponse::HTTP_CREATED);
    }

    public function test_cannot_create_duplicate_shops()
    {
        $newShop = ['name' => 'Lidl'];

        $this->post(route('api.shops.store'), $newShop);
        $response = $this->post(route('api.shops.store'), $newShop);

        $this->assertError($response, JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function test_can_retrieve_shop_by_id()
    {
        $shop = factory(Shop::class)->create();

        $response = $this->get(route('api.shops.show', $shop->id));

        $this->assertResponse($response, $shop->toArray());
    }

    public function test_can_retrieve_shop_relations()
    {
        factory(Shop::class)->create();
        $shop = Shop::with('groceries')->first();

        $response = $this->json('GET', route('api.shops.show', $shop->id), ['embed' => 'groceries']);

        $this->assertResponse($response, $shop->toArray());
    }

    public function test_returns_error_on_unknown_shop()
    {
        $response = $this->get(route('api.shops.show', 1));

        $this->assertError($response, JsonResponse::HTTP_NOT_FOUND);
    }

    public function test_update_existing_shop()
    {
        $shop = factory(Shop::class)->create();

        $updateData = ['name' => 'Kaufland'];

        $response = $this->put(route('api.shops.update', $shop->id), $updateData);

        $this->assertResponse($response, array_merge(['id' => $shop->id], $updateData), JsonResponse::HTTP_OK);
    }

    public function test_returns_error_on_updating_unknown_shop()
    {
        $updateData = ['name' => 'Kaufland'];

        $response = $this->put(route('api.shops.update', 1), $updateData);

        $this->assertError($response, JsonResponse::HTTP_NOT_FOUND);
    }

    public function test_deletes_existing_shop()
    {
        $shop = factory(Shop::class)->create();

        $response = $this->delete(route('api.shops.destroy', $shop->id));

        $this->assertSuccess($response, JsonResponse::HTTP_OK);
    }

    public function test_cannot_delete_unknown_shop()
    {
        $response = $this->delete(route('api.shops.destroy', 1));

        $this->assertError($response, JsonResponse::HTTP_NOT_FOUND);
    }
}
