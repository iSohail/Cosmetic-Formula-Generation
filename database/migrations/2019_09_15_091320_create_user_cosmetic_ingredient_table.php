<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCosmeticIngredientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_cosmetic_ingredient', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_cosmetic_id');
            $table->string('ingredient_id');
            $table->unsignedSmallInteger('percentage_used');
            $table->timestamps();

            $table->foreign('user_cosmetic_id')->references('id')->on('user_cosmetic')->onDelete('cascade');
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
        Schema::dropIfExists('user_cosmetic_ingredient');
    }
}
