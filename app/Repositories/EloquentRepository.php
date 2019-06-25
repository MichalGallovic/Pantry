<?php

namespace App\Repositories;

abstract class EloquentRepository
{
    /** @var array */
    protected $withRelations = [];

    /** @var array */
    protected $allowedRelations = [];

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
}
