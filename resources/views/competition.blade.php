@extends('layout.app')
@section('content')
    @foreach ($competition as $team)
        <div class="bg-neutral-primary-soft block max-w-sm p-6 border border-default rounded-base shadow-xs">
            <a href="#">
                 @if(!empty($team->image))
                <a href="{{ route('team', $team->id) }}">
                    <img src="{{ $team->image }}" alt="{{ $team->name }} logo" class="rounded-base">
                </a>
            @elseif(!empty($team->crest))
                <a href="{{ route('team', $team->id) }}"> 
                    <img src="{{ $team->crest }}" alt="{{ $team->name }} logo" class="rounded-base">    
                </a>
            @endif
                <img class="" src="/docs/images/blog/image-1.jpg" alt="" />
            </a>
            <a href="#">
                <h5 class="mt-6 mb-2 text-2xl font-semibold tracking-tight text-heading">{{ $team->name }}</h5>
            </a>
            <p class="mb-6 text-body">Founded: {{ $team->founded ?? 'Unknown' }}</p>
            <p class="mb-6 text-body">Colors: {{ $team->colors ?? 'Unknown' }}</p>
            <p class="mb-6 text-body">Address: {{ $team->address ?? 'Unknown' }}</p>
            <p class="mb-6 text-body">Short Name: {{ $team->tla ?? $team->code ?? 'N/A' }}</p>
            <p class="mb-6 text-body">Stadium: {{ $team->venue ?? 'Unknown' }}</p>
            <a href="{{ route('team', $team->id) }}" class="inline-flex items-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                Read more
                <svg class="w-4 h-4 ms-1.5 rtl:rotate-180 -me-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/></svg>
            </a>
        </div>
    @endforeach
@endsection
