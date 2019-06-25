<?php

namespace Tests\Feature;

use App\UnitType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\ApiTestCase;

class UnitTypeApiTest extends ApiTestCase
{
    use RefreshDatabase;

    public function test_get_all_unit_types()
    {
        $unitTypes = factory(UnitType::class, 10)->create();

        $response = $this->get(route('api.unit-types.index'));

        $this->assertResponse($response, $unitTypes->toArray());
    }
}
