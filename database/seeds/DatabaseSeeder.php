<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UnitTypeSeeder::class);
        $this->call(ShopSeeder::class);
        $this->call(GrocerySeeder::class);
        $this->call(ShoppingListSeeder::class);
//        $this->call(RecipeSeeder::class);
//        $this->call(ShoppingListItemSeeder::class);
    }
}
