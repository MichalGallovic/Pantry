<?php

namespace App\Repositories;

use App\Contracts\Repository;
use App\Grocery;

class GroceryRepository implements Repository
{
    /** @var Grocery */
    private $grocery;

    /** @var array */
    private $withRelations = [];

    /** @var array */
    private $allowedRelations = [
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
        $query = $this->grocery->orderByDesc('updated_at');

        if ($this->withRelations) {
            $query = $query->with($this->withRelations);
        }

        return $query->paginate($perPage);
    }

    /**
     * @inheritDoc
     */
    public function create($attributes)
    {
        return $this->grocery->create($attributes);
    }

    /**
     * @inheritDoc
     */
    public function find($id)
    {
        return $this->grocery->find($id);
    }

    /**
     * @inheritDoc
     */
    public function findOrFail($id)
    {
        return $this->grocery->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function update($attributes, $id)
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
}
