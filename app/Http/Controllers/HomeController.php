<?php

namespace App\Http\Controllers;

use EinarHansen\FootballData\FootballDataService;

class HomeController extends Controller
{
    public function showAllCompetitions(FootballDataService $footballDataService)
    {
        $allCompetitions = $footballDataService->competitions()->all();

        return view("all-competitions", compact("allCompetitions"));
    }

    public function showCompetition(FootballDataService $footballDataService, $competitionId) {
        $competition = $footballDataService->competitions()->teams($competitionId);

        return view("competition", compact("competition"));
    }

    public function showTeam(FootballDataService $footballDataService, $teamId) {
        $team = $footballDataService->teams()->find($teamId);

        return view('football-club', compact('team'));
    }
}
