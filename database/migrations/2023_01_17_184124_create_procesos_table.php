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
    Schema::create('procesos', function (Blueprint $table) {
      $table->id();
      $table->string('nombre', 100);
      $table->string('sede', 50)->nullable();
      $table->string('tipo_proceso', 30)->default('PRESENCIAL');
      $table->char('anio', 4);
      $table->boolean('estado')->default(1);
      $table->integer('nro_convocatoria');
      $table->unsignedBigInteger('id_usuario');
      $table->timestamps();
      $table->foreign('id_usuario')->references('id')->on('users');
    });
  }


  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('procesos');
  }
};
