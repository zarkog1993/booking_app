<?php

namespace App\Http\Controllers;

use EinarHansen\FootballData\FootballDataService;

class HomeController extends Controller
{
    public function showAllCompetitions(FootballDataService $footballData)
    {
        $allCompetitions = $footballData->competitions()->all();

        return view("all-competitions", compact("allCompetitions"));
    }

    public function showCompetitionTeams(FootballDataService $footballDataService, $id) {
        $competition = $footballDataService->competitions()->teams($id);
        
        // Let's return it nicely as JSON for testing
        // return response()->json($competition);
        return view("competition", compact("competition"));
    }

    public function showTeam(FootballDataService $footballDataService, $clubId) {
        // Fetch the raw data as an object/array from the service
        $team = $footballDataService->teams()->find($clubId);

        // Pass the raw data directly to the blade file
        return view('football-club', compact('team'));
    }
}
