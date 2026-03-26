<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RevistaController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\ArticuloController;


Route::get('/', function () {
    return view('menu');
});

Route::resource('/revista', RevistaController::class);
Route::resource('/autor', AutorController::class);
Route::resource('/articulo', ArticuloController::class);

Route::get('autor/deactivate/{id}', [AutorController::class, 'deactivate']);
Route::put('autor/cambiarEstado/{id}', [AutorController::class, 'cambiarEstado']);


Route::get('/articulo/revista/{id}', [ArticuloController::class, 'porRevista']);
Route::get('autor/porAutor/{id}', [AutorController::class, 'porAutor']);