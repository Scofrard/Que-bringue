<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Events</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>

<body>
    <a href="{{ route('event.create') }}">Créer un nouvel événement</a>
    @foreach ($events as $event)
    <ul>
        <li>id : {{ $event->id }}</li>
        <li>Nom : {{ $event->name }}</li>
        <li>Date : {{ $event->date }}</li>
        @foreach ($event->categories as $category)
        <li>{{ $category->name }}</li>
        @endforeach
    </ul>
    <a href="{{ route('event.show', $event->id) }} ">Plus d'infos sur l'événement</a>
    <a href="{{ route('event.edit', $event->id) }} ">Modifier l'événement</a>
    <form action="{{ route('event.destroy' , $event->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Supprimer l'événement</button>
    </form>
    @endforeach
</body>

</html>