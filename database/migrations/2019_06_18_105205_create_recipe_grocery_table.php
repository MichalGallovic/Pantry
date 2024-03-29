<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipeGroceryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grocery_recipe', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('units');
            $table->unsignedBigInteger('recipe_id')->nullable();
            $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
            $table->unsignedBigInteger('grocery_id')->nullable();
            $table->foreign('grocery_id')->references('id')->on('groceries');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grocery_recipe');
    }
}
