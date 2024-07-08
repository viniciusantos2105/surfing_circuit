<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heats', function (Blueprint $table) {
            $table->id('heat_id');
            $table->unsignedBigInteger('surfer1_number');
            $table->unsignedBigInteger('surfer2_number');
            $table->foreign('surfer1_number')->references('surfer_number')->on('surfers');
            $table->foreign('surfer2_number')->references('surfer_number')->on('surfers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('batterys');
    }
}
