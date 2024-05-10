<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Tickets CRUD
//Create
Route::post('/ticket', [TicketController::class, 'addTicket']);

//Read
Route::get('/ticket/{id}', [TicketController::class, 'getTicketInfo']);
Route::get('/ticket', [TicketController::class, 'getTicketInfo']);

//Update
Route::post('/ticket/update', [TicketController::class, 'updateTicket']);

//Delete
Route::delete('ticket/{id}', [TicketController::class, 'deleteTicket']);


//Filme CRUD
//Create
Route::post('/filme', [FilmController::class, 'addFilm']);

//Read
Route::get('/filme/{id}', [FilmController::class, 'getFilmeInfo']);
Route::get('/filme', [FilmController::class, 'getFilmeInfo']);

//Update
Route::post('/filme/update', [FilmController::class, 'updateFilm']);

//Delete
Route::delete('filme/{id}', [FilmController::class, 'deleteFilm']);