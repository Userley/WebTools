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
        Schema::create('pisos_casa', function (Blueprint $table) {
            $table->id('idpiso')->autoIncrement();
            $table->string('descripcion')->nullable();
            $table->string('direccion')->nullable();
            $table->string('encargado')->nullable();
            $table->string('telefono')->nullable();
            $table->integer('idusuario')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pisos_casa');
    }
};
