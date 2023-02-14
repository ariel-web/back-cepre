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
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id();
            $table->string('huella',100);
            $table->string('foto',100);
            $table->unsignedBigInteger('id_postulante');
            $table->unsignedBigInteger('id_proceso');
            $table->unsignedBigInteger('id_programa');
            $table->char('codigo_constancia',10);
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_modalidad');
            $table->foreign('id_postulante')->references('id')->on('postulantes');
            $table->foreign('id_proceso')->references('id')->on('procesos');
            $table->foreign('id_programa')->references('id')->on('programa_de_estudios');
            $table->foreign('codigo_constancia')->references('codigo')->on('constancias');
            $table->foreign('id_usuario')->references('id')->on('users');
            
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
        Schema::dropIfExists('inscripciones');
    }
};
