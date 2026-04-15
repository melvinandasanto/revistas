<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RevistaController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\UsuarioController;

// ---------------------------------
// LOGIN Y MENÚ PRINCIPAL (público)
// ---------------------------------
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/menu', function() {
    return view('menu');
})->middleware('auth')->name('menu');

// ---------------------------------
// RUTAS DE USUARIOS - SOLO ADMIN
// ---------------------------------
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
    Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');
    Route::get('/usuarios/{id}/delete', [UsuarioController::class, 'delete'])->name('usuarios.delete');
    Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
    Route::get('/usuarios/deactivate/{id}', [UsuarioController::class, 'deactivate'])->name('usuarios.deactivate');
    Route::put('/usuarios/cambiarEstado/{id}', [UsuarioController::class, 'cambiarEstado'])->name('usuarios.cambiarEstado');
});

// ---------------------------------
// RUTAS DE LECTURA - TODOS (menos create/edit/delete)
// ---------------------------------
Route::middleware(['auth'])->group(function () {
    // Rutas específicas sin parámetros PRIMERO
    Route::get('/revista', [RevistaController::class, 'index'])->name('revista.index');
    Route::get('/autor', [AutorController::class, 'index'])->name('autor.index');
    Route::get('/articulo', [ArticuloController::class, 'index'])->name('articulo.index');
    
    // Rutas específicas con paths DESPUÉS
    Route::get('/articulo/revista/{id}', [ArticuloController::class, 'porRevista'])->name('articulo.porRevista')->where('id', '[0-9]+');
    Route::get('/articulo/autor/{id}', [AutorController::class, 'porAutor'])->name('articulo.porAutor')->where('id', '[0-9]+');
    
    // Rutas parametrizadas FINALMENTE (solo números para evitar /create, /edit, etc)
    Route::get('/revista/{id}', [RevistaController::class, 'show'])->name('revista.show')->where('id', '[0-9]+');
    Route::get('/autor/{id}', [AutorController::class, 'show'])->name('autor.show')->where('id', '[0-9]+');
    Route::get('/articulo/{id}', [ArticuloController::class, 'show'])->name('articulo.show')->where('id', '[0-9]+');
});

// ---------------------------------
// RUTAS DE ESCRITURA - SOLO ADMIN (create, edit, delete, toggle)
// ---------------------------------
Route::middleware(['auth', 'restrict_writes'])->group(function () {
    // ===== REVISTA =====
    // 1. POST (create/store - sin parámetros)
    Route::post('/revista', [RevistaController::class, 'store'])->name('revista.store');
    // 2. GET específicas sin parámetro (create)
    Route::get('/revista/create', [RevistaController::class, 'create'])->name('revista.create');
    // 3. GET/PUT específicas CON parámetro en ruta (deactivate/{id}, no confundir con /{id})
    Route::get('/revista/deactivate/{id}', [RevistaController::class, 'deactivate'])->name('revista.deactivate')->where('id', '[0-9]+');
    Route::put('/revista/cambiarEstado/{id}', [RevistaController::class, 'cambiarEstado'])->name('revista.cambiarEstado')->where('id', '[0-9]+');
    // 4. Rutas parametrizadas FINALMENTE (/{id}/*) - con constraint de números
    Route::get('/revista/{id}/edit', [RevistaController::class, 'edit'])->name('revista.edit')->where('id', '[0-9]+');
    Route::put('/revista/{id}', [RevistaController::class, 'update'])->name('revista.update')->where('id', '[0-9]+');
    Route::get('/revista/{id}/delete', [RevistaController::class, 'delete'])->name('revista.delete')->where('id', '[0-9]+');
    Route::delete('/revista/{id}', [RevistaController::class, 'destroy'])->name('revista.destroy')->where('id', '[0-9]+');
    
    // ===== AUTOR =====
    // 1. POST (create/store - sin parámetros)
    Route::post('/autor', [AutorController::class, 'store'])->name('autor.store');
    // 2. GET específicas sin parámetro (create)
    Route::get('/autor/create', [AutorController::class, 'create'])->name('autor.create');
    // 3. GET/PUT específicas CON parámetro en ruta (deactivate/{id}, no confundir con /{id})
    Route::get('/autor/deactivate/{id}', [AutorController::class, 'deactivate'])->name('autor.deactivate')->where('id', '[0-9]+');
    Route::put('/autor/cambiarEstado/{id}', [AutorController::class, 'cambiarEstado'])->name('autor.cambiarEstado')->where('id', '[0-9]+');
    // 4. Rutas parametrizadas FINALMENTE (/{id}/*) - con constraint de números
    Route::get('/autor/{id}/edit', [AutorController::class, 'edit'])->name('autor.edit')->where('id', '[0-9]+');
    Route::put('/autor/{id}', [AutorController::class, 'update'])->name('autor.update')->where('id', '[0-9]+');
    Route::get('/autor/{id}/delete', [AutorController::class, 'delete'])->name('autor.delete')->where('id', '[0-9]+');
    Route::delete('/autor/{id}', [AutorController::class, 'destroy'])->name('autor.destroy')->where('id', '[0-9]+');
    
    // ===== ARTICULO =====
    // 1. POST (create/store - sin parámetros)
    Route::post('/articulo', [ArticuloController::class, 'store'])->name('articulo.store');
    // 2. GET específicas sin parámetro (create)
    Route::get('/articulo/create', [ArticuloController::class, 'create'])->name('articulo.create');
    // 3. GET/PUT específicas CON parámetro en ruta (deactivate/{id}, no confundir con /{id})
    Route::get('/articulo/deactivate/{id}', [ArticuloController::class, 'deactivate'])->name('articulo.deactivate')->where('id', '[0-9]+');
    Route::put('/articulo/cambiarEstado/{id}', [ArticuloController::class, 'cambiarEstado'])->name('articulo.cambiarEstado')->where('id', '[0-9]+');
    // 4. Rutas parametrizadas FINALMENTE (/{id}/*) - con constraint de números
    Route::get('/articulo/{id}/edit', [ArticuloController::class, 'edit'])->name('articulo.edit')->where('id', '[0-9]+');
    Route::put('/articulo/{id}', [ArticuloController::class, 'update'])->name('articulo.update')->where('id', '[0-9]+');
    Route::get('/articulo/{id}/delete', [ArticuloController::class, 'delete'])->name('articulo.delete')->where('id', '[0-9]+');
    Route::delete('/articulo/{id}', [ArticuloController::class, 'destroy'])->name('articulo.destroy')->where('id', '[0-9]+');
});

// ---------------------------------
// RUTAS ESPECIALES POR ROL
// ---------------------------------
Route::middleware(['auth', 'autor'])->group(function () {
    // Solo autores: mis artículos donde participan como autores
    Route::get('/mis-articulos', [ArticuloController::class, 'misArticulos'])->name('articulo.misArticulos');
});

