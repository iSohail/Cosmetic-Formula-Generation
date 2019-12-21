<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCosmeticIngredientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cosmetic_ingredient', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cosmetic_id');
            $table->string('ingredient_id');
            $table->unsignedSmallInteger('min_percentage');
            $table->unsignedSmallInteger('max_percentage');
            $table->unsignedSmallInteger('min_item');
            $table->unsignedSmallInteger('max_item');
            $table->string('optional');
            $table->timestamps();

            $table->foreign('cosmetic_id')->references('id')->on('cosmetics')->onDelete('cascade');
            $table->foreign('ingredient_id')->references('id')->on('ingredients')->onDelete('cascade');
            $table->unique(['cosmetic_id', 'ingredient_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cosmetic_ingredient');
    }
}
