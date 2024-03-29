<?php

namespace App\Repositories;

use App\Contracts\CrudRepository;
use App\Shop;
use Illuminate\Database\Eloquent\Collection;

class ShopRepository extends EloquentRepository implements CrudRepository
{
    /** @var Shop */
    private $shop;

    /** @var array */
    protected $allowedRelations = [
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
     * @return Collection
     */
    public function all()
    {
        if ($this->withRelations) {
            return $this->shop->with($this->withRelations)->get();
        }

        return $this->shop->get();
    }

    /**
     * @inheritDoc
     */
    public function create(array $attributes)
    {
        return $this->shop->create($attributes);
    }

    /**
     * @inheritDoc
     */
    public function find($id)
    {
        if ($this->withRelations) {
            return $this->shop->with($this->withRelations)->find($id);
        }

        return $this->shop->find($id);
    }

    /**
     * @inheritDoc
     */
    public function findOrFail($id)
    {
        if ($this->withRelations) {
            return $this->shop->with($this->withRelations)->findOrFail($id);
        }

        return $this->shop->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function update(array $attributes, $id)
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
