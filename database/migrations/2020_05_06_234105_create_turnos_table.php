<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turnos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->enum('llamado', ['0','1']);
            $table->enum('atendido', ['0','1']);
            $table->enum('solucionado', ['0','1']);
            $table->string('observacion')->nullable();
            $table->date('fecha');
            $table->time('inicio');
            $table->time('fin')->nullable();
            $table->unsignedBigInteger('id_users');
            $table->foreign('id_users')->references('id')->on('users');
            $table->unsignedBigInteger('id_clientes');
            $table->foreign('id_clientes')->references('id')->on('clientes');
            $table->unsignedBigInteger('id_modulos');
            $table->foreign('id_modulos')->references('id')->on('modulos');
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
        Schema::dropIfExists('turnos');
    }
}
