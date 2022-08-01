<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use Illuminate\Support\Facades\Route;

Route::prefix('/site')->group(function () {
    Route::get('', [PrincipalController::class, 'principal'])->name('site.index');
    Route::get('sobrenos', [SobreNosController::class, 'sobrenos'])->name('site.sobrenos');
    Route::get('contato', [ContatoController::class, 'contato'])->name('site.contato');
    Route::post('contato', [ContatoController::class, 'contato'])->name('site.contato');
});


Route::prefix('/app')->group(function () {
    
});
