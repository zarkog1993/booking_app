@extends('layout.app')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-4 mt-20">
    @foreach ($matches as $match)
    <figcaption class="flex items-center justify-center">
            <img class="rounded-full w-9 h-9" src="{{ $match->homeTeam->image ?? '' }}" alt="profile picture">
            <div class="space-y-0.5 text-left rtl:text-right ms-2">
                <div class="leading-tight text-base text-heading font-medium mb-0.5">{{ $match->homeTeam->name }}</div>
                <div class="text-sm text-body">{{ $match->awayTeam->name }}</div>
            </div>
            <img class="rounded-full w-9 h-9" src="{{ $match->awayTeam->image ?? '' }}" alt="profile picture">
            <div class="space-y-0.5 text-left rtl:text-right ms-2">
                <div class="leading-tight text-base text-heading font-medium mb-0.5">{{ $match->awayTeam->name }}</div>
                <div class="text-sm text-body">{{ $match->score->fullTime->away }}</div>
            </div>
        </figcaption>   
        <a href="{{ route('competition', $match->id) }}" class="flex flex-col items-center bg-neutral-primary-soft p-6 border border-default rounded-base shadow-xs md:flex-row md:max-w-xl md:flex-row md:max-w-xl">
            <div class="flex flex-col justify-between md:p-4 leading-normal">
                <p><img class="rounded-full w-10 h-10" src="{{ $match->homeTeam->image ?? '' }}" alt="image description">
{{ $match->homeTeam->name }} vs <img class="rounded-full w-10 h-10" src="{{ $match->awayTeam->image ?? '' }}" alt="image description">
{{ $match->awayTeam->name }}</p>
                <p>{{ $match->score->fullTime->home }} - {{ $match->score->fullTime->away }}</p>
                <div>
                    <button type="button" class="inline-flex items-center w-auto text-body bg-neutral-secondary-medium bo   x-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                        Read more
                    </button>
                </div>
            </div>
        </a>
    @endforeach
    </div>
    <!-- @foreach ($matches as $match)
    <div class="w-full max-w-sm p-6 bg-neutral-primary-soft border border-default rounded-base shadow-xs">
    <div class="flex items-center justify-between mb-4">
   </div>
   <div class="flow-root">
        <ul role="list" class="divide-y divide-default">
            <li class="py-4 sm:py-4">
                <div class="flex items-center gap-2">
                    
                    <div class="flex-1 min-w-0 ms-2">
                        <p class="font-medium text-heading truncate">
                            {{ $match->homeTeam->name }}
                        </p>
                        <p class="font-medium text-heading truncate">
                            {{ $match->awayTeam->name }}
                        </p>
                    </div>
                    <div class="inline-flex items-center font-medium text-heading">
                        <p class="font-medium text-heading truncate">
                            {{ $match->score->fullTime->home }}
                        </p>
                    </div>
                    <div class="inline-flex items-center font-medium text-heading">
                        <p class="font-medium text-heading truncate">
                            {{ $match->score->fullTime->away }}
                        </p>
                    </div>
                </div>
            </li>
        </ul>
   </div>
</div>
@endforeach -->
@endsection