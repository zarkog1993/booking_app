<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $team->name ?? 'Football Club' }}</title>
    @vite('resources/css/app.css')
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
            @if(!empty($competition->image))
                <img src="{{ $competition->image }}" alt="{{ $competition->name }} logo" class="club-image">
            @elseif(!empty($competition->crest))
                <img src="{{ $competition->crest }}" alt="{{ $competition->name }} logo" class="club-image">
            @endif

            <h1>{{ $competition->name }}</h1>
            <p><strong>Code:</strong> {{ $competition->tla ?? $competition->code ?? 'N/A' }}</p>
            <button type="button" class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none"><a href="{{ route('competition', $competition->id) }}">View Teams</a></button>
        </div>
    @endforeach
</body>
</html>
