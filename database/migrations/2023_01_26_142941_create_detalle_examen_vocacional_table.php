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
        Schema::create('detalle_examen_vocacional', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_examen_vocacional');
            $table->unsignedBigInteger('id_pregunta');
            $table->unsignedBigInteger('id_postulante');
            $table->unsignedBigInteger('id_respuesta')->nullable();
            $table->foreign('id_examen_vocacional')->references('id')->on('examen_vocacional');
            $table->foreign('id_pregunta')->references('id')->on('preguntas');
            $table->foreign('id_postulante')->references('id')->on('postulantes');
            $table->foreign('id_respuesta')->references('id')->on('respuestas');
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
        Schema::dropIfExists('detalle_examen_vocacional');
    }

};