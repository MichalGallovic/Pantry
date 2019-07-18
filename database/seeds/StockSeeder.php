<?php

use App\Grocery;
use App\Place;
use App\Stock;
use App\UnitType;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /** @var Place */
    private $place;

    /** @var Grocery */
    private $grocery;

    /** @var UnitType */
    private $unitType;

    /**
     * @param Place    $place
     * @param Grocery  $grocery
     * @param UnitType $unitType
     */
    public function __construct(Place $place, Grocery $grocery, UnitType $unitType)
    {
        $this->place    = $place;
        $this->grocery  = $grocery;
        $this->unitType = $unitType;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fridge = $this->place->where('name', Place::FRIDGE)->first();
        $pantry = $this->place->where('name', Place::PANTRY)->first();
        $places = collect([$fridge, $pantry]);

        $this->grocery
            ->get()
            ->take(10)
            ->each(function (Grocery $grocery) use ($places) {
                factory(Stock::class)->create([
                    'grocery_id' => $grocery->id,
                    'place_id' => $places->random()->id
                ]);
            });
    }
}
