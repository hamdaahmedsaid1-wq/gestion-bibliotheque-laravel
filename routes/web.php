<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmprunteurController;
use App\Http\Controllers\EmpruntController;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('livres', LivreController::class);

    Route::resource('emprunteurs', EmprunteurController::class);

    Route::put('/emprunts/{id}/retourner', [EmpruntController::class, 'retourner'])
        ->name('emprunts.retourner');

    Route::resource('emprunts', EmpruntController::class);

});

require __DIR__.'/auth.php';
