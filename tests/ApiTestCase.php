<?php

namespace Tests;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\TestResponse;
use Illuminate\Http\JsonResponse;

class ApiTestCase extends TestCase
{
    /**
     * Asserts successful json response with structure and data
     *
     * @param TestResponse $response
     * @param array $jsonData
     * @param int $statusCode
     */
    protected function assertResponse(TestResponse $response, array $jsonData, $statusCode = JsonResponse::HTTP_OK)
    {
        $response
            ->assertStatus($statusCode)
            ->assertJson([
                'data' => $jsonData
            ]);
    }

    /**
     * @param TestResponse $response
     * @param int          $statusCode
     */
    protected function assertError(TestResponse $response, $statusCode = JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
    {
        $response
            ->assertStatus($statusCode)
            ->assertJsonStructure(['error']);
    }

    /**
     * @param TestResponse $response
     * @param int          $statusCode
     */
    protected function assertSuccess(TestResponse $response, $statusCode = JsonResponse::HTTP_OK)
    {
        $response
            ->assertStatus($statusCode)
            ->assertJsonStructure(['success']);
    }

    /**
     * @param string $modelName
     * @param string $routeName
     */
    protected function assertPaginationOnRoute($modelName, $routeName)
    {
        /** @var Collection $models */
        $models = factory($modelName, 20)->create();

        $response = $this->get(route($routeName));

        $this->assertResponse($response, collect($models)->slice(0, 10)->values()->toArray());

        $response = $this->json('GET', route($routeName), ['page' => 2]);

        $this->assertResponse($response, collect($models)->slice(10, 20)->values()->toArray());
    }
}
