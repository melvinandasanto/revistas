<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RevistaController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\UsuarioController;

Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/toggle/{id}', [UsuarioController::class, 'toggle'])->name('usuarios.toggle');
// ---------------------------------
// LOGIN Y MENÚ PRINCIPAL
// ---------------------------------
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/menu', function() {
    return view('menu'); // menu principal con botones de Revistas, Artores y Artículos
})->middleware('auth'); // solo usuarios logueados

// ---------------------------------
// RUTAS PROTEGIDAS CON AUTH
// ---------------------------------
Route::middleware(['auth'])->group(function () {

    // RUTAS DE REVISTA, AUTOR Y ARTICULO
    Route::resource('/revista', RevistaController::class);
    Route::resource('/autor', AutorController::class);
    Route::resource('/articulo', ArticuloController::class);

    // Rutas específicas para cambio de estado
    Route::get('autor/deactivate/{id}', [AutorController::class, 'deactivate'])->name('autor.deactivate');
    Route::put('autor/cambiarEstado/{id}', [AutorController::class, 'cambiarEstado'])->name('autor.cambiarEstado');

    Route::get('revista/deactivate/{id}', [RevistaController::class, 'deactivate'])->name('revista.deactivate');
    Route::put('revista/cambiarEstado/{id}', [RevistaController::class, 'cambiarEstado'])->name('revista.cambiarEstado');

    Route::get('articulo/deactivate/{id}', [ArticuloController::class, 'deactivate'])->name('articulo.deactivate');
    Route::put('articulo/cambiarEstado/{id}', [ArticuloController::class, 'cambiarEstado'])->name('articulo.cambiarEstado');

    // Rutas adicionales
    Route::get('/articulo/revista/{id}', [ArticuloController::class, 'porRevista'])->name('articulo.porRevista');
    Route::get('/articulo/autor/{id}', [AutorController::class, 'porAutor'])->name('articulo.porAutor');
});