<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Réservation</title>
</head>

<body>
    <h1>Détails de la réservation</h1>

    <p><strong>Réservation ID :</strong> {{ $reservation->id }}</p>
    <p><strong>Utilisateur :</strong> {{ $reservation->user->name }}</p>
    <p><strong>Événement :</strong> {{ $reservation->event->name }}</p>
    <p><strong>Places réservées :</strong> {{ $reservation->seats }}</p>
    <p><strong>Date de l'événement :</strong> {{ $reservation->event->date }}</p>

    <a href="{{ route('reservation.index') }}">Retour à la liste des réservations</a>
    <a href="{{ route('reservation.edit', $reservation->id) }}">Modifier la réservation</a>
</body>

</html>