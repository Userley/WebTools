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
        Schema::create('consumoagua', function (Blueprint $table) {
            $table->id('idconsumoagua')->autoIncrement()->nullable(false);;
            $table->integer('idmes');
            $table->integer('idanio');
            $table->decimal('costototalconsumo',8,4)->nullable();
            $table->longText('image')->nullable();
            $table->string('comentarios')->nullable();
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
        Schema::dropIfExists('consumoagua');
    }
};
