@extends('layouts.app')

@section('title', 'Détails de la réservation')

@section('content')
<div class="container">
    <div class="details-hero">
        <a href="{{ route('reservation.index') }}" class="close-btn" wire:navigate>
            <img src="{{ asset('assets/svg/rollback.svg') }}" alt="Revenir en arrière">
        </a>
        <h1 class="reservation-title">Détails de votre réservation</h1>
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
            <p><span>Réservation effectuée le :</span> {{ \Carbon\Carbon::parse($reservation->event->created_at)->translatedFormat('j F Y') }} à {{ str_replace(':', 'h', \Carbon\Carbon::parse($reservation->event->created_at)->format('H:i')) }}</p>
            <div class="reservation-actions">
                <a href="{{ route('reservation.edit', $reservation->id) }}" wire:navigate>Modifier</a>
                @livewire('reservation-destroy-form', ['reservationId' => $reservation->id])
            </div>
        </div>
    </div>
</div>
@endsection