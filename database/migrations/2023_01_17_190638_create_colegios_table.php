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
        Schema::create('colegios', function (Blueprint $table) {
            $table->id();
            $table->string('cod_modular',10)->nullable();
            $table->string('nombre',150);
            $table->string('ubigeo',10)->nullable();
            $table->string('cod_ugel',8)->nullable();
            $table->string('ugel',50)->nullable();
            $table->string('cod_local',8)->nullable();
            $table->string('direccion',200)->nullable();
            $table->string('nivel_modalidad',150)->nullable();
            $table->string('gestion')->nullable();
            $table->string('dependencia')->nullable();            
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
        Schema::dropIfExists('colegios');
    }
};
