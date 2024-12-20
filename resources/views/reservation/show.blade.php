@extends('layouts.app')

@section('title', 'Détails de la réservation')

@section('content')
<div class="container">
    <h1>Détails de la réservation</h1>
    <p>Réservation ID : {{ $reservation->id }}</p>
    <p>Utilisateur : {{ $reservation->user->name }}</p>
    <p>Événement : {{ $reservation->event->name }}</p>
    <p>Places réservées : {{ $reservation->seats }}</p>
    <p>Date de l'événement : {{ $reservation->event->date }}</p>
    <p>Réservation créée le : {{ $reservation->created_at }}</p>
    <p>Réservation modifiée le : {{ $reservation->updated_at }}</p>
    <a href="{{ route('reservation.index') }}" wire:navigate>Retour à la liste des réservations</a>
    <a href="{{ route('reservation.edit', $reservation->id) }}" wire:navigate>Modifier la réservation</a>
</div>
@endsection