<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/competitions', [HomeController::class, 'showAllCompetitions']);
Route::get('/competition/{id}', [HomeController::class, 'showCompetition'])->name('competition');
Route::get('/team/{id}', [HomeController::class, 'showTeam'])->name('team'); 
