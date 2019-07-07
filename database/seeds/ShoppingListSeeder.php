<?php

use App\ShoppingList;
use Illuminate\Database\Seeder;

class ShoppingListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ShoppingList::class, 3)->state('with-mixed-items')->create();
    }
}
