<?php

namespace App\Repositories;

use App\Contracts\CrudRepository;
use App\ShoppingList;
use App\ShoppingListItem;
use Illuminate\Database\ConnectionInterface;

class ShoppingListRepository extends EloquentRepository implements CrudRepository
{
    /** @var ShoppingList */
    private $shoppingList;

    /** @var ConnectionInterface */
    private $db;


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
     * @param ShoppingList        $shoppingList
     * @param ConnectionInterface $db
     */
    public function __construct(ShoppingList $shoppingList, ConnectionInterface $db)
    {
        $this->shoppingList = $shoppingList;
        $this->db           = $db;
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

        $shoppingList = $this->createItems($shoppingList, $attributes['items']);

        return $shoppingList;
    }

    /**
     * @param ShoppingList $shoppingList
     * @param array        $items
     *
     * @return ShoppingList
     */
    private function createItems(ShoppingList $shoppingList, array $items)
    {
        $items = $shoppingList
            ->items()
            ->saveMany(
                collect($items)->map(function ($item) {
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
     * @param string $id
     *
     * @return ShoppingList
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
     * @param int $id
     * @param array $items
     *
     * @throws \Throwable
     */
    public function replaceItems($id, array $items)
    {
        $shoppingList = $this->findOrFail($id);

        $shoppingList->items()->delete();

        $this->db->transaction(function() use ($shoppingList, $items) {
            $this->createItems($shoppingList, $items);
        });
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
