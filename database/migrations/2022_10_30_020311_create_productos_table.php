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
            $table->unsignedBigInteger('idcategoria');
            $table->string('codigo',50)->nullable();
            $table->string('nombre',50)->unique();
            $table->decimal('precio_venta',11,2);
            $table->integer('stock');
            $table->string('descripcion',256)->nullable();
            $table->boolean('condicion')->default(1);
            $table->string('imagen')->nullable();
            $table->timestamps();
            $table->foreign('idcategoria')->references('id')->on('categorias');
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
