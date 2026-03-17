<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/competitions', [HomeController::class, 'showAllCompetitions']);
Route::get('/competition-teams/{id}', [HomeController::class, 'showCompetitionTeams']);
Route::get('/show-club/{id}', [HomeController::class, 'showTeam']); 
