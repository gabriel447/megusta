<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;

Route::get('/', function () {
    return redirect('series');
});

Route::resource('/series', SeriesController::class);

// Route::controller(SeriesController::class)->group(function () {
//     Route::get('/series', 'index')->name('series.index');
//     Route::get('/series/create', 'create')->name('series.create');
//     Route::post('/series/salvar', 'store')->name('series.store');
// });
