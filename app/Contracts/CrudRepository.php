<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Use repository as a Query Abstraction for Eloquent
 * It is very common to name it Repository even though it does not represent
 * so called Repository Pattern
 */
interface CrudRepository
{
    /**
     * @param int $perPage
     *
     * @return Collection
     */
    public function paginate($perPage = 10);

    /**
     * @param array $attributes
     *
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * @param int|string $id
     *
     * @return Model
     */
    public function find($id);

    /**
     * @param int|string $id
     *
     * @return Model
     *
     * @throws ModelNotFoundException
     */
    public function findOrFail($id);

    /**
     * @param array $attributes
     * @param int   $id
     *
     * @return Model
     *
     * @throws ModelNotFoundException
     */
    public function update(array $attributes, $id);

    /**
     * @param int $id
     */
    public function deleteById($id);
}
