<?php

namespace Tests\Feature;

use App\Grocery;
use App\Recipe;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Tests\ApiTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RecipeApiTest extends ApiTestCase
{
    use RefreshDatabase;

    public function test_recipe_pagination()
    {
        $this->assertPaginationOnRoute(Recipe::class, 'api.recipes.index');
    }

    public function test_can_retrieve_relations_of_recipes()
    {
        factory(Recipe::class)->create();
        $shop = Recipe::with('groceries')->first();

        $response = $this->json('GET', route('api.recipes.index'), ['embed' => 'groceries']);

        $this->assertResponse($response, [$shop->toArray()]);
    }

    public function test_create_valid_recipe()
    {
        /** @var array */
        $newRecipe = factory(Recipe::class)->make()->toArray();
        $newGroceries = $this->mapGroceriesToRequest(factory(Grocery::class, 10)->create());

        $newRecipe['groceries'] = $newGroceries;

        $response = $this->post(route('api.recipes.store'), $newRecipe);

        unset($newRecipe['groceries']);

        $this->assertResponse($response, $newRecipe, JsonResponse::HTTP_CREATED);
        $this->assertDatabaseHas('grocery_recipe', ['recipe_id' => $response->json()['data']['id']]);
    }

    public function test_cannot_create_recipe_without_groceries()
    {
        /** @var array */
        $newRecipe = factory(Recipe::class)->make()->toArray();

        $newRecipe['groceries'] = [];

        $response = $this->post(route('api.recipes.store'), $newRecipe);

        $this->assertError($response);
    }

    public function test_can_retrieve_recipe_by_id()
    {
        $recipe = factory(Recipe::class)->create();

        $response = $this->get(route('api.recipes.show', $recipe->id));

        $this->assertResponse($response, $recipe->toArray());
    }

    public function test_can_retrieve_recipe_relations()
    {
        factory(Recipe::class)->create();
        $recipe = Recipe::with('groceries')->first();

        $response = $this->json('GET', route('api.recipes.show', $recipe->id), ['embed' => 'groceries']);

        $this->assertResponse($response, $recipe->toArray());
    }

    public function test_returns_error_on_unknown_recipe()
    {
        $response = $this->get(route('api.recipes.show', 1));

        $this->assertError($response, JsonResponse::HTTP_NOT_FOUND);
    }

    public function test_update_existing_recipe()
    {
        // Has 10 groceries
        $recipe = factory(Recipe::class)->create([
            'name' => 'Recipe',
            'servings' => 1,
            'preparation_minutes' => 10
        ]);

        $groceries = $this->mapGroceriesToRequest(factory(Grocery::class, 3)->state('fruit')->create());

        $updatedRecipe = [
            'name' => 'Recipe name changes',
            'servings' => 2,
            'preparation_minutes' => 20,
            'groceries' => $groceries
        ];

        $response = $this->put(route('api.recipes.update', $recipe->id), $updatedRecipe);

        unset($updatedRecipe['groceries']);

        $this->assertResponse($response, array_merge($recipe->toArray(), $updatedRecipe), JsonResponse::HTTP_OK);
        $this->assertCount(3, Recipe::first()->groceries);
    }

    public function test_returns_error_on_updating_recipe_without_groceries()
    {
        $updatedRecipe = [
            'name' => 'Recipe',
            'servings' => 1,
            'preparation_minutes' => 10,
            'groceries' => []
        ];

        $response = $this->put(route('api.recipes.update', 1), $updatedRecipe);

        $this->assertError($response, JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function test_returns_error_on_updating_unknown_recipe()
    {
        $updatedRecipe = [
            'name' => 'Recipe',
            'servings' => 1,
            'preparation_minutes' => 10,
            'groceries' => [
                [
                    'grocery_id' => 1,
                    'units' => 5
                ]
            ]
        ];

        $response = $this->put(route('api.recipes.update', 1), $updatedRecipe);

        $this->assertError($response, JsonResponse::HTTP_NOT_FOUND);
    }

    public function test_deletes_existing_recipe()
    {
        $recipe = factory(Recipe::class)->create();

        $response = $this->delete(route('api.recipes.destroy', $recipe->id));

        $this->assertSuccess($response, JsonResponse::HTTP_OK);
    }

    public function test_cannot_delete_unknown_shop()
    {
        $response = $this->delete(route('api.recipes.destroy', 1));

        $this->assertError($response, JsonResponse::HTTP_NOT_FOUND);
    }

    /**
     * @param Collection $groceries
     *
     * @return array
     */
    private function mapGroceriesToRequest(Collection $groceries)
    {
        return $groceries->map(function (Grocery $grocery) {
            return [
                'grocery_id' => $grocery->id,
                'units' => random_int(1,5) * $grocery->units
            ];
        })->toArray();
    }
}
