<?php

namespace App\Repositories;

abstract class EloquentRepository
{
    /** @var array */
    protected $withRelations = [];

    /** @var array */
    protected $withCounts = [];

    /** @var array */
    protected $allowedRelations = [];

    /** @var array */
    protected $allowedCounts = [];

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
     * @param array $counts
     *
     * @return $this
     */
    public function withCounts(array $counts)
    {
        $this->withCounts = array_keys(array_intersect($this->allowedCounts, $counts));
        return $this;
    }

    /**
     * @return array
     */
    public function getAllowedRelations()
    {
        return array_keys($this->allowedRelations);
    }
}
