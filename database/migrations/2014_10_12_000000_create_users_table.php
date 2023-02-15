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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->char('dni',8)->unique()->nullable();
            $table->char('celular',12)->nullable();
            $table->string('nombres',50)->nullable();
            $table->string('apellidos',50)->nullable();
            $table->string('email')->unique();
            $table->integer('rol')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('estado')->default(1);
            $table->integer('estado_password')->default(1);
            $table->rememberToken();
            $table->timestamps();
//            $table->unique(['dni', 'celular'], 'dni_celular');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
