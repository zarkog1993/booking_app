<?php

namespace App\Http\Controllers;

use EinarHansen\FootballData\FootballDataService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function showAllCompetitions(FootballDataService $footballData)
    {
        $matches = $footballData->competitions()->all();
        
        // Let's return it nicely as JSON for testing
        return response()->json($matches);
    }

    public function showCompetitionTeams(FootballDataService $footballDataService, $id) {
        $competition = $footballDataService->competitions()->teams($id);
        
        // Let's return it nicely as JSON for testing
        return response()->json($competition);
    }

    public function showTeam(FootballDataService $footballDataService, $clubId) {
        // Fetch the raw data as an object/array from the service
        $footballTeam = $footballDataService->teams()->find($clubId);

        // Pass the raw data directly to the blade file
        return view("football-club", ['team' => $footballTeam]);
    }
}
