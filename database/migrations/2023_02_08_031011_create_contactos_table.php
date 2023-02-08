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
            $table->string('apellidos')->nullable();
            $table->longText('avatar')->nullable();
            $table->string('cargo')->nullable();
            $table->string('organizacion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('celular');
            $table->string('direccion')->nullable();
            $table->string('ciudad');
            $table->string('correo')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('otros')->nullable();
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
