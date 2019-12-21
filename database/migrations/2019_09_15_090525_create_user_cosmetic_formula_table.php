<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCosmeticFormulaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_cosmetic_formula', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_cosmetic_id');
            $table->string('formula_id');
            $table->char('phase_name', 3);
            $table->unsignedSmallInteger('percentage_used');
            $table->timestamps();

            $table->foreign('user_cosmetic_id')->references('id')->on('user_cosmetic')->onDelete('cascade');
            $table->foreign('formula_id')->references('id')->on('formulas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_cosmetic_formula');
    }
}
