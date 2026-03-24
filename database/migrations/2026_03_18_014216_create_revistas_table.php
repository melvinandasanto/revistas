<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('revistas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 150);
            $table->string('issn', 20);
            $table->integer('numero');
            $table->year('anio_publicacion');
            $table->boolean('activo')->default(true);
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['issn', 'numero', 'anio_publicacion']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('revistas');
    }
};