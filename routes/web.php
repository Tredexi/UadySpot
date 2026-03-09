<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FeedController;

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


// Carrito de compras 
Route::post('/carrito/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/carrito', [CartController::class, 'index'])->name('cart.index');
Route::post('/carrito/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/carrito/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::get('/eventos/{id}', [EventController::class, 'show'])->name('events.show');


Route::get('/beneficios', [BenefitController::class, 'index'])->name('benefits.index');

Route::get('/noticias', [NewsController::class, 'index'])->name('news.index');

Route::get('/feed', [FeedController::class, 'index'])->name('feed.index');
