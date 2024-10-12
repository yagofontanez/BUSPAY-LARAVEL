<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PassagemController;
use App\Http\Controllers\PaymentController;
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

Route::post('/pagamento', [PaymentController::class, 'createPayment'])->name('pagamento');
Route::get('/cadastro', [RegisterController::class, 'showRegistrationForm'])->name('cadastro');
Route::post('/cadastro-post', [RegisterController::class, 'cadastro'])->name('cadastro-post');
Route::post('/cadastro-admin', [AuthAdminController::class, 'cadastro'])->name('cadastro-admin');

Route::post('/login-usuario', [AuthController::class, 'loginUsuario'])->name('login-usuario');
Route::post('/login-administrador', [AuthAdminController::class, 'loginAdmin'])->name('login-administrador');
Route::delete('/delete-passagem/${id}', [AuthAdminController::class, 'destroy']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::delete('/delete-passagem/{id}', [AuthAdminController::class, 'destroy'])->name('delete-passagem');
    Route::patch('/passagens/salvar', [PassagemController::class, 'salvarPassagem'])->name('passagens.salvar');
    Route::get('/home', [PassagemController::class, 'index'])->name('home');
    Route::get('/administrador', [AuthAdminController::class, 'index'])->name('administrador');
    Route::get('/vender-passagem', [PassagemController::class, 'index_vender'])->name('vender-passagem');
    Route::delete('/delete-passagem/{id}', [PassagemController::class, 'destroy'])->name('delete-passagem');

    Route::resource('passagens', PassagemController::class);

    // Route::get('/venderpassagem', function() {
    //     return view('vender-passagem');
    // })->name('vender-passagem');

    Route::get('/passagens', [PassagemController::class, 'index'])->name('passagens.index');
    Route::post('passagens/comprar', [PassagemController::class, 'comprar'])->name('passagens.comprar');
    Route::post('passagens/adicionar', [PassagemController::class, 'adicionar'])->name('passagens.adicionar');

    Route::post('/vender-passagem', [PassagemController::class, 'store'])->name('passagens.store');

    Route::get('/passagens', [PassagemController::class, 'index'])->name('passagens.index');
    Route::get('/buy-ticket', [PassagemController::class, 'goToCart'])->name('buy-ticket');



    // Route::get('buy-ticket', function() {
    //     return view('buy-ticket');
    // })->name('buy-ticket');

    Route::get('home-adm', function() {
        return view('home-adm');
    })->name('home-adm');
});
