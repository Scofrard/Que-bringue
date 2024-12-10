<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Les meilleures bringues de Tournai</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>

<body>
    <header>
        @if (Route::has('login'))
        <nav>
            @auth
            <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
            <a href="{{ route('login') }}">Log in</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </nav>
        @endif
    </header>

    <!-- AFFICHER TOUS LES EVENEMENTS -->
    <!-- AFFICHER TOUS LES EVENEMENTS -->
    <!-- AFFICHER TOUS LES EVENEMENTS -->

    <a href="{{ route('event.create') }}">Créer un nouvel événement</a>
    @foreach ($events as $event)
    <ul>
        <li>
            <img src="{{ asset('storage/./' . $event->images[0]->path ?? 'storage/./' . $event->images[0]->$image->path) }}" style="width: 150px; height: auto;">
        </li>
        <li>id : {{ $event->id }}</li>
        <li>Nom : {{ $event->name }}</li>
        <li>Description : {{ $event->description }}</li>
        <li>Date de l'événement : {{ \Carbon\Carbon::parse($event->date)->translatedFormat('l j F Y') }}</li>
        <li>Heure de l'événement : {{ str_replace(':', 'h', \Carbon\Carbon::parse($event->date)->format('H:i')) }}</li>
        <li>Places disponibles : {{ $event->seats }}</li>
        @foreach ($event->categories as $category)
        <li>{{ $category->name }}</li>
        @endforeach
        <li>Adresse : {{ $event->localisation->full_address ?? '-'}}</li>
    </ul>
    <a href="{{ route('event.localisation.edit', $event->id) }}">Modifier la localisation</a>
    <a href="{{ route('event.show', $event->id) }} ">Plus d'infos sur l'événement</a>
    <a href="{{ route('event.edit', $event->id) }} ">Modifier l'événement</a>
    <form action="{{ route('event.destroy' , $event->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Supprimer l'événement</button>
    </form>
    @endforeach


    <!-- AFFICHER TOUS LES EVENEMENTS DE LA CATEGORIE EN COUPLE -->
    <!-- AFFICHER TOUS LES EVENEMENTS DE LA CATEGORIE EN COUPLE -->
    <!-- AFFICHER TOUS LES EVENEMENTS DE LA CATEGORIE EN COUPLE -->

    <h2>En couple</h2>
    @if ($eventsCategoryEnCouple->isEmpty())
    <p>Aucune bringues pour votre couple</p>
    @else
    @foreach ($eventsCategoryEnCouple as $event)
    <ul>
        <li>Nom : {{ $event->name }}</li>
        <li>Date : {{ $event->date }}</li>
        <a href="{{ route('event.show', $event->id) }} ">Réserver</a>
    </ul>
    @endforeach
    @endif

</body>

</html>