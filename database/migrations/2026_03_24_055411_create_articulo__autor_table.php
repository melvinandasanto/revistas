<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articulo_autor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('articulo_id')->constrained('articulos')->onDelete('cascade');
            $table->foreignId('autor_id')->constrained('autores')->onDelete('cascade');
            $table->integer('posicion');
            $table->boolean('activo')->default(true);
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['articulo_id', 'autor_id']);
            $table->unique(['articulo_id', 'posicion']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articulo_autor');
    }
};