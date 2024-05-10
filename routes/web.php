<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});



//Route::post('/filme', [FilmController::class, 'addFilm']);


