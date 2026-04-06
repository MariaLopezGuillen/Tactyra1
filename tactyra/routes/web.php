<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AttendanceController;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::view('/profile', 'profile')->name('profile');

    // PLAYERS
    Route::resource('players', PlayerController::class);
    // NOTAS
    Route::post('/notes', [DashboardController::class, 'storeNote'])->name('notes.store');

    // TRAINING
    Route::post('/training-days', [TrainingController::class, 'store'])
        ->name('training.store');

    // TEAMS
    Route::resource('teams', TeamController::class);

    // ATTENDANCE
    Route::get('/attendance', [AttendanceController::class, 'index'])
        ->name('attendance.index');
    Route::post('/training-days', [TrainingController::class, 'store'])->name('training.store');
    Route::post('/attendance', [AttendanceController::class, 'store'])
        ->name('attendance.store');
        // TACTICS
    Route::get('/tactics', [\App\Http\Controllers\TacticController::class, 'index'])
        ->name('tactics.index');

});

require __DIR__ . '/auth.php';
