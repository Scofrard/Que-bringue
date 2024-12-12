<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Les meilleures bringues de Tournai</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
    <a href="{{ route('reservation.create', $event->id) }} ">Réserver</a>
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
        <a href="{{ route('reservation.create', $event->id) }} ">Réserver</a>
    </ul>
    @endforeach
    @endif

    <header class="container">
        <div class="logosvg">
            <img src="{{ asset('assets/svg/logoquebringue.svg') }}" alt="Logo Québringue">
        </div>
        <div class="btnreservation">
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
            <a href="formlogin.html" class="btn-primary">Tes réservations</a>
        </div>
    </header>

    <!--- BANDEAU --->

    <div class="headband">
        <div class="content banger">
            ** Event banger ** Event banger ** Event banger ** Event banger ** Event banger ** Event banger ** Event
            banger ** Event banger ** Event banger ** Event banger ** Event banger ** Event banger ** Event banger **
            Event banger
        </div>
    </div>

    <!--- MAIN EVENT --->

    <div class="container main-event">
        <div class="main-event-content">
            <img src="/img/concert_lorenzo.png" alt="Event banger">
        </div>
        <div class="main-event-infos">
            <h1>Concert<br>Lorenzo</h1>
            <div class="iconevent">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 35 35"
                    style="fill: rgba(255, 255, 255, 1);">
                    <path
                        d="M3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-2V2h-2v2H9V2H7v2H5a2 2 0 0 0-2 2zm16 14H5V8h14z">
                    </path>
                </svg>
                <p>Vendredi 7 juin à 20h</p>
            </div>
            <div class="iconevent">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 35 35"
                    style="fill: rgba(255, 255, 255, 1);">
                    <path
                        d="M12 2C7.589 2 4 5.589 4 9.995 3.971 16.44 11.696 21.784 12 22c0 0 8.029-5.56 8-12 0-4.411-3.589-8-8-8zm0 12c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4z">
                    </path>
                </svg>
                <p>Grand place de Tournai</p>
            </div>
            <a href="formreservation.html" class="btn-secondary">Réserver</a>
        </div>
    </div>

    <!--- NIE LOUPER --->

    <div class="category louper">
        <div class="bringues">
            <div class="bringuetitle">
                <h2>Les bringues a nié louper</h2>
            </div>
            <div class="arrow">
                <a href="précédent" class="prev" data-tooltip-text="Précédent">
                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 24 24"
                        style="fill: rgba(13, 13, 13, 1);">
                        <path d="M13.939 4.939 6.879 12l7.06 7.061 2.122-2.122L11.121 12l4.94-4.939z"></path>
                    </svg>
                    <span class="linkvisible">Précédent</span>
                </a>
                <a href="suivant" class="next" data-tooltip-text="Suivant">
                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 24 24"
                        style="fill: rgba(13, 13, 13, 1);">
                        <path d="M10.061 19.061 17.121 12l-7.06-7.061-2.122 2.122L12.879 12l-4.94 4.939z"></path>
                    </svg>
                    <span class="linkvisible">Suivant</span>
                </a>
            </div>
        </div>
        <div class="cards">
            @foreach ($events as $event)
            <div class="card backgroundyellow">
                <img src="{{ asset('storage/./' . $event->images[0]->path ?? 'storage/./' . $event->images[0]->$image->path) }}" alt="Event à nié louper">
                <div class="contentcard">
                    <h3>{{ $event->name }}</h3>
                    <div class="iconevent">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28"
                            style="fill: rgba(13, 13, 13, 1);">
                            <path
                                d="M3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-2V2h-2v2H9V2H7v2H5a2 2 0 0 0-2 2zm16 14H5V8h14z">
                            </path>
                        </svg>
                        <p>{{ \Carbon\Carbon::parse($event->date)->translatedFormat('l j F Y') }} à {{ str_replace(':', 'h', \Carbon\Carbon::parse($event->date)->format('H:i')) }}</p>
                    </div>
                    <div class="iconevent">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28"
                            style="fill: rgba(13, 13, 13, 1);">
                            <path
                                d="M12 2C7.589 2 4 5.589 4 9.995 3.971 16.44 11.696 21.784 12 22c0 0 8.029-5.56 8-12 0-4.411-3.589-8-8-8zm0 12c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4z">
                            </path>
                        </svg>
                        <p>{{ $event->localisation->full_address ?? '-'}}</p>
                    </div>
                    <a href="#" class="btn-tertiaire">Réserver</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- EN COUPLE -->

    <div class="category couple">
        <div class="bringues">
            <div class="bringuetitle">
                <h2>En couple</h2>
            </div>
            <div class="arrow">
                <a href="précédent" class="prev" data-tooltip-text="Précédent">
                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 24 24"
                        style="fill: rgba(13, 13, 13, 1);">
                        <path d="M13.939 4.939 6.879 12l7.06 7.061 2.122-2.122L11.121 12l4.94-4.939z"></path>
                    </svg>
                    <span class="linkvisible">Précédent</span>
                </a>
                <a href="suivant" class="next" data-tooltip-text="Suivant">
                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 24 24"
                        style="fill: rgba(13, 13, 13, 1);">
                        <path d="M10.061 19.061 17.121 12l-7.06-7.061-2.122 2.122L12.879 12l-4.94 4.939z"></path>
                    </svg>
                    <span class="linkvisible">Suivant</span>
                </a>
            </div>
        </div>
        <div class="cards">
            @foreach ($events as $event)
            <div class="card backgroundpink">
                <img src="{{ asset('storage/./' . $event->images[0]->path ?? 'storage/./' . $event->images[0]->$image->path) }}" alt="Event à nié louper">
                <div class="contentcard">
                    <h3>{{ $event->name }}</h3>
                    <div class="iconevent">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28"
                            style="fill: rgba(13, 13, 13, 1);">
                            <path
                                d="M3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-2V2h-2v2H9V2H7v2H5a2 2 0 0 0-2 2zm16 14H5V8h14z">
                            </path>
                        </svg>
                        <p>{{ \Carbon\Carbon::parse($event->date)->translatedFormat('l j F Y') }} à {{ str_replace(':', 'h', \Carbon\Carbon::parse($event->date)->format('H:i')) }}</p>
                    </div>
                    <div class="iconevent">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28"
                            style="fill: rgba(13, 13, 13, 1);">
                            <path
                                d="M12 2C7.589 2 4 5.589 4 9.995 3.971 16.44 11.696 21.784 12 22c0 0 8.029-5.56 8-12 0-4.411-3.589-8-8-8zm0 12c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4z">
                            </path>
                        </svg>
                        <p>{{ $event->localisation->full_address ?? '-'}}</p>
                    </div>
                    <a href="#" class="btn-tertiaire">Réserver</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- AVIS CLIENTS -->

    <div class="container">
        <h4 class="titlenotice">Ce qu'en pensent les bringueurs</h4>
        <div class="noticeglobal">
            <div class="allstars">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    style="fill: rgba(255, 236, 0, 1);">
                    <path
                        d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z">
                    </path>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    style="fill: rgba(255, 236, 0, 1);">
                    <path
                        d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z">
                    </path>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    style="fill: rgba(255, 236, 0, 1);">
                    <path
                        d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z">
                    </path>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    style="fill: rgba(255, 236, 0, 1);">
                    <path
                        d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z">
                    </path>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    style="fill: rgba(255, 236, 0, 1);">
                    <path
                        d="M5.025 20.775A.998.998 0 0 0 6 22a1 1 0 0 0 .555-.168L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082a1 1 0 0 0-.59-1.74l-5.701-.454-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.214 4.107-1.491 6.452zM12 5.429l2.042 4.521.588.047h.001l3.972.315-3.271 2.944-.001.002-.463.416.171.597v.003l1.253 4.385L12 15.798V5.429z">
                    </path>
                </svg>
            </div>
            <div class="allcomments">
                <p>4.5/5 basé sur 1277 commentaires</p>
            </div>
        </div>
        <div class="comments">
            <div class="cardcomment">
                <div class="author">
                    <span>Edouard S</span>
                    <div class="stars">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="fill: rgba(13, 13, 13, 1);">
                            <path
                                d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z">
                            </path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="fill: rgba(13, 13, 13, 1);">
                            <path
                                d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z">
                            </path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="fill: rgba(13, 13, 13, 1);">
                            <path
                                d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z">
                            </path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="fill: rgba(13, 13, 13, 1);">
                            <path
                                d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z">
                            </path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="fill: rgba(13, 13, 13, 1);">
                            <path
                                d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z">
                            </path>
                        </svg>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                    tempor invidunt ut
                    labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores
                    et ea rebum
                </p>
            </div>
            <div class="cardcomment">
                <div class="author">
                    <span>Edouard S</span>
                    <div class="stars">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="fill: rgba(13, 13, 13, 1);">
                            <path
                                d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z">
                            </path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="fill: rgba(13, 13, 13, 1);">
                            <path
                                d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z">
                            </path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="fill: rgba(13, 13, 13, 1);">
                            <path
                                d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z">
                            </path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="fill: rgba(13, 13, 13, 1);">
                            <path
                                d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z">
                            </path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="fill: rgba(13, 13, 13, 1);">
                            <path
                                d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z">
                            </path>
                        </svg>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                    tempor invidunt ut
                    labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores
                    et ea rebum
                </p>
            </div>
            <div class="cardcomment">
                <div class="author">
                    <span>Edouard S</span>
                    <div class="stars">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="fill: rgba(13, 13, 13, 1);">
                            <path
                                d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z">
                            </path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="fill: rgba(13, 13, 13, 1);">
                            <path
                                d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z">
                            </path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="fill: rgba(13, 13, 13, 1);">
                            <path
                                d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z">
                            </path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="fill: rgba(13, 13, 13, 1);">
                            <path
                                d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z">
                            </path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="fill: rgba(13, 13, 13, 1);">
                            <path
                                d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z">
                            </path>
                        </svg>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                    tempor invidunt ut
                    labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores
                    et ea rebum
                </p>
            </div>
        </div>
        <div class="pagination-dots">
            <span class="dot active"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </div>

    <!-- CONTACT -->

    <div class="contact">
        <div class="question">
            <h4>Une question ?</h4>
            <p>Nous y répondrons dans les plus brefs délais !</p>
        </div>
        <a href="mailto:bringueur@quebringue.be" class="btn-contact">Contactez nous</a>
    </div>


    <!-- VILLES DISPO -->

    <h4>Bientôt dispo dans les + grandes villes de Belgique</h4>
    <div class="headband">
        <div class="content townfirst">
            ** Tournai ** Mons ** Charleroi ** Liège ** Namur ** Tournai ** Mons ** Charleroi ** Liège ** Namur **
            Tournai ** Mons ** Charleroi ** Liège ** Namur ** Tournai ** Mons ** Charleroi ** Liège ** Namur **
            Tournai ** Mons ** Charleroi ** Liège ** Namur
        </div>
    </div>
    <div class="headband backtownsecond">
        <div class="content townsecond">
            ** Tournai ** Mons ** Charleroi ** Liège ** Namur ** Tournai ** Mons ** Charleroi ** Liège ** Namur **
            Tournai ** Mons ** Charleroi ** Liège ** Namur ** Tournai ** Mons ** Charleroi ** Liège ** Namur **
            Tournai ** Mons ** Charleroi ** Liège ** Namur
        </div>
    </div>
    <div class="headband backtownthird">
        <div class="content townthird">
            ** Tournai ** Mons ** Charleroi ** Liège ** Namur ** Tournai ** Mons ** Charleroi ** Liège ** Namur **
            Tournai ** Mons ** Charleroi ** Liège ** Namur ** Tournai ** Mons ** Charleroi ** Liège ** Namur **
            Tournai ** Mons ** Charleroi ** Liège ** Namur
        </div>
    </div>

    <!-- MAPS -->

    <h4>Ravise ichi quelques bringues qui vont te plaire</h4>
    <iframe title="Maps"
        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d33831.58784290464!2d3.3965018621070597!3d50.60769606201858!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sbe!4v1724096912537!5m2!1sfr!2sbe"
        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>


    <!-- FOOTER -->

    <footer>
        <div class="footercolumns">
            <div class="footercolumn one">
                <img src="svg/logoquebringue.svg" alt="Logo Québringue">
                <h5>Follow nous</h5>
                <ul>
                    <li>
                        <a data-social="Facebook" style="--accent-color: #0866FF" href="https://www.facebook.com/"
                            target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path
                                    d="M13.397 20.997v-8.196h2.765l.411-3.209h-3.176V7.548c0-.926.258-1.56 1.587-1.56h1.684V3.127A22.336 22.336 0 0 0 14.201 3c-2.444 0-4.122 1.492-4.122 4.231v2.355H7.332v3.209h2.753v8.202h3.312z">
                                </path>
                            </svg>
                            <span class="linkvisible">Facebook</span>
                        </a>
                    </li>
                    <li>
                        <a data-social="Instagram" style="--accent-color: #E4405F" href="https://www.instagram.com/"
                            target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path
                                    d="M11.999 7.377a4.623 4.623 0 1 0 0 9.248 4.623 4.623 0 0 0 0-9.248zm0 7.627a3.004 3.004 0 1 1 0-6.008 3.004 3.004 0 0 1 0 6.008z">
                                </path>
                                <circle cx="16.806" cy="7.207" r="1.078"></circle>
                                <path
                                    d="M20.533 6.111A4.605 4.605 0 0 0 17.9 3.479a6.606 6.606 0 0 0-2.186-.42c-.963-.042-1.268-.054-3.71-.054s-2.755 0-3.71.054a6.554 6.554 0 0 0-2.184.42 4.6 4.6 0 0 0-2.633 2.632 6.585 6.585 0 0 0-.419 2.186c-.043.962-.056 1.267-.056 3.71 0 2.442 0 2.753.056 3.71.015.748.156 1.486.419 2.187a4.61 4.61 0 0 0 2.634 2.632 6.584 6.584 0 0 0 2.185.45c.963.042 1.268.055 3.71.055s2.755 0 3.71-.055a6.615 6.615 0 0 0 2.186-.419 4.613 4.613 0 0 0 2.633-2.633c.263-.7.404-1.438.419-2.186.043-.962.056-1.267.056-3.71s0-2.753-.056-3.71a6.581 6.581 0 0 0-.421-2.217zm-1.218 9.532a5.043 5.043 0 0 1-.311 1.688 2.987 2.987 0 0 1-1.712 1.711 4.985 4.985 0 0 1-1.67.311c-.95.044-1.218.055-3.654.055-2.438 0-2.687 0-3.655-.055a4.96 4.96 0 0 1-1.669-.311 2.985 2.985 0 0 1-1.719-1.711 5.08 5.08 0 0 1-.311-1.669c-.043-.95-.053-1.218-.053-3.654 0-2.437 0-2.686.053-3.655a5.038 5.038 0 0 1 .311-1.687c.305-.789.93-1.41 1.719-1.712a5.01 5.01 0 0 1 1.669-.311c.951-.043 1.218-.055 3.655-.055s2.687 0 3.654.055a4.96 4.96 0 0 1 1.67.311 2.991 2.991 0 0 1 1.712 1.712 5.08 5.08 0 0 1 .311 1.669c.043.951.054 1.218.054 3.655 0 2.436 0 2.698-.043 3.654h-.011z">
                                </path>
                            </svg>
                            <span class="linkvisible">Instagram</span>
                        </a>
                    </li>
                    <li>
                        <a data-social="TikTok" style="--accent-color: #cd3361" href="https://www.tiktok.com/"
                            target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path
                                    d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z">
                                </path>
                            </svg>
                            <span class="linkvisible">TikTok</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="footercolumn two">
                <h5>Catégories</h5>
                <ul>
                    <li><a href="#">A nié louper</a></li>
                    <li><a href="#">En couple</a></li>
                    <li><a href="#">Entre potes</a></li>
                    <li><a href="#">En famille</a></li>
                    <li><a href="#">Avec les tchios</a></li>
                </ul>
            </div>
            <div class="footercolumn three">
                <h5>Villes</h5>
                <ul>
                    <li><a href="#">Tournai</a></li>
                    <li><a href="#">Mons</a></li>
                    <li><a href="#">Charleroi</a></li>
                    <li><a href="#">Liège</a></li>
                    <li><a href="#">Namur</a></li>
                </ul>
            </div>
            <div class="footercolumn four">
                <h5>Infos</h5>
                <ul>
                    <li><a href="#">Politique de confidentialité</a></li>
                    <li><a href="#">Mentions légales</a></li>
                </ul>
            </div>
        </div>
    </footer>

</body>

</html>