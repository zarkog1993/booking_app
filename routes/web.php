<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class,'showAllCompetitions'])->name('home');
Route::get('/competition/{id}', [HomeController::class, 'showCompetition'])->name('competition');
Route::get('/team/{id}', [HomeController::class, 'showTeam'])->name('team');
Route::get('/matches/{id}', [HomeController::class, 'matches'])->name('matches');
