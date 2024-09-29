<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Autenticador;

Route::get('/', function () {
    return redirect('/series');
})->middleware(Autenticador::class);

Route::resource('/series', SeriesController::class)->except(['show']);

Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])->name('seasons.index'); 

route::get('/seasons/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');

route::post('/seasons/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');

route::post('/seasons/{season}/episodes', [EpisodesController::class, 'update'])->name('episodes.update');

route::get('/login', [LoginController::class, 'index'])->name('login');
route::post('/login', [LoginController::class, 'store'])->name('signin');
route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('/register', [UsersController::class, 'create'])->name('users.create');
route::post('/register', [UsersController::class, 'store'])->name('users.store');
