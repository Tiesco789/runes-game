<?php

use App\Http\Controllers\RunesController;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {
    Route::get('/runes', [RunesController::class, 'index'])->name('runes.get');
    Route::post('/runes', [RunesController::class, 'store'])->name('runes.post');
    Route::delete('/runes/{id}', [RunesController::class, 'destroy'])->name('runes.delete');
    Route::put('/runes/{id}', [RunesController::class, 'update'])->name('runes.put');
});
