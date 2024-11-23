<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Event</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>

<body>
    <a href="{{ route('event.index') }}">Revenir aux événements</a>
    <ul>
        <li>id : {{ $event->id }}</li>
        <li>Nom : {{ $event->name }}</li>
        <li>Description : {{ $event->description }}</li>
        <li>Sièges : {{ $event->seats }}</li>
        <li>Date : {{ $event->date }}</li>
        @foreach ($event->categories as $category)
        <li>Catégorie(s) : {{ $category->name }}</li>
        @endforeach
    </ul>
    <a href="{{ route('event.edit', $event->id) }} ">Modifier l'événement</a>
</body>

</html>