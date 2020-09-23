<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bodega_id');
            $table->foreignId('categoria_id');
            $table->foreignId('unidad_id');
            $table->string('codigo');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('marca')->nullable();
            $table->decimal('precio', 4, 2);
            $table->decimal('stock_minimo', 4, 2)->nullable();
            $table->string('imagen')->nullable();
            $table->foreign('bodega_id')->references('id')->on('bodegas');
            $table->foreign('categoria_id')->references('id')->on('categorias_productos');
            $table->foreign('unidad_id')->references('id')->on('unidades_medidas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
