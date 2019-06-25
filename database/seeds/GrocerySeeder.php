<?php

use App\Grocery;
use App\Repositories\ShopRepository;
use Illuminate\Database\Seeder;

class GrocerySeeder extends Seeder
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
        $shops = $this->shop->all();

        factory(Grocery::class, 10)->state('fruits')->create(['shop_id' => $shops[0]->id]);
        factory(Grocery::class, 10)->state('vegetables')->create(['shop_id' => $shops[1]->id]);
    }
}
