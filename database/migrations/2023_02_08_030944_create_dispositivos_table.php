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
        Schema::create('dispositivos', function (Blueprint $table) {
            $table->id('iddispositivo')->autoIncrement();
            $table->string('nombre');
            $table->string('descripcion');
            $table->text('imagen')->nullable();
            $table->integer('estado')->nullable();
            $table->integer('disponibilidad')->nullable();
            $table->integer('usuariocreacion')->nullable();
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
        Schema::dropIfExists('dispositivos');
    }
};
