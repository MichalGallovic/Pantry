<?php

namespace App\Repositories;

use App\Contracts\CrudRepository;
use App\ShoppingListItem;

class ShoppingListItemRepository extends EloquentRepository implements CrudRepository
{
    /** @var ShoppingListItem */
    private $shoppingListItem;

    /** @var array */
    protected $allowedRelations = [
        'shoppingList' => 'shopping-list',
        'grocery' => 'grocery'
    ];

    /**
     * @param ShoppingListItem $shoppingListItem
     */
    public function __construct(ShoppingListItem $shoppingListItem)
    {
        $this->shoppingListItem = $shoppingListItem;
    }

    /**
     * @return ShoppingListItem[]
     */
    public function all()
    {
        if ($this->withRelations) {
            return $this->shoppingListItem->with($this->withRelations)->get();
        }

        return $this->shoppingListItem->all();
    }

    /**
     * @inheritDoc
     */
    public function paginate($perPage = 10)
    {
        if ($this->withRelations) {
            return $this->shoppingListItem->with($this->withRelations)->paginate($perPage);
        }

        return $this->shoppingListItem->paginate($perPage);
    }

    /**
     * @inheritDoc
     */
    public function create(array $attributes)
    {
        return $this->create($attributes);
    }

    /**
     * @inheritDoc
     */
    public function find($id)
    {
        if ($this->withRelations) {
            return $this->shoppingListItem->with($this->withRelations)->find($id);
        }

        return $this->shoppingListItem->find($id);
    }

    /**
     * @inheritDoc
     */
    public function findOrFail($id)
    {
        if ($this->withRelations) {
            return $this->shoppingListItem->with($this->withRelations)->findOrFail($id);
        }

        return $this->shoppingListItem->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function update(array $attributes, $id)
    {
        $shoppingListItem = $this->findOrFail($id);
        $shoppingListItem->update($attributes);

        return $shoppingListItem;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($id)
    {
        $shoppingListItem = $this->findOrFail($id);
        $shoppingListItem->delete();
    }
}
