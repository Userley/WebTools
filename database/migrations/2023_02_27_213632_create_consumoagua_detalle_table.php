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
        Schema::create('consumoagua_detalle', function (Blueprint $table) {
            $table->integer('idpiso')->nullable(false);
            $table->integer('idmes')->nullable(false);
            $table->integer('idanio')->nullable(false);
            $table->integer('cantpersonas')->nullable(false);
            $table->decimal('montoxpersona',8,4)->nullable();
            $table->decimal('subtotal',8,4)->nullable();
            $table->integer('idconsumoagua');
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
        Schema::dropIfExists('consumoagua_detalle');
    }
};
