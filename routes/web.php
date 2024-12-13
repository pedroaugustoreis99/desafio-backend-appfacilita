<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('usuarios', App\Http\Controllers\UsuarioController::class);
Route::resource('generos', App\Http\Controllers\GeneroController::class);
Route::resource('autor', App\Http\Controllers\AutorController::class);
Route::resource('livros', App\Http\Controllers\LivroController::class);
Route::resource('emprestimos', App\Http\Controllers\EmprestimoController::class);