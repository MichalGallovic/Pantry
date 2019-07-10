<?php

namespace App\Repositories;

use App\Contracts\CrudRepository;
use App\ShoppingListItem;
use Illuminate\Database\ConnectionInterface;

class ShoppingListItemRepository extends EloquentRepository implements CrudRepository
{
    /** @var ShoppingListItem */
    private $shoppingListItem;

    /** @var ConnectionInterface */
    private $db;

    /** @var array */
    protected $allowedRelations = [
        'shoppingList' => 'shopping-list',
        'grocery' => 'grocery'
    ];

    /**
     * @param ShoppingListItem    $shoppingListItem
     * @param ConnectionInterface $db
     */
    public function __construct(ShoppingListItem $shoppingListItem, ConnectionInterface $db)
    {
        $this->shoppingListItem = $shoppingListItem;
        $this->db               = $db;
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
        return $this->shoppingListItem->create($attributes);
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
     * @param array $itemsOrder
     *
     * @throws \Throwable
     */
    public function updateItemsOrder(array $itemsOrder)
    {
        $this->db->transaction(function () use ($itemsOrder) {
            collect($itemsOrder)->each(function ($item) {
                $this->find($item['id'])->update(['order' => $item['order']]);
            });
        });
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
