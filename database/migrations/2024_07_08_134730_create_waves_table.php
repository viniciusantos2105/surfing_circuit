<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waves', function (Blueprint $table) {
            $table->id('wave_id');
            $table->unsignedBigInteger('heat_id');
            $table->unsignedBigInteger('surfer_number');
            $table->foreign('heat_id')->references('heat_id')->on('heats');
            $table->foreign('surfer_number')->references('surfer_number')->on('surfers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('waves');
    }
}
