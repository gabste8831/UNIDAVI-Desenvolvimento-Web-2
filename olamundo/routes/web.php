<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImcController;
use App\Http\Controllers\ViagemController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/imc', [ImcController::class, 'index'])->name('imc.index');
Route::post('/imc/calcular', [ImcController::class, 'calcular'])->name('imc.calcular');

Route::get('/viagem', [ViagemController::class, 'index'])->name('viagem.index');
Route::post('/viagem/calcular', [ViagemController::class, 'calcular'])->name('viagem.calcular');
