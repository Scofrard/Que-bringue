<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reservations</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>

<body>

    <h1>Liste de toutes les réservations</h1>
    <a href="{{ route('reservation.create') }}">Ajouter une réservation</a>
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

</body>

</html>


</body>

</html>