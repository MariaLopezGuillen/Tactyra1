<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| LANDING
|--------------------------------------------------------------------------
*/

Route::view('/', 'welcome');


/*
|--------------------------------------------------------------------------
| ZONA PRIVADA
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','verified'])->group(function () {

    /*
    | DASHBOARD
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');


    /*
    | PERFIL
    */

    Route::view('/profile', 'profile')
        ->name('profile');


    /*
    | JUGADORES
    */

    Route::resource('players', PlayerController::class);


    /*
    | EQUIPOS
    */

    Route::resource('teams', TeamController::class);

});


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';