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
        Schema::create('apoderados', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_doc', 40);
            $table->char('nro_documento', 12);
            $table->char('tipo', 1); //P -  M 
            $table->string('paterno', 50);
            $table->string('materno', 50)->nullable();
            $table->string('nombres', 50);
            $table->unsignedBigInteger('id_postulante');
            $table->timestamps();
            $table->foreign('id_postulante')->references('id')->on('postulantes');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apoderados');
    }
};
