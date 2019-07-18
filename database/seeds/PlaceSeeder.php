<?php

use App\Place;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    /** @var Place */
    private $place;

    /**
     * @param Place $place
     */
    public function __construct(Place $place)
    {
        $this->place = $place;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->place->create(['name' => Place::FRIDGE]);
        $this->place->create(['name' => Place::PANTRY]);
    }
}
