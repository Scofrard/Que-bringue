<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Event edit</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>

<body>
    <a href="{{ route('event.index') }}">Revenir aux événements</a>
    <h1>Mettre à jour les informations de l'événement </h1>
    <form action="{{ route('event.update', $event->id) }}" method="POST">
        @csrf
        <input type="text" id="name" name="name" placeholder="Nom" value="{{ $event->name }}" required>
        <input type="text" id="description" name="description" placeholder="Description" value="{{ $event->description }}" required>
        <input type="text" id="seats" name="seats" placeholder="Sièges" value="{{ $event->seats }}" required>
        <input type="text" id="date" name="date" placeholder="Dates" value="{{ $event->date }}" required>
        <button type="submit">Modifier</button>
    </form>
</body>

</html>