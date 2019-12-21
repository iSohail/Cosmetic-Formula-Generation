<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('methods', function (Blueprint $table) {
            $table->string('id');
            $table->string('cosmetic_id');
            $table->unsignedTinyInteger('step_num');
            $table->text('description');
            $table->timestamps();

            
            $table->foreign('cosmetic_id')->references('id')->on('cosmetics')->onDelete('cascade');
            $table->primary(['id','cosmetic_id', 'step_num']);
            // $table->unique(['cosmetic_id', 'step_num']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('methods');
    }
}
