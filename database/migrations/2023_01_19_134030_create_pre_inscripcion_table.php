<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_inscripcion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_postulante');
            $table->unsignedBigInteger('id_programa_estudios');
            $table->unsignedBigInteger('id_proceso');
            $table->char('codigo_seguridad',9)->unique(); //codigo pre-inscripcion
            $table->timestamps();
            $table->foreign('id_postulante')->references('id')->on('postulantes');
            $table->foreign('id_programa_estudios')->references('id')->on('programa_de_estudios');
            $table->foreign('id_proceso')->references('id')->on('procesos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pre_inscripcion');
    }
};
