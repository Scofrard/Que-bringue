@extends('layouts.app')

@section('title', 'Liste de toutes les réservations')

@section('content')
<h1>Liste de toutes les réservations</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Event</th>
            <th>Seats</th>
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
                <a href="{{ route('reservation.show', $reservation->id) }}">Voir la reservation</a>
                <a href="{{ route('reservation.edit', $reservation->id) }}">Modifier</a>
                <form action="{{ route('reservation.destroy', $reservation->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection