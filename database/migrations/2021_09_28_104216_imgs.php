<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Imgs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('imgs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idtablero');
            $table->string('img');
            $table->timestamps();
            $table->foreign('idtablero')->references('id')->on('tableros');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('imgs');
    }
}
