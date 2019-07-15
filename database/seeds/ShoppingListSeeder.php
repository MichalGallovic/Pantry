<?php

use App\Repositories\ShopRepository;
use App\ShoppingList;
use Illuminate\Database\Seeder;

class ShoppingListSeeder extends Seeder
{
    /** @var ShopRepository */
    private $shop;

    /**
     * @param ShopRepository $shop
     */
    public function __construct(ShopRepository $shop)
    {
        $this->shop = $shop;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ShoppingList::class, 3)->state('with-items')->create();
    }
}
