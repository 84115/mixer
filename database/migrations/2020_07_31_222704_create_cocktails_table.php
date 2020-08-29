<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCocktailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cocktails', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tags')->default('');
            $table->string('category');
            $table->string('iba')->default('');
            $table->string('video')->default('');
            $table->string('alcoholic')->default('');
            $table->string('glass')->default('');
            $table->string('instructions')->default('');
            $table->string('image')->default('');

            $table->string('ingredients')->default('');

            $table->string('ingredient1')->default('');
            $table->string('ingredient2')->default('');
            $table->string('ingredient3')->default('');
            $table->string('ingredient4')->default('');
            $table->string('ingredient5')->default('');
            $table->string('ingredient6')->default('');
            $table->string('ingredient7')->default('');
            $table->string('ingredient8')->default('');
            $table->string('ingredient9')->default('');
            $table->string('ingredient10')->default('');
            $table->string('ingredient11')->default('');
            $table->string('ingredient12')->default('');
            $table->string('ingredient13')->default('');
            $table->string('ingredient14')->default('');
            $table->string('ingredient15')->default('');

            $table->string('measure1')->default('');
            $table->string('measure2')->default('');
            $table->string('measure3')->default('');
            $table->string('measure4')->default('');
            $table->string('measure5')->default('');
            $table->string('measure6')->default('');
            $table->string('measure7')->default('');
            $table->string('measure8')->default('');
            $table->string('measure9')->default('');
            $table->string('measure10')->default('');
            $table->string('measure11')->default('');
            $table->string('measure12')->default('');
            $table->string('measure13')->default('');
            $table->string('measure14')->default('');
            $table->string('measure15')->default('');

            $table->foreignId('user_id');

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
        Schema::dropIfExists('cocktails');
    }
}
