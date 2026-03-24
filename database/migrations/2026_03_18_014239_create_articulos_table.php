<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo_art', 150);
            $table->integer('pag_inicio');
            $table->integer('pag_fin');
            $table->unsignedBigInteger('revista_id');
            $table->unsignedBigInteger('autor_id');
            $table->timestamps();
            
            $table->foreign('revista_id')
                  ->references('id')
                  ->on('revistas')
                  ->onDelete('cascade');
                  
            $table->foreign('autor_id')
                  ->references('id')
                  ->on('autores')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articulos');
    }
};