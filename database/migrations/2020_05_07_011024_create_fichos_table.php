<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->date('fecha');
            $table->integer('turnosdeldia', false, true);
            $table->integer('numerodeturnos', false, true);
            $table->unsignedBigInteger('id_dependencias');
            $table->foreign('id_dependencias')->references('id')->on('dependencias');
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
        Schema::dropIfExists('fichos');
    }
}
