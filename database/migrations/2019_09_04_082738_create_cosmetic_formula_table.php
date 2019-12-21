<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCosmeticFormulaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cosmetic_formula', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cosmetic_id');
            $table->string('formula_id');
            $table->char('phase_name', 3);
            $table->unsignedSmallInteger('min_percentage');
            $table->unsignedSmallInteger('max_percentage');
            $table->timestamps();

            $table->foreign('cosmetic_id')->references('id')->on('cosmetics')->onDelete('cascade');
            $table->foreign('formula_id')->references('id')->on('formulas')->onDelete('cascade');
            $table->unique(['cosmetic_id', 'formula_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cosmetic_formula');
    }
}
