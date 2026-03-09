<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CareerController;

// Página principal
Route::get('/', [HomeController::class, 'index'])->name('inicio');

// Eventos
Route::get('/eventos', [EventController::class, 'index'])->name('events.index');

// Bolsa de trabajo
Route::get('/bolsa-de-trabajo', [JobController::class, 'index'])->name('jobs.index');

// Registro
Route::get('/registro', [AuthController::class, 'showRegister'])->name('registro');
Route::post('/registro', [AuthController::class, 'register'])->name('registro.post');

//Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

//Nosotros
Route::get('/nosotros', function () {
    return view('nosotros');
})->name('nosotros');

//Calendario
Route::get('/calendario', [EventController::class, 'calendario'])->name('calendario');

// Carreras
Route::get('/carreras', [CareerController::class, 'index'])->name('careers.index');