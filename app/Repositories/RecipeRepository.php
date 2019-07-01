<?php

namespace App\Repositories;

use App\Grocery;
use App\Recipe;
use App\RecipeGrocery;
use Illuminate\Support\Collection;

class RecipeRepository extends EloquentRepository
{
    protected $allowedRelations = [
        'groceries' => 'groceries'
    ];

    /** @var Recipe */
    private $recipe;

    /** @var Grocery */
    private $grocery;

    /**
     * @param Recipe  $recipe
     * @param Grocery $grocery
     */
    public function __construct(Recipe $recipe, Grocery $grocery)
    {
        $this->recipe  = $recipe;
        $this->grocery = $grocery;
    }

    /**
     * @inheritDoc
     */
    public function paginate($perPage = 10)
    {
        if ($this->withRelations) {
            return $this->recipe->with($this->withRelations)->paginate($perPage);
        }

        return $this->recipe->paginate($perPage);
    }

    /**
     * @inheritDoc
     */
    public function create(array $attributes, Collection $recipeGroceries)
    {
        $recipe = $this->recipe->create($attributes);

        $groceries = $this->mapRecipeGroceries($recipeGroceries);

        $recipe->groceries()->attach($groceries);

        return $recipe;
    }

    /**
     * @inheritDoc
     */
    public function find($id)
    {
        if ($this->withRelations) {
            return $this->recipe->with($this->withRelations)->find($id);
        }

        return $this->recipe->find($id);
    }

    /**
     * @inheritDoc
     */
    public function findOrFail($id)
    {
        if ($this->withRelations) {
            return $this->recipe->with($this->withRelations)->findOrFail($id);
        }

        return $this->recipe->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function update(array $attributes, $id, Collection $recipeGroceries)
    {
        $recipe = $this->findOrFail($id);
        $recipe->update($attributes);

        $groceries = $this->mapRecipeGroceries($recipeGroceries);

        $recipe->groceries()->sync($groceries);

        return $recipe;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($id)
    {
        $recipe = $this->findOrFail($id);

        $recipe->delete();
        // Delete cascade ?
    }

    /**
     * @param Collection $recipeGroceries
     *
     * @return Collection
     */
    private function mapRecipeGroceries(Collection $recipeGroceries)
    {
        $groceries = $recipeGroceries->mapWithKeys(function (RecipeGrocery $grocery) {
            return [$grocery->getGroceryId() => ['units' => $grocery->getUnits()]];
        });

        return $groceries;
}
}
