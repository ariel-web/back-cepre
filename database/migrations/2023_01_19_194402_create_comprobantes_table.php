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
        Schema::create('comprobantes', function (Blueprint $table) {
            $table->id();
            $table->string('nro_operacion');
            $table->date('fecha');//fecha
            $table->time('hora')->nullable();
            $table->char('codigo', 5)->default('26')->nullable(); //39 - EXAMEN MÉDICO 
            //$table->string('tipo', 30)->default('PAGO POR DERECHO DE ADMISION'); // 'PAGO POR EXAMEN MEDICO' 
            $table->boolean('estado')->default(0); //->nullable()
            $table->char('codigo_seguridad_pre', 9); // codigo pre-inscripcion
            $table->timestamps();
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
        Schema::dropIfExists('comprobantes');
    }
};
