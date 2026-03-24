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
            $table->string('ISSN', 20)->unique();
            $table->integer('numero_revista');
            $table->string('titulo', 150);
            $table->date('fecha_lanzamiento');
            $table->string('categoria', 100);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('revistas');
    }
};