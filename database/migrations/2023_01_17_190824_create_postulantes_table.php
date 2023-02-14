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
        Schema::create('postulantes', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_doc',40); // 
            $table->char('nro_doc',12)->unique();
            $table->string('primer_apellido',40);
            $table->string('segundo_apellido',50)->nullable();
            $table->string('apellido_casada',50)->nullable();
            $table->string('nombres',50);
            $table->char('sexo',1);
            $table->date('fec_nacimiento');
            $table->char('ubigeo_nacimiento',8)->nullable();
            $table->char('ubigeo_residencia',8)->nullable();
            $table->boolean('discapacidad')->default(0)->nullable();//despues
            $table->string('tipo_discapacidad',60)->nullable();//despues
            $table->char('celular',12)->unique();
            $table->string('email',100)->unique();
            $table->char('estado_civil', 1);
            $table->string('direccion',100);
            $table->char('anio_egreso',4);
            $table->string('correo_institucional',100)->nullable();
            $table->string('cod_orcid',100)->nullable();
            $table->string('observaciones',100)->nullable();
            $table->unsignedBigInteger('id_colegio');
            $table->timestamps();
            $table->foreign('id_colegio')->references('id')->on('colegios');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postulantes');
    }
};
