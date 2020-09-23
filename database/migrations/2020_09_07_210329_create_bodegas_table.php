<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBodegasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bodegas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique();
            $table->string('nombre', 50);
            $table->enum('tipo_documento', ['RUC', 'DNI']);
            $table->string('numero_documento', 11);
            $table->string('razon_social', 50);
            $table->string('telefono', 9);
            $table->string('web', 50);
            $table->string('email', 60);
            $table->string('direccion', 60);
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bodegas');
    }
}
