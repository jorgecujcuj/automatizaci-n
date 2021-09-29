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
            $table->bigInteger('idcatalogo')->nullable();
            $table->bigInteger('idtablero')->nullable();
            $table->bigInteger('iduser')->nullable();
            $table->timestamps();
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
