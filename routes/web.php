<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;

Route::get('/', function () {
    return redirect('series');
});

Route::resource('/series', SeriesController::class)->only(['index', 'create', 'store']);

Route::delete('/series/destroy/{id}', [SeriesController::class, 'destroy'])->name('series.destroy');
