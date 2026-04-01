<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RevistaController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ArticuloAutorController;

Route::get('/', function () {
    return view('menu');
});

// Recursos principales
Route::resource('/revista', RevistaController::class);
Route::resource('/autor', AutorController::class);
Route::resource('/articulo', ArticuloController::class);
Route::resource('/articulo_autor', ArticuloAutorController::class);

// Rutas específicas para cambio de estado - ¡IMPORTANTE!
// Estas deben ir ANTES que las rutas resource para que no sean interceptadas
Route::get('autor/deactivate/{id}', [AutorController::class, 'deactivate'])->name('autor.deactivate');
Route::put('autor/cambiarEstado/{id}', [AutorController::class, 'cambiarEstado'])->name('autor.cambiarEstado');

Route::get('revista/deactivate/{id}', [RevistaController::class, 'deactivate'])->name('revista.deactivate');
Route::put('revista/cambiarEstado/{id}', [RevistaController::class, 'cambiarEstado'])->name('revista.cambiarEstado');

Route::put('articulo/cambiarEstado/{id}', [ArticuloController::class, 'cambiarEstado'])->name('articulo.cambiarEstado');

// Rutas adicionales
Route::get('/articulo/revista/{id}', [ArticuloController::class, 'porRevista'])->name('articulo.porRevista');
Route::get('autor/porAutor/{id}', [AutorController::class, 'porAutor'])->name('autor.porAutor');