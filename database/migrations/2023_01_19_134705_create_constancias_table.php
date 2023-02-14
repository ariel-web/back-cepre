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
        Schema::create('constancias', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 10)->unique(); //
            $table->char('tipo', 5);
            // CO-E CONS EXAMEN EGRESO
            // CO-EV CONS EXAMEN VOC
            // CE-M CERTIFICADO MEDICO
            // CE-E CERTIFICADO ESTUDIOS
            $table->string('nombre', 40)->nullable();
            $table->boolean('estado')->default(1);
            $table->string('url', 100);
            $table->char('codigo_seguridad_pre', 9); //CODIGO PRE INSCRIPCION
            $table->unsignedBigInteger('id_postulante')->nullable();
            $table->timestamps();
            $table->foreign('id_postulante')->references('id')->on('postulantes');
            $table->foreign('codigo_seguridad_pre')->references('codigo_seguridad')->on('pre_inscripcion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('constancias');
    }
};
