<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SeriesController;
use App\Models\Series;
use Illuminate\Support\Facades\Auth;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('/series', SeriesController::class)->except(['create', 'edit']);

    Route::get('/series/{series}/episodes', function (Series $series) {
        return $series->episodes;
    });

    Route::patch('/episodes/{episode}', function (\App\Models\Episode $episode, Request $request) {
        $episode->watched = $request->watched;
        $episode->save();
        return $episode;
    });
// });

Route::post('/login', function (Request $request) {
    $credentials = $request->only(['email', 'password']);
    if (Auth::attempt($credentials) === false) {
        return  response()->json('Unauthorized', 401);
    }

    $user = Auth::user();
    $token = $user->createToken('token');
    
    return response()->json($token->plainTextToken);
});
