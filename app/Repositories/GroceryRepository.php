<?php

namespace App\Repositories;

use App\Contracts\CrudRepository;
use App\Grocery;

class GroceryRepository extends EloquentRepository implements CrudRepository
{
    /** @var Grocery */
    private $grocery;

    /** @var array */
    protected $allowedRelations = [
        'unitType' => 'unit-type',
        'shop' => 'shop'
    ];

    /**
     * @param Grocery $grocery
     */
    public function __construct(Grocery $grocery)
    {
        $this->grocery = $grocery;
    }

    /**
     * @inheritDoc
     */
    public function paginate($perPage = 10)
    {
        $query = $this->grocery->orderByDesc('updated_at');

        if ($this->withRelations) {
            $query = $query->with($this->withRelations);
        }

        return $query->paginate($perPage);
    }

    /**
     * @inheritDoc
     */
    public function create(array $attributes)
    {
        return $this->grocery->create($attributes);
    }

    /**
     * @inheritDoc
     */
    public function find($id)
    {
        if ($this->withRelations) {
            return $this->grocery->with($this->withRelations)->find($id);
        }

        return $this->grocery->find($id);
    }

    /**
     * @inheritDoc
     */
    public function findOrFail($id)
    {
        if ($this->withRelations) {
            return $this->grocery->with($this->withRelations)->findOrFail($id);
        }

        return $this->grocery->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function update(array $attributes, $id)
    {
        $grocery = $this->findOrFail($id);

        $grocery->update($attributes);

        return $grocery;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($id)
    {
        $grocery = $this->findOrFail($id);

        $grocery->delete();
    }

    /**
     * @param string $term
     * @param int $perPage
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function search($term, $perPage = 10)
    {
        $query = $this->grocery->where('name', 'LIKE', "%{$term}%");

        if ($this->withRelations) {
            $query = $query->with($this->withRelations);
        }

        return $query->paginate($perPage);
    }

    /**
     * @param string $id
     * @param int $perPage
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getByShopId($id, $perPage = 10)
    {
        return $this->grocery->where('shop_id', $id)->paginate($perPage);
    }

    /**
     * @param string $term
     * @param int $id
     * @param int $perPage
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function searchByShopId($term, $id, $perPage = 10)
    {
        return $this->grocery
            ->where('shop_id', $id)
            ->where('name', 'LIKE', "%{$term}%")
            ->paginate($perPage);
    }
}
