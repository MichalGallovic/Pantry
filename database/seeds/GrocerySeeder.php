<?php

use App\Grocery;
use App\Repositories\ShopRepository;
use App\Repositories\UnitTypeRepository;
use App\Shop;
use Illuminate\Database\Seeder;

class GrocerySeeder extends Seeder
{
    /** @var ShopRepository */
    private $shop;

    /** @var UnitTypeRepository */
    private $unitType;

    /**
     * @param ShopRepository     $shop
     * @param UnitTypeRepository $unitType
     */
    public function __construct(ShopRepository $shop, UnitTypeRepository $unitType)
    {
        $this->shop     = $shop;
        $this->unitType = $unitType;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unitTypes = $this->unitType->all();

        $this->shop
            ->all()
            ->each(function (Shop $shop) use ($unitTypes) {
                collect(range(0, random_int(20, 50)))
                    ->each(function() use ($shop, $unitTypes) {
                        $attributes = [
                            'shop_id' => $shop->id,
                            'unit_type_id' => $unitTypes->random()->id
                        ];
                        factory(Grocery::class)->create($attributes);
                    });
            });
    }
}
