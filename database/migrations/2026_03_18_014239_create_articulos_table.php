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
            $table->string('titulo', 150)->unique();
            $table->integer('pag_inicio');
            $table->integer('pag_fin');
            $table->foreignId('revista_id')->constrained('revistas')->onDelete('cascade');
            $table->boolean('activo')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articulos');
    }
};