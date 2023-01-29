<?php

use App\Http\Controllers\IndexController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Movie Routes
|--------------------------------------------------------------------------
|
| Here is where you can register movies routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Movies
Route::prefix('/movie')->name('movie.')->group(function(){
    Route::post('/', \App\Http\Controllers\Movies\CreateMovieController::class)->name('create');
    Route::patch('/{id}', \App\Http\Controllers\Movies\EditMovieController::class)->name('edit');
    Route::delete('/{id}', \App\Http\Controllers\Movies\DeleteMovieController::class)->name('delete');
    Route::get('/{id?}', \App\Http\Controllers\Movies\GetMovieController::class)->name('get');
});

