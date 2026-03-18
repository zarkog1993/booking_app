@extends('layout.app')
@section('content')
    @foreach ($allCompetitions as $competition)
        <a href="{{ route('competition', $competition->id) }}" class="flex flex-col items-center bg-neutral-primary-soft p-6 border border-default rounded-base shadow-xs md:flex-row md:max-w-xl md:flex-row md:max-w-xl">
            <img class="object-cover w-full rounded-base h-64 md:h-auto md:w-48 mb-4 md:mb-0" src="{{ $competition->image ?? $competition->crest ?? '' }}" alt="">
            <div class="flex flex-col justify-between md:p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-heading">{{ $competition->name }}</h5>
                <div>
                    <button type="button" class="inline-flex items-center w-auto text-body bg-neutral-secondary-medium bo   x-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                        Read more
                    </button>
                </div>
            </div>
        </a>
    @endforeach
@endsection