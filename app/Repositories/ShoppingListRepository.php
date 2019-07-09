<?php

namespace App\Repositories;

use App\Contracts\CrudRepository;
use App\ShoppingList;
use App\ShoppingListItem;

class ShoppingListRepository extends EloquentRepository implements CrudRepository
{
    /** @var ShoppingList */
    private $shoppingList;

    /** @var array */
    protected $allowedRelations = [
        'items' => 'items',
        'items.grocery' => 'items-with-groceries'
    ];

    /** @var array */
    protected $allowedCounts = [
        'items' => 'items'
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
            return $this->shoppingList
                ->withCount($this->withCounts)
                ->with($this->withRelations)
                ->paginate($perPage);
        }

        return $this->shoppingList
            ->withCount($this->withCounts)
            ->paginate($perPage);
    }

    /**
     * @inheritDoc
     */
    public function create(array $attributes)
    {
        $shoppingList = $this->shoppingList->create(['name' => $attributes['name']]);

        $items = $shoppingList
            ->items()
            ->saveMany(
                collect($attributes['items'])->map(function ($item) {
                    return new ShoppingListItem($item);
                })
            );

        $shoppingList['items_count'] = $items->count();

        return $shoppingList;
    }

    /**
     * @inheritDoc
     */
    public function find($id)
    {
        if ($this->withRelations) {
            return $this->shoppingList
                ->withCount($this->withCounts)
                ->with($this->withRelations)
                ->find($id);
        }

        return $this->shoppingList
            ->withCount($this->withCounts)
            ->find($id);
    }

    /**
     * @inheritDoc
     */
    public function findOrFail($id)
    {
        if ($this->withRelations) {
            return $this->shoppingList
                ->withCount($this->withCounts)
                ->with($this->withRelations)
                ->findOrFail($id);
        }

        return $this->shoppingList
            ->withCount($this->withCounts)
            ->findOrFail($id);
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
