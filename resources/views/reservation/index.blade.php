@extends('layouts.app')

@section('title', 'Liste de toutes les réservations')

@section('content')
<div class="container">
    <h1>Listing des réservations</h1>
    <a href="{{ route('reservation.create') }} " wire:navigate>Créer une réservation</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Utilisateur</th>
                <th>Evénement</th>
                <th>Places</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
            <tr>
                <td>{{ $reservation->id }}</td>
                <td>{{ $reservation->user->name ?? 'Non défini' }}</td>
                <td>{{ $reservation->event->name ?? 'Non défini' }}</td>
                <td>{{ $reservation->seats }}</td>
                <td>
                    <a href="{{ route('reservation.show', $reservation->id) }}" wire:navigate>Voir la reservation</a>
                    <a href="{{ route('reservation.edit', $reservation->id) }}" wire:navigate>Modifier</a>
                    @livewire('reservation-destroy-form', ['reservationId' => $reservation->id])
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection