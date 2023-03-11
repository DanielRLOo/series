<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [SeriesController::class, 'index']);

Route::middleware('guest')->group(function () {
    Route::resource('series', SeriesController::class)
        ->except('show');

    Route::resource('series.seasons', SeasonsController::class)
        ->only('index');

    Route::resource('series.seasons.episodes', EpisodesController::class)
        ->only('index');
});