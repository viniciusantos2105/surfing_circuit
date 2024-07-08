<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id('note_id');
            $table->unsignedBigInteger('wave_id');
            $table->decimal('partialScore1', 5, 2);
            $table->decimal('partialScore2', 5, 2);
            $table->decimal('partialScore3', 5, 2);
            $table->foreign('wave_id')->references('wave_id')->on('waves');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
