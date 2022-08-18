<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SobreNosController;
use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::get('', [PrincipalController::class, 'principal'])->name('site.index');
    Route::get('sobrenos', [SobreNosController::class, 'sobrenos'])->name('site.sobrenos');
    Route::get('contato', [ContatoController::class, 'contato'])->name('site.contato');
    Route::post('contato', [ContatoController::class, 'store'])->name('site.contato');
    Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
    Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');
});

Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');
    Route::get('/sair', [LoginController::class, 'sair'])->name('app.sair');
    Route::get('/cliente', [ClienteController::class, 'index'])->name('app.cliente');
    Route::get('/fornecedor', [FornecedorController::class, 'index'])->name('app.fornecedor');
    Route::get('/produto', [ProdutoController::class, 'index'])->name('app.produto');
});

Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para ir para página inicial';
});
