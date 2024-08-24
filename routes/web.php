<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthAdminController;
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

Route::get('/cadastro-admin', function () {
    return view('cadastro-admin');
})->name('cadastro-admin');


Route::get('/cadastro', [RegisterController::class, 'showRegistrationForm'])->name('cadastro');
Route::post('/cadastro-post', [RegisterController::class, 'cadastro'])->name('cadastro-post');
Route::post('/cadastro-admin', [AuthAdminController::class, 'cadastro'])->name('cadastro-admin');

Route::post('/login-usuario', [AuthController::class, 'loginUsuario'])->name('login-usuario');
Route::post('/login-administrador', [AuthAdminController::class, 'loginAdmin'])->name('login-administrador');


Route::middleware('auth')->group(function () {
    Route::patch('/passagens/salvar', [PassagemController::class, 'salvarPassagem'])->name('passagens.salvar');
    Route::get('/home', [PassagemController::class, 'index'])->name('home');

    Route::resource('passagens', PassagemController::class);

    Route::get('/venderpassagem', function() {
        return view('vender-passagem');
    })->name('vender-passagem');

    Route::get('/passagens', [PassagemController::class, 'index'])->name('passagens.index');
    Route::post('passagens/comprar', [PassagemController::class, 'comprar'])->name('passagens.comprar');
    Route::post('passagens/adicionar', [PassagemController::class, 'adicionar'])->name('passagens.adicionar');
});
