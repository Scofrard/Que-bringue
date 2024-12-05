<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier réservation</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>

<body>
    <div>
        <h1>Modifier la réservation</h1>

        <form action="{{ route('reservation.update', $reservation->id) }}" method="POST">
            @csrf
            @method('POST')
            <div>
                <label for="user_id">User</label>
                <select name="user_id" id="user_id" required>
                    <option value="">Select User</option>
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $reservation->user_id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="event_id">Event</label>
                <select name="event_id" id="event_id" required>
                    <option value="">Select Event</option>
                    @foreach ($events as $event)
                    <option value="{{ $event->id }}" {{ $event->id == $reservation->event_id ? 'selected' : '' }}>
                        {{ $event->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="seats">Seats</label>
                <input type="number" name="seats" id="seats" value="{{ $reservation->seats }}" required>
            </div>

            <div>
                <button type="submit">Modifier la réservation</button>
            </div>
        </form>
        <a href="{{ route('reservation.index') }}">Retour à la liste des réservations</a>
    </div>
</body>

</html>