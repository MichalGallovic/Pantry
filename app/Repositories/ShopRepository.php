<?php

namespace App\Repositories;

use App\Contracts\Repository;
use App\Shop;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ShopRepository implements Repository
{
    /** @var Shop */
    private $shop;

    /** @var array */
    private $withRelations = [];

    /** @var array */
    private $allowedRelations = [
        'groceries' => 'groceries'
    ];

    /**
     * @param Shop $shop
     */
    public function __construct(Shop $shop)
    {
        $this->shop = $shop;
    }

    /**
     * @param array $relations
     *
     * @return $this
     */
    public function withRelations(array $relations)
    {
        $this->withRelations = array_keys(array_intersect($this->allowedRelations, $relations));
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function paginate($perPage = 10)
    {
        $shop = $this->shop->orderByDesc('updated_at');

        if ($this->withRelations) {
            $shop = $shop->with($this->withRelations);
        }

        return $shop->paginate($perPage);
    }

    /**
     * @inheritDoc
     */
    public function create($attributes)
    {
        return $this->shop->create($attributes);
    }

    /**
     * @inheritDoc
     */
    public function find($id)
    {
        return $this->shop->find($id);
    }

    /**
     * @inheritDoc
     */
    public function findOrFail($id)
    {
        return $this->shop->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function update($attributes, $id)
    {
        $shop = $this->findOrFail($id);

        $shop->update($attributes);

        return $shop;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($id)
    {
        $shop = $this->findOrFail($id);

        $shop->delete();
    }
}
