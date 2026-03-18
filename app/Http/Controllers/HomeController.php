<?php

namespace App\Http\Controllers;
use EinarHansen\FootballData\FootballDataService;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function showAllCompetitions(FootballDataService $footballDataService)
    {
        $allCompetitions = Cache::remember('all_competitions', 86400, function () use ($footballDataService) {
            return $footballDataService->competitions()->all();
        });
        return view('all-competitions', compact('allCompetitions'));
    }

    public function showCompetition(FootballDataService $footballDataService, $competitionId) {
        $cacheKey = "competition_{$competitionId}";
        
        $competition = Cache::remember($cacheKey, 86400, function () use ($footballDataService, $competitionId) {
            return $footballDataService->competitions()->teams($competitionId);
        });
        return view('competition', compact('competition'));
    }

    public function showTeam(FootballDataService $footballDataService, $teamId) {
        $cacheKey = "team_{$teamId}";
        $team = Cache::remember($cacheKey, 86400, function () use ($footballDataService, $teamId) {
            return $footballDataService->teams()->find($teamId);
        });
        return view('football-club', compact('team'));
    }
}
