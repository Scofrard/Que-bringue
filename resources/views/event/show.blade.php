@extends('layouts.app')

@section('title', $event->name)

@section('content')
<div class="container">
    <div class="details-hero">
        <a href="{{ route('event.index') }}" class="close-btn" wire:navigate>
            <img src="{{ asset('assets/svg/rollback.svg') }}" alt="Revenir en arrière">
        </a>
    </div>
    <div class="main-event">
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
            <a href="{{ route('reservation.create', ['event_id' => $event->id]) }}" class="btn-secondary" wire:navigate>Réserver</a>
        </div>
    </div>
    <div class="descripionevent">
        <div>
            <h2 class="title-white">Un p'tit amuse bouche</h2>
            <p>{{ $event->description }}</p>
        </div>
        <img src="{{ asset('assets/svg/star-blue-yellow.svg') }}" alt="Etoiles bleu et jaune">
    </div>
    <div class="galery">
        @foreach ($event->images->skip(1) as $image)
        <img src="{{ asset('storage/' . $image->path) }}" alt="Image de l'événement">
        @endforeach
    </div>
    @if($latitude && $longitude)
    <h2 class="map-title">Le chemin est tout tracé</h2>
    <div class="map">
        <div id="map"></div>
        <a href="https://www.google.com/maps/dir/?api=1&destination={{ $latitude }},{{ $longitude }}" target="_blank" class="btn-tertiaire map-button">
            Itinéraire
        </a>
    </div>
    <script>
        function initMap() {
            var location = {
                lat: parseFloat(@json($latitude)),
                lng: parseFloat(@json($longitude))
            };
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: location
            });
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.api.key') }}&callback=initMap" async defer></script>
    @else
    <p>Aucune information concernant le lieu de l'événement</p>
    @endif
</div>
@endsection