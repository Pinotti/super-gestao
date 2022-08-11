<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Support\Facades\Route;

Route::prefix('/site')->group(function () {
    Route::get('', [PrincipalController::class, 'principal'])->name('site.index');
    Route::get('sobrenos', [SobreNosController::class, 'sobrenos'])->name('site.sobrenos');
    Route::get('contato', [ContatoController::class, 'contato'])->name('site.contato');
    Route::post('contato', [ContatoController::class, 'store'])->name('site.contato');
    Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
    Route::post('/login', [LoginController::class, 'autenticar'])->name('site.autenticar');
});


Route::prefix('/app')->group(function () {
    
});
