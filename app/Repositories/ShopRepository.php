<?php

namespace App\Repositories;

use App\Shop;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ShopRepository
{
    /** @var Shop */
    private $shop;

    /**
     * @param Shop $shop
     */
    public function __construct(Shop $shop)
    {
        $this->shop = $shop;
    }

    /**
     * @param int $perPage
     *
     * @return mixed
     */
    public function paginate($perPage = 10)
    {
        return $this->shop->paginate($perPage);
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function create($name)
    {
        return $this->shop->create(['name' => $name]);
    }

    /**
     * @param $id
     *
     * @return Shop
     */
    public function find($id)
    {
        return $this->shop->find($id);
    }

    /**
     * @param $id
     *
     * @return Shop
     *
     * @throws ModelNotFoundException
     */
    public function findOrFail($id)
    {
        return $this->shop->findOrFail($id);
    }

    /**
     * @param string $name
     * @param int    $id
     *
     * @return Shop
     *
     * @throws ModelNotFoundException
     */
    public function update($name, $id)
    {
        $shop = $this->findOrFail($id);

        $shop->update(['name' => $name]);

        return $shop;
    }

    /**
     * @param int $id
     *
     */
    public function deleteById($id)
    {
        $shop = $this->findOrFail($id);

        $shop->delete();
    }
}
