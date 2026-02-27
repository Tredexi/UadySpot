<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;

Route::get('/', [HomeController::class, 'index'])->name('inicio');
Route::get('/eventos', [EventController::class, 'index'])->name('events.index');

// Rutas para el Registro
Route::get('/registro', [AuthController::class, 'showRegister'])->name('registro');
Route::post('/registro', [AuthController::class, 'register'])->name('registro.post');

// Ruta para la Bolsa de Trabajo
Route::get('/bolsa-de-trabajo', [JobController::class, 'index'])->name('jobs.index');