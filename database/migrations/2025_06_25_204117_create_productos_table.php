<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('marca_id');
            $table->string('nombre');
            $table->string('slug')->unique();
            $table->json('images')->nullable();
            $table->longText('descripcion')->nullable();
            $table->decimal('precio', 10, 2);
            $table->boolean('estado')->default(true);
            $table->boolean('destacado')->default(false);
            $table->boolean('en_stock')->default(true);
            $table->boolean('en_venta')->default(false);
            $table->timestamps();

            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('marca_id')->references('id')->on('marcas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
