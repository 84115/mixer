<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCocktailsIngredientsPivot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cocktail_ingredient', function (Blueprint $table) {
			$table->integer('cocktail_id')->unsigned()->index();
			$table->foreign('cocktail_id')->references('id')->on('cocktails')->onDelete('cascade');
			$table->integer('ingredient_id')->unsigned()->index();
			$table->foreign('ingredient_id')->references('id')->on('ingredients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cocktail_ingredient');
    }
}
