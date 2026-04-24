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
use App\Http\Controllers\SocialController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ComentarioController;

// ============================
// RUTAS PUBLICAS
// ============================

// Página principal
Route::get('/', [HomeController::class, 'index'])->name('inicio');

// Eventos públicos
Route::get('/eventos', [EventController::class, 'index'])->name('events.index');

Route::get('/eventos/{id}', [EventController::class, 'show'])->name('events.show');

// Beneficios públicos
Route::get('/beneficios', [BenefitController::class, 'index'])->name('benefits.index');

// Registro
Route::get('/registro', [AuthController::class, 'showRegister'])->name('registro');
Route::post('/registro', [AuthController::class, 'register'])->name('registro.post');

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Nosotros
Route::get('/nosotros', function () {
    return view('nosotros');
})->name('nosotros');

//comentarios
Route::post(
'/comentarios',
[ComentarioController::class,'store']
)->name('comentarios.store');


// ============================
// RUTAS PROTEGIDAS (LOGIN)
// ============================
// Rutas protegidas para usuarios autenticados


Route::middleware(['auth'])->group(function () {

    // Bolsa de trabajo
    Route::get('/bolsa-de-trabajo',
        [JobController::class, 'index'])
        ->name('jobs.index');

    // Carreras
    Route::get('/carreras',
        [CareerController::class, 'index'])
        ->name('careers.index');

    // Noticias
    Route::get('/noticias',
        [NewsController::class, 'index'])
        ->name('news.index');

    // Social
    Route::get('/social',
        [SocialController::class, 'index'])
        ->name('social.index');

    // Calendario
    Route::get('/calendario',
        [EventController::class, 'calendario'])
        ->name('calendario');

    // Carrito
    Route::post('/carrito/add/{id}',
        [CartController::class, 'add'])
        ->name('cart.add');

    Route::get('/carrito',
        [CartController::class, 'index'])
        ->name('cart.index');

    Route::post('/carrito/remove/{id}',
        [CartController::class, 'remove'])
        ->name('cart.remove');

    Route::get('/carrito/clear',
        [CartController::class, 'clear'])
        ->name('cart.clear');

    Route::get('/perfil',
        [AuthController::class, 'perfil'])
        ->name('auth.profile');

    Route::put('/perfil/update',
    [AuthController::class, 'update'])
    ->name('auth.profile.update');


});

// ============================
// RUTAS ADMIN
// ============================

// Rutas protegidas para administración

Route::middleware([
        'auth',
        'admin',
        'session.timeout'
    ])
    ->prefix('admin')
    ->group(function () {

        Route::get('/',
            [AdminController::class,'dashboard']
        )->name('admin.dashboard');
           
        // =========================
       // ADMIN EVENTOS           
       //  // =========================


            Route::get(
                '/eventos',
                [EventController::class,'adminIndex']
            )->name('admin.evento.index');

            Route::get(
                '/eventos/create',
                [EventController::class,'adminCreate']
            )->name('admin.evento.create');

            Route::post(
                '/eventos',
                [EventController::class,'adminStore']
            )->name('admin.evento.store');

            Route::get(
                '/eventos/{id}/edit',
                [EventController::class,'adminEdit']
            )->name('admin.evento.edit');

            Route::put(
                '/eventos/{id}',
                [EventController::class,'adminUpdate']
            )->name('admin.evento.update');

            Route::delete(
                '/eventos/{id}',
                [EventController::class,'adminDestroy']
            )->name('admin.evento.destroy');




            // =========================
            // ADMIN BENEFICIOS
            // =========================

            Route::get(
            '/beneficios',
            [BenefitController::class,'adminIndex']
            )->name('admin.beneficio.index');

            Route::get(
            '/beneficios/create',
            [BenefitController::class,'adminCreate']
            )->name('admin.beneficio.create');

            Route::post(
            '/beneficios',
            [BenefitController::class,'adminStore']
            )->name('admin.beneficio.store');

            Route::get(
            '/beneficios/{id}/edit',
            [BenefitController::class,'adminEdit']
            )->name('admin.beneficio.edit');

            Route::put(
            '/beneficios/{id}',
            [BenefitController::class,'adminUpdate']
            )->name('admin.beneficio.update');

            Route::delete(
            '/beneficios/{id}',
            [BenefitController::class,'adminDestroy']
            )->name('admin.beneficio.destroy');
        



            // =========================
            // ADMIN TRABAJOS
            // =========================

            Route::get(
            '/trabajos',
            [JobController::class,'adminIndex']
            )->name('admin.trabajo.index');

            Route::get(
            '/trabajos/create',
            [JobController::class,'adminCreate']
            )->name('admin.trabajo.create');

            Route::post(
            '/trabajos',
            [JobController::class,'adminStore']
            )->name('admin.trabajo.store');

            Route::get(
            '/trabajos/{id}/edit',
            [JobController::class,'adminEdit']
            )->name('admin.trabajo.edit');

            Route::put(
            '/trabajos/{id}',
            [JobController::class,'adminUpdate']
            )->name('admin.trabajo.update');

            Route::delete(
            '/trabajos/{id}',
            [JobController::class,'adminDestroy']
            )->name('admin.trabajo.destroy');





        // ADMIN NOTICIAS 

        Route::resource('noticias', NewsController::class);


});




// Logout
Route::get('/logout', function () {

    Auth::logout();
    session()->flush();

    return redirect()->route('login');

})->name('logout');