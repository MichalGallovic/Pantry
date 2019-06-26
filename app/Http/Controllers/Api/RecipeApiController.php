<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;
use App\Http\Resources\RecipeResource;
use App\RecipeGrocery;
use App\Repositories\RecipeRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RecipeApiController extends ApiController
{
    /** @var RecipeRepository */
    private $recipe;

    /**
     * @param RecipeRepository $recipe
     */
    public function __construct(RecipeRepository $recipe)
    {
        $this->recipe = $recipe;
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $relations = $this->getEmbeddedRelations($request);

        $recipes = $this->recipe->withRelations($relations)->paginate($this->pagination);

        return $this->respondWithCollection(RecipeResource::collection($recipes));
    }

    /**
     * @param Request $request
     * @param int $id
     *
     * @return JsonResponse
     */
    public function show(Request $request, $id)
    {
        $relations = $this->getEmbeddedRelations($request);

        $recipe = $this->recipe->withRelations($relations)->findOrFail($id);

        return $this->respondWithResource(new RecipeResource($recipe));
    }

    /**
     * @param StoreRecipeRequest $request
     *
     * @return JsonResponse
     */
    public function store(StoreRecipeRequest $request)
    {
        $attributes = $request->validated();

        list($recipeGroceries, $attributes) = $this->extractRecipeGroceries($attributes);

        $recipe = $this->recipe->create($attributes, $recipeGroceries);

        return $this->respondWithResource(new RecipeResource($recipe), JsonResponse::HTTP_CREATED);
    }

    /**
     * @param UpdateRecipeRequest $request
     * @param string $id
     *
     * @return JsonResponse
     */
    public function update(UpdateRecipeRequest $request, $id)
    {
        $attributes = $request->validated();

        list($recipeGroceries, $attributes) = $this->extractRecipeGroceries($attributes);

        $recipe = $this->recipe->update($attributes, $id, $recipeGroceries);

        return $this->respondWithResource(new RecipeResource($recipe), JsonResponse::HTTP_OK);
    }

    /**
     * @param string $id
     *
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $this->recipe->deleteById($id);

        return $this->respondWithSuccess('Recipe deleted successfully', JsonResponse::HTTP_OK);
    }

    /**
     * @param array $attributes
     *
     * @return array
     */
    private function extractRecipeGroceries(array $attributes): array
    {
        $recipeGroceries = collect($attributes['groceries'])->map(function ($grocery) {
            return new RecipeGrocery($grocery['grocery_id'], $grocery['units']);
        });
        unset($attributes['groceries']);

        return [$recipeGroceries, $attributes];
    }
}
