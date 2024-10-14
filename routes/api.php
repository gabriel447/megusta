<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SeriesController;
use App\Models\Series;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/series', SeriesController::class)->except(['create', 'edit']);

Route::get('/series/{series}/episodes', function (Series $series) {
    return $series->episodes;
});

Route::patch('/episodes/{episode}', function (\App\Models\Episode $episode, Request $request) {
    $episode->watched = $request->watched;
    $episode->save();
    return $episode;
});