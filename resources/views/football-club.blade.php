@extends('layout.app')
@section('content')
<div class="club-card">
    <!-- The API often returns crest image under 'crest' instead of 'image', but we'll try 'image' first as per your output or use 'crest' fallback -->
    @if(!empty($team->image))
        <img src="{{ $team->image }}" alt="{{ $team->name }} logo" class="club-image">
    @elseif(!empty($team->crest))
        <img src="{{ $team->crest }}" alt="{{ $team->name }} logo" class="club-image">
    @endif

    <h1>{{ $team->name }}</h1>
    <p><strong>Code:</strong> {{ $team->tla ?? $team->code ?? 'N/A' }}</p>

    <div class="details">
        <p><strong>Founded:</strong> {{ $team->founded ?? 'Unknown' }}</p>
        <p><strong>Colors:</strong> {{ $team->colors ?? 'Unknown' }}</p>
        <p><strong>Stadium:</strong> {{ $team->venue ?? 'Unknown' }}</p>
        
        <p><strong>Address:</strong><br>
            {{ $team->address ?? 'No address provided' }}
        </p>

        @if(!empty($team->website))
            <p><strong>Website:</strong> <a href="{{ $team->website }}" target="_blank">{{ $team->website }}</a></p>
        @endif
    </div>
</div>
@endsection
