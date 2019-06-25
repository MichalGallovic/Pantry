<?php

namespace App\Repositories;

use App\UnitType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UnitTypeRepository extends EloquentRepository
{
    protected $allowedRelations = [
        'groceries' => 'groceries'
    ];

    /** @var UnitType */
    private $unitType;

    /**
     * @param UnitType $unitType
     */
    public function __construct(UnitType $unitType)
    {
        $this->unitType = $unitType;
    }

    /**
     * @return Collection
     */
    public function all()
    {
        return $this->unitType->all();
    }

    /**
     * @param $id
     *
     * @return Model
     *
     * @throws ModelNotFoundException
     */
    public function findOrFail($id)
    {
        if ($this->withRelations) {
            return $this->unitType->with($this->withRelations)->findOrFail($id);
        }

        return $this->unitType->with($this->withRelations)->findOrFail($id);
    }
}
