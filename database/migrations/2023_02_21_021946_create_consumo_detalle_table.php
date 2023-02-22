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
        Schema::create('consumo_detalle', function (Blueprint $table) {
            $table->integer('idpiso')->nullable(false);
            $table->integer('idmes')->nullable(false);
            $table->integer('idanio')->nullable(false);
            $table->decimal('medidakw',8,4)->nullable();
            $table->decimal('costokw',8,4)->nullable();
            $table->decimal('igv',8,4)->nullable();
            $table->decimal('consumokw',8,4)->nullable();
            $table->decimal('montototalsinigv',8,4)->nullable();
            $table->decimal('montoigv',8,4)->nullable();
            $table->decimal('montototalconigv',8,4)->nullable();
            $table->decimal('montocostoadministrativo',8,4)->nullable();
            $table->decimal('montopagofraccionado',8,4)->nullable();
            $table->decimal('montototal',8,4)->nullable();
            $table->integer('cantPersonas')->default(0);
            $table->integer('idconsumo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consumo_detalle');
    }
};
