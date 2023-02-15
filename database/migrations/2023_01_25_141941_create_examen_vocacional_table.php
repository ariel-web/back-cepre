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
        Schema::create('examen_vocacional', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',60);
            $table->integer('nota');
            $table->unsignedBigInteger('id_programa');
            $table->timestamps();
            $table->foreign('id_programa')->references('id')->on('programa_de_estudios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examen_vocacional');
    }
};
