<?php

use App\Http\Controllers\RunesController;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {
    Route::get('/runes', [RunesController::class, 'index'])->name('runes.get');
    Route::post('/runes', [RunesController::class, 'store'])->name('runes.post');
    Route::delete('/runes/{id}', [RunesController::class, 'destroy'])->name('runes.delete');
    Route::match(['put', 'patch'], '/runes/{id}', [RunesController::class, 'update']);
});
