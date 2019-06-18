<?php

use App\Grocery;
use Illuminate\Database\Seeder;

class GrocerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Grocery::class, 10)->create();
    }
}
