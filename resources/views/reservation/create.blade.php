<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Créer une Réservation</title>
</head>

<body>
    <h1>Réservez vos places</h1>

    <form action="{{ route('reservation.store') }}" method="POST">
        @csrf
        @method('POST')
        <div>
            <label for="event_id">Événement :</label>
            <select name="event_id" id="event_id" required>
                <option value="{{ $event->name }}">{{ $event->name }}</option>

            </select>
        </div>

        <div>
            <label for="user_id">Utilisateur :</label>
            <select name="user_id" id="user_id" required>
                <option value=""> Sélectionner un utilisateur </option>
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="seats">Nombre de places :</label>
            <input type="number" name="seats" id="seats" min="1" required>
        </div>

        <button type="submit">Réserver</button>
    </form>

    <a href="{{ route('reservation.index') }}">Retour à la liste des réservations</a>
</body>

</html>