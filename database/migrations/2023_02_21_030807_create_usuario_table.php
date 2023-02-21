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
        Schema::create('usuario', function (Blueprint $table) {
            $table->id('idusuario')->autoIncrement();
            $table->string('nombres')->nullable();
            $table->string('apellidos')->nullable();
            $table->longText('avatar')->nullable();
            $table->string('nickname')->nullable();
            $table->string('password')->nullable();
            $table->string('dni')->nullable();
            $table->string('correo')->nullable();
            $table->string('celular')->nullable();
            $table->date('fechanac')->nullable();
            $table->string('tipousuario')->nullable();
            $table->boolean('estado')->nullable();
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
        Schema::dropIfExists('usuario');
    }
};
