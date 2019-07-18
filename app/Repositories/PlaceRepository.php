<?php

namespace App\Repositories;

use App\Contracts\CrudRepository;
use App\Place;
use Illuminate\Database\Eloquent\Collection;

class PlaceRepository extends EloquentRepository implements CrudRepository
{
    /** @var Place */
    private $place;

    /** @var array */
    protected $allowedRelations = [
        'groceries' => 'groceries'
    ];

    /** @var array */
    protected $allowedCounts = [
        'groceries' => 'groceries'
    ];

    /**
     * @param Place $place
     */
    public function __construct(Place $place)
    {
        $this->place = $place;
    }

    /**
     * @return Collection
     */
    public function all()
    {
        if ($this->withRelations) {
            return $this->place->with($this->withRelations)->get();
        }

        return $this->place->all();
    }

    /**
     * @inheritDoc
     */
    public function paginate($perPage = 10)
    {
        if ($this->withRelations) {
            return $this->place
                    ->withCount($this->withCounts)
                    ->with($this->withRelations)
                    ->paginate($perPage);
        }

        return $this->place
            ->withCount($this->withCounts)
            ->paginate($perPage);
    }

    /**
     * @inheritDoc
     */
    public function create(array $attributes)
    {
        return $this->place->create($attributes);
    }

    /**
     * @inheritDoc
     */
    public function find($id)
    {
        if ($this->withRelations) {
            return $this->place
                ->withCount($this->withCounts)
                ->with($this->withRelations)
                ->find($id);
        }

        return $this->place
            ->withCount($this->withCounts)
            ->find($id);
    }

    /**
     * @inheritDoc
     */
    public function findOrFail($id)
    {
        if ($this->withRelations) {
            return $this->place
                ->withCount($this->withCounts)
                ->with($this->withRelations)
                ->findOrFail($id);
        }

        return $this->place
            ->withCount($this->withCounts)
            ->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function update(array $attributes, $id)
    {
        $place = $this->findOrFail($id);

        $place->update($attributes);

        return $place;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($id)
    {
        $place = $this->findOrFail($id);
        $place->delete();
    }
}
