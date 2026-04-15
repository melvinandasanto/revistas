<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class AddMissingColumns extends Command
{
    protected $signature = 'db:add-missing-columns';
    protected $description = 'Add missing rol column to users table if not exists';

    public function handle()
    {
        Schema::table('users', function ($table) {
            if (!Schema::hasColumn('users', 'rol')) {
                $table->string('rol')->default('usuario')->comment('admin, autor, usuario');
                $this->info('✓ Columna "rol" agregada');
            } else {
                $this->info('- Columna "rol" ya existe');
            }

            if (!Schema::hasColumn('users', 'activo')) {
                $table->boolean('activo')->default(true);
                $this->info('✓ Columna "activo" agregada');
            } else {
                $this->info('- Columna "activo" ya existe');
            }
        });

        $this->info('Base de datos actualizada correctamente');
    }
}
