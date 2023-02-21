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
        Schema::create('consumo', function (Blueprint $table) {
            $table->id('idconsumo')->autoIncrement()->nullable(false);;
            $table->integer('idmes');
            $table->integer('idanio');
            $table->decimal('consumokwtotal',8,4)->nullable();
            $table->decimal('precioxkw',8,4)->nullable();
            $table->decimal('costoadministrativo',8,4)->nullable();
            $table->decimal('costofraccionamiento',8,4)->nullable();
            $table->decimal('costototalconsumo',8,4)->nullable();
            $table->decimal('igv',8,4)->nullable();
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
        Schema::dropIfExists('consumo');
    }
};
