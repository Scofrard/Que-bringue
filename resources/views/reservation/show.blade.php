@extends('layouts.app')

@section('title', 'Détails de la réservation')

@section('content')
<div class="container">
    <div class="details-hero">
        <a href="{{ route('reservation.index') }}" class="close-btn" wire:navigate>
            <img src="{{ asset('assets/svg/rollback.svg') }}" alt="Revenir en arrière">
        </a>
        <h1 class="reservation-title">Détails de ta réservation</h1>
    </div>
    <div class="details">
        <div class="details-img">
            <img src="{{ asset('storage/./' . $reservation->event->images[0]->path ?? 'storage/./' . $reservation->event->images[0]->$image->path) }}" alt="Event à nié louper">
            <div class="details-galery">
                @foreach ($reservation->event->images->skip(1) as $image)
                <img src="{{ asset('storage/' . $image->path) }}" alt="Image de l'événement">
                @endforeach
            </div>
        </div>
        <div class="details-content">
            <h2 class="details-title">{{ $reservation->event->name }}</h2>
            <p><span>Nom :</span> {{ $reservation->user->firstname }} {{ $reservation->user->name }}</p>
            <p><span>Email :</span> {{ $reservation->user->email }}</p>
            <p><span>Téléphone :</span> {{ $reservation->user->phone }}</p>
            <p><span>{{ $reservation->seats > 1 ? 'Places réservées' : 'Place réservée' }} :</span> {{ $reservation->seats }}</p>
            <p><span>Adresse de l'événement :</span> {{ $reservation->event->localisation->full_address }}</p>
            <p><span>Date de l'événement :</span> {{ \Carbon\Carbon::parse($reservation->event->date)->translatedFormat('j F Y') }} à {{ str_replace(':', 'h', \Carbon\Carbon::parse($reservation->event->date)->format('H:i')) }}
            </p>
            <p><span>Réservation effectuée le :</span> {{ \Carbon\Carbon::parse($reservation->created_at)->translatedFormat('j F Y') }} à {{ str_replace(':', 'h', \Carbon\Carbon::parse($reservation->event->created_at)->format('H:i')) }}</p>
            <div class="details-reservation-actions">
                <a href="{{ route('reservation.edit', $reservation->id) }}" wire:navigate>Modifier</a>
                @livewire('reservation-destroy-form', ['reservationId' => $reservation->id])
            </div>
        </div>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoEBQqSJKJORH9pB2cr1TWAxOnqUYX8hQ&callback=initMap" async defer></script>
    @else
    <p>Aucune information concernant le lieu de l'événement</p>
    @endif
</div>
@endsection