<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/autor', 'App\Http\Controllers\ControllerAutor');
Route::resource('/articulo', 'App\Http\Controllers\ControllerArticulo');
Route::resource('/revista', 'App\Http\Controllers\ControllerRevista');


