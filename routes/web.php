<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;

// Página principal
Route::get('/', [HomeController::class, 'index'])->name('inicio');

// Eventos
Route::get('/eventos', [EventController::class, 'index'])->name('events.index');

// Bolsa de trabajo
Route::get('/bolsa-de-trabajo', [JobController::class, 'index'])->name('jobs.index');

// Registro
Route::get('/registro', [AuthController::class, 'showRegister'])->name('registro');
Route::post('/registro', [AuthController::class, 'register'])->name('registro.post');

