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
        Schema::create('lenguaje', function (Blueprint $table) {
            $table->id('idlenguaje')->autoIncrement();
            $table->string('nombre')->nullable(false);
            $table->longText('logo')->nullable(false);
            $table->string('descripcion')->nullable(true);
            $table->timestamp('fecharegistro')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lenguaje');
    }
};
