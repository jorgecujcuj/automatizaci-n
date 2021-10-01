<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Operaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('operaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idcatalogo')->nullable();
            $table->unsignedBigInteger('idtablero')->nullable();
            $table->unsignedBigInteger('iduser')->nullable();
            $table->timestamps();
            $table->foreign('idcatalogo')->references('id')->on('catalogovariables');
            $table->foreign('idtablero')->references('id')->on('tableros');
            $table->foreign('iduser')->references('id')->on('users');
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
        Schema::dropIfExists('operaciones');
    }
}
