<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicioturnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicioturnos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->date('fecha');
            $table->unsignedBigInteger('id_servicios');
            $table->foreign('id_servicios')->references('id')->on('servicios');
            $table->unsignedBigInteger('id_turnos');
            $table->foreign('id_turnos')->references('id')->on('turnos');
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
        Schema::dropIfExists('servicioturnos');
    }
}
