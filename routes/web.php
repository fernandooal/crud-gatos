<?php

use App\Http\Controllers\GatoController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::group(['prefix' => 'gatos'], function (){
    Route::get('/', [GatoController::class, 'index'])->name('gatos.index');
    Route::get('/search', [GatoController::class, 'indexSearch'])->name('gatos.indexSearch');
    Route::get('/new', [GatoController::class, 'new'])->name('gatos.new');
    Route::post('/new', [GatoController::class, 'store'])->name('gatos.store');
    Route::post('/{id}', [GatoController::class, 'update'])->name('gatos.update');
    Route::delete('/{id}', [GatoController::class, 'destroy'])->name('gatos.destroy');
    Route::get('/{id}', [GatoController::Class, 'gatoIndividual']);
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
