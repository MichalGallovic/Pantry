<?php

namespace Tests\Feature;

use App\Place;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\JsonResponse;
use Tests\ApiTestCase;

class PlaceApiTest extends ApiTestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    public function test_get_all_places()
    {
        $places = factory(Place::class, 10)->create();

        $response = $this->get(route('api.places.index'));

        $this->assertResponse($response, $places->toArray());
    }

    public function test_create_place()
    {
        $place = factory(Place::class)->make();

        $response = $this->post(route('api.places.store'), $place->toArray());

        $this->assertResponse($response, $place->toArray(), JsonResponse::HTTP_CREATED);
    }

    public function test_cannot_create_place_with_invalid_data()
    {
        $place = ['not_a_name' => 'Not really a name'];

        $response = $this->post(route('api.places.store'), $place);

        $this->assertError($response);
    }

    public function test_can_update_existing_place()
    {
        $place = factory(Place::class)->create();

        $updateData = ['name' => 'New name'];

        $response = $this->put(route('api.places.update', $place->id), $updateData);

        $this->assertResponse($response, ['id' => $place->id] + $updateData);
    }

    public function test_returns_error_on_updating_unknown_place()
    {
        $updateData = ['name' => 'Some name'];

        $response = $this->put(route('api.places.update', 1), $updateData);

        $this->assertError($response, JsonResponse::HTTP_NOT_FOUND);
    }

    public function test_deletes_existing_place()
    {
        $place = factory(Place::class)->create();

        $response = $this->delete(route('api.places.destroy', $place->id));

        $this->assertSuccess($response, JsonResponse::HTTP_OK);
        $this->assertDatabaseMissing('places', ['id' => $place->id]);
    }

    public function test_cannot_delete_unknown_place()
    {
        $response = $this->delete(route('api.places.destroy', 1));

        $this->assertError($response, JsonResponse::HTTP_NOT_FOUND);
    }
}
