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
        Schema::create('contactos', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('organizacion');
            $table->string('telefono');
            $table->string('celular');
            $table->string('direccion');
            $table->string('ciudad');
            $table->string('correo');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->string('tiktok');
            $table->string('otros');
            $table->integer('estado');
            $table->integer('oculto');
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
        Schema::dropIfExists('contactos');
    }
};
