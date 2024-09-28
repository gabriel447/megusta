<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\EpisodesController;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect('/series');
});

Route::resource('/series', SeriesController::class)->except(['show']);

Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');

route::get('/seasons/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');

route::post('/seasons/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');

route::post('/seasons/{season}/episodes', [EpisodesController::class, 'update'])->name('episodes.update');