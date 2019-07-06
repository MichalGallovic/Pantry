<?php

namespace Tests\Feature;

use App\Shop;
use Tests\ApiTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShopGroceriesApiTest extends ApiTestCase
{
    use RefreshDatabase;

    public function test_shop_groceries_pagination()
    {
        $shop = factory(Shop::class)->state('with-groceries')->create();

        $response = $this->get(route('api.shops.groceries.index', $shop->id));

        $this->assertResponse($response, $shop->groceries->slice(0, 10)->values()->toArray());

        $response = $this->json('GET', route('api.shops.groceries.index', $shop->id), ['page' => 2]);

        $this->assertResponse($response, $shop->groceries->slice(10, 10)->values()->toArray());
    }
}
