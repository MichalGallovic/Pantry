<?php

namespace Tests\Feature;

use App\Shop;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\JsonResponse;
use Tests\ApiTestCase;

class ShopApiTest extends ApiTestCase
{
    use RefreshDatabase;

    public function test_shop_pagination()
    {
        /** @var Collection $shops */
        $shops = factory(Shop::class, 20)->create();

        $response = $this->get(route('api.shops.index'));

        $this->assertResponse($response, collect($shops)->slice(0, 10)->values()->toArray());

        $response = $this->json('GET', route('api.shops.index'), ['page' => 2]);

        $this->assertResponse($response, collect($shops)->slice(10, 20)->values()->toArray());
    }

    public function test_create_shop()
    {
        $newShop = ['name' => 'Lid'];

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
