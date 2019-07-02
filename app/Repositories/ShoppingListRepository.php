<?php

namespace App\Repositories;

use App\Contracts\CrudRepository;
use App\ShoppingList;

class ShoppingListRepository extends EloquentRepository implements CrudRepository
{
    /** @var ShoppingList */
    private $shoppingList;

    /** @var array */
    protected $allowedRelations = [
        'shoppingListItems' => 'shopping-list-items',
    ];

    /**
     * @param ShoppingList $shoppingList
     */
    public function __construct(ShoppingList $shoppingList)
    {
        $this->shoppingList = $shoppingList;
    }

    /**
     * @inheritDoc
     */
    public function paginate($perPage = 10)
    {
        if ($this->withRelations) {
            return $this->shoppingList->with($this->withRelations)->paginate($perPage);
        }

        return $this->shoppingList->paginate($perPage);
    }

    /**
     * @inheritDoc
     */
    public function create(array $attributes)
    {
        return $this->shoppingList->create($attributes);
    }

    /**
     * @inheritDoc
     */
    public function find($id)
    {
        if ($this->withRelations) {
            return $this->shoppingList->with($this->withRelations)->find($id);
        }

        return $this->shoppingList->find($id);
    }

    /**
     * @inheritDoc
     */
    public function findOrFail($id)
    {
        if ($this->withRelations) {
            return $this->shoppingList->with($this->withRelations)->findOrFail($id);
        }

        return $this->shoppingList->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function update(array $attributes, $id)
    {
        $shoppingList = $this->findOrFail($id);

        $shoppingList->update($attributes);

        return $shoppingList;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($id)
    {
        $shoppingList = $this->findOrFail($id);

        $shoppingList->delete();
    }
}