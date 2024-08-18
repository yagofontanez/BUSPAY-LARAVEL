<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PassagemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/login-user', function () {
    return view('login-user');
})->name('login-user');

Route::get('/login-adm', function () {
    return view('login-adm');
})->name('login-adm');


Route::get('/cadastro', [RegisterController::class, 'showRegistrationForm'])->name('cadastro');
Route::post('/cadastro', [RegisterController::class, 'cadastro'])->name('cadastro');

Route::post('/login-usuario', [AuthController::class, 'loginUsuario'])->name('login-usuario');


Route::middleware('auth')->group(function () {
    Route::get('/home', [PassagemController::class, 'index'])->name('home');

    Route::resource('passagens', PassagemController::class);

    Route::post('passagens/comprar', [PassagemController::class, 'comprar'])->name('passagens.comprar');
    Route::post('passagens/adicionar', [PassagemController::class, 'adicionar'])->name('passagens.adicionar');
});
