@extends('layouts.app')

@section('title', 'Réservations')

@section('content')
<div class="container">
    <h1 class="reservation-title">{{ $reservations->count() }} {{ $reservations->count() > 1 ? 'bringues réservées' : 'bringue réservée' }} </h1>
    <div class="reservation-list">
        @foreach ($reservations as $reservation)
        <div class="reservation-card">
            <div class="event-image">
                <img src="{{ asset('storage/./' . $reservation->event->images[0]->path ?? 'storage/./' . $reservation->event->images[0]->$image->path) }}" alt="Event à nié louper">
            </div>
            <div class="reservation-details">
                <h2 class="event-title">
                    <a href="{{ route('event.show', $reservation->event->id) }}">{{ $reservation->event->name }}</a>
                </h2>
                <p class="event-date">{{ \Carbon\Carbon::parse($reservation->event->date)->format('d/m/Y H:i') }}</p>
                <p class="seats-info">{{ $reservation->seats }} {{ $reservation->seats > 1 ? 'places réservées' : 'place réservée' }}</p>
            </div>
            <div class="reservation-actions">
                <a href="{{ route('reservation.show', $reservation->id) }}" wire:navigate>Détails</a>
                <a href="{{ route('reservation.edit', $reservation->id) }}" wire:navigate>Modifier</a>
                @livewire('reservation-destroy-form', ['reservationId' => $reservation->id])
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection