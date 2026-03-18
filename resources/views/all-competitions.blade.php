<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $team->name ?? 'Football Club' }}</title>
    <style>
        body { font-family: sans-serif; padding: 2rem; max-width: 600px; margin: auto; }
        .club-card { border: 1px solid #ddd; padding: 2rem; border-radius: 8px; text-align: center; }
        .club-image { max-width: 150px; }
        .details { text-align: left; margin-top: 2rem; }
        .details p { margin: 0.5rem 0; }
    </style>
</head>
<body>
    @foreach ($allCompetitions as $competition)
        <div class="club-card">
            <!-- The API often returns crest image under 'crest' instead of 'image', but we'll try 'image' first as per your output or use 'crest' fallback -->
            @if(!empty($competition->image))
                <img src="{{ $competition->image }}" alt="{{ $competition->name }} logo" class="club-image">
            @elseif(!empty($competition->crest))
                <img src="{{ $competition->crest }}" alt="{{ $competition->name }} logo" class="club-image">
            @endif

            <h1>{{ $competition->name }}</h1>
            <p><strong>Code:</strong> {{ $competition->tla ?? $competition->code ?? 'N/A' }}</p>
            <a href="{{ route('competition-teams', $competition->id) }}">View Teams</a>
        </div>
    @endforeach
</body>
</html>
