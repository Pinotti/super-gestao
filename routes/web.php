<?php

use App\Http\Controllers\PrincipalController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PrincipalController::class, 'principal'])->name('principal.index');
