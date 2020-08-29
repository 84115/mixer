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
            $table->string('tags')->nullable();
            $table->string('category');
            $table->string('iba')->nullable();
            $table->string('video')->nullable();
            $table->string('alcoholic')->nullable();
            $table->string('glass')->nullable();
            $table->string('instructions')->nullable();
            $table->string('image')->nullable();

            $table->string('ingredients')->nullable();

            $table->string('ingredient1')->nullable();
            $table->string('ingredient2')->nullable();
            $table->string('ingredient3')->nullable();
            $table->string('ingredient4')->nullable();
            $table->string('ingredient5')->nullable();
            $table->string('ingredient6')->nullable();
            $table->string('ingredient7')->nullable();
            $table->string('ingredient8')->nullable();
            $table->string('ingredient9')->nullable();
            $table->string('ingredient10')->nullable();
            $table->string('ingredient11')->nullable();
            $table->string('ingredient12')->nullable();
            $table->string('ingredient13')->nullable();
            $table->string('ingredient14')->nullable();
            $table->string('ingredient15')->nullable();

            $table->string('measure1')->nullable();
            $table->string('measure2')->nullable();
            $table->string('measure3')->nullable();
            $table->string('measure4')->nullable();
            $table->string('measure5')->nullable();
            $table->string('measure6')->nullable();
            $table->string('measure7')->nullable();
            $table->string('measure8')->nullable();
            $table->string('measure9')->nullable();
            $table->string('measure10')->nullable();
            $table->string('measure11')->nullable();
            $table->string('measure12')->nullable();
            $table->string('measure13')->nullable();
            $table->string('measure14')->nullable();
            $table->string('measure15')->nullable();

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
