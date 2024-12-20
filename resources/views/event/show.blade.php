@extends('layouts.app')

@section('title', 'Bringue')

@section('content')
<div class="container">
    <a href="{{ route('event.index') }}" wire:navigate>Revenir aux événements</a>
    <div class="container main-event">
        <div class="main-event-content">
            <img src="{{ asset('storage/./' . $event->images[0]->path) }}" alt="Event banger">
        </div>
        <div class="main-event-infos">
            <h1>{{ $event->name }}</h1>
            <div class="iconevent">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 35 35"
                    style="fill: rgba(255, 255, 255, 1);">
                    <path
                        d="M3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-2V2h-2v2H9V2H7v2H5a2 2 0 0 0-2 2zm16 14H5V8h14z">
                    </path>
                </svg>
                <p>{{ \Carbon\Carbon::parse($event->date)->translatedFormat('j F Y') }} à {{ str_replace(':', 'h', \Carbon\Carbon::parse($event->date)->format('H:i')) }}</p>
            </div>
            <div class="iconevent">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 35 35"
                    style="fill: rgba(255, 255, 255, 1);">
                    <path
                        d="M12 2C7.589 2 4 5.589 4 9.995 3.971 16.44 11.696 21.784 12 22c0 0 8.029-5.56 8-12 0-4.411-3.589-8-8-8zm0 12c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4z">
                    </path>
                </svg>
                <p>{{ $event->localisation->full_address ?? '-'}}</p>
            </div>
            <div>
                <p>Places restantes : {{ $event->seats }}</p>
            </div>
            <div>
                @foreach ($event->categories as $category)
                <p>Catégorie(s) : {{ $category->name }}</p>
                @endforeach
            </div>
            <a href="{{ route('reservation.create', ['event_id' => $event->id]) }}" class="btn-secondary" wire:navigate>Réserver</a>
        </div>
    </div>
    <p>{{ $event->description }}</p>
    @foreach ($event->images->skip(1) as $image)
    <img src="{{ asset('storage/' . $image->path) }}" alt="Image de l'événement" style="width: 150px; height: auto;">
    @endforeach
    <a href="{{ route('event.edit', $event->id) }} " wire:navigate>Modifier l'événement</a>
</div>
@endsection