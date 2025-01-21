@extends('layouts.app')

@section('title', 'Les meilleures bringues')

@section('content')

<!-- AFFICHER TOUS LES EVENEMENTS 
@foreach ($events as $event)
@endforeach
-->

<!--- BANDEAU --->

<div class="headband">
    <div class="content banger">
        ** Event banger ** Event banger ** Event banger ** Event banger ** Event banger ** Event banger ** Event
        banger ** Event banger ** Event banger ** Event banger ** Event banger ** Event banger ** Event banger **
        Event banger
    </div>
</div>

<div class="desktop-hidden">
    <div class="search-event">
        <img id="search-icon" src="{{ asset('assets/svg/search.svg') }}" alt="Rechercher">
        @livewire('event-search')
    </div>
</div>

<!--- MAIN EVENT --->

@if ($eventBanger)
<a href="{{ route('event.show', $eventBanger->id) }}" aria-label="Plus d'infos sur l'événement {{ $eventBanger->name }}" wire:navigate>
    <div class="container main-event">
        <div class="main-event-content">
            <img src="{{ asset('storage/./' . $eventBanger->images[0]->path) }}" alt="Event banger">
        </div>
        <div class="main-event-infos">
            <h1>{{ $eventBanger->name }}</h1>
            <div class="iconevent">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 35 35"
                    style="fill: rgba(255, 255, 255, 1);">
                    <path
                        d="M3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-2V2h-2v2H9V2H7v2H5a2 2 0 0 0-2 2zm16 14H5V8h14z">
                    </path>
                </svg>
                <p>{{ \Carbon\Carbon::parse($eventBanger->date)->translatedFormat('j F Y') }} à {{ str_replace(':', 'h', \Carbon\Carbon::parse($eventBanger->date)->format('H:i')) }}</p>
            </div>
            <div class="iconevent">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 35 35"
                    style="fill: rgba(255, 255, 255, 1);">
                    <path
                        d="M12 2C7.589 2 4 5.589 4 9.995 3.971 16.44 11.696 21.784 12 22c0 0 8.029-5.56 8-12 0-4.411-3.589-8-8-8zm0 12c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4z">
                    </path>
                </svg>
                <p>{{ $eventBanger->localisation->full_address ?? '-'}}</p>
            </div>
            <a href="{{ route('reservation.create', ['event_id' => $eventBanger->id]) }}" class="btn-secondary" aria-label="Réservez sa place pour l'événement {{ $eventBanger->name }}" wire:navigate>Réserver</a>
        </div>
    </div>
</a>
@endif

<!--- A NIE LOUPER --->

<div class="category louper">
    <div class="bringues">
        <div class="bringuetitle">
            <h2>A nié louper</h2>
            <img src="{{ asset('assets/svg/star-blue-pink.svg') }}" alt="Etoiles bleu et rose">
        </div>
        <div class="arrow">
            <a href="précédent" class="prev" data-tooltip-text="Précédent" aria-label="Précédent">
                <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 24 24"
                    style="fill: rgba(13, 13, 13, 1);">
                    <path d="M13.939 4.939 6.879 12l7.06 7.061 2.122-2.122L11.121 12l4.94-4.939z"></path>
                </svg>
                <span class="linkvisible">Précédent</span>
            </a>
            <a href="suivant" class="next" data-tooltip-text="Suivant" aria-label="Suivant">
                <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 24 24"
                    style="fill: rgba(13, 13, 13, 1);">
                    <path d="M10.061 19.061 17.121 12l-7.06-7.061-2.122 2.122L12.879 12l-4.94 4.939z"></path>
                </svg>
                <span class="linkvisible">Suivant</span>
            </a>
        </div>
    </div>
    <div class="cards">
        @if ($eventsCategoryOne->isEmpty())
        <p class="noevent">Aucune bringue à nié louper</p>
        @else
        @foreach ($eventsCategoryOne as $event)
        <a href="{{ route('event.show', $event->id) }}" aria-label="Plus d'infos sur l'événement {{ $event->name }}" wire:navigate>
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
                        <p>{{ \Carbon\Carbon::parse($event->date)->translatedFormat('j F Y') }} à {{ str_replace(':', 'h', \Carbon\Carbon::parse($event->date)->format('H:i')) }}</p>
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
                    <a href="{{ route('reservation.create', ['event_id' => $event->id]) }}" class="btn-tertiaire" aria-label="Réservez sa place pour l'événement {{ $event->name }}" wire:navigate>Réserver</a>
                </div>
            </div>
        </a>
        @endforeach
        @endif
    </div>
</div>

<!-- EN COUPLE -->

<div class="category couple">
    <div class="bringues">
        <div class="bringuetitle">
            <h2>En couple</h2>
            <img src="{{ asset('assets/svg/star-blue-yellow.svg') }}" alt="Etoiles bleu et jaune">
        </div>
        <div class="arrow">
            <a href="précédent" class="prev" data-tooltip-text="Précédent" aria-label="Précédent">
                <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 24 24"
                    style="fill: rgba(13, 13, 13, 1);">
                    <path d="M13.939 4.939 6.879 12l7.06 7.061 2.122-2.122L11.121 12l4.94-4.939z"></path>
                </svg>
                <span class="linkvisible">Précédent</span>
            </a>
            <a href="suivant" class="next" data-tooltip-text="Suivant" aria-label="Suivant">
                <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 24 24"
                    style="fill: rgba(13, 13, 13, 1);">
                    <path d="M10.061 19.061 17.121 12l-7.06-7.061-2.122 2.122L12.879 12l-4.94 4.939z"></path>
                </svg>
                <span class="linkvisible">Suivant</span>
            </a>
        </div>
    </div>
    <div class="cards">
        @if ($eventsCategoryTwo->isEmpty())
        <p class="noevent-white">Aucune bringues pour votre couple</p>
        @else
        @foreach ($eventsCategoryTwo as $event)
        <a href="{{ route('event.show', $event->id) }}" aria-label="Plus d'infos sur l'événement {{ $event->name }}" wire:navigate>
            <div class="card backgroundpink">
                @if (!$event->images->isEmpty())
                <img src="{{ asset('storage/./' . $event->images[0]->path) }}" alt="Event à nié louper">
                @endif
                <div class="contentcard">
                    <h3>{{ $event->name }}</h3>
                    <div class="iconevent">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28"
                            style="fill: rgba(13, 13, 13, 1);">
                            <path
                                d="M3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-2V2h-2v2H9V2H7v2H5a2 2 0 0 0-2 2zm16 14H5V8h14z">
                            </path>
                        </svg>
                        <p>{{ \Carbon\Carbon::parse($event->date)->translatedFormat('j F Y') }} à {{ str_replace(':', 'h', \Carbon\Carbon::parse($event->date)->format('H:i')) }}</p>
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
                    <a href="{{ route('reservation.create', ['event_id' => $event->id]) }}" class="btn-tertiaire" aria-label="Réservez sa place pour l'événement {{ $event->name }}" wire:navigate>Réserver</a>
                </div>
            </div>
        </a>
        @endforeach
        @endif
    </div>
</div>

<!-- ENTRE POTES -->

<div class="category potes">
    <div class="bringues">
        <div class="bringuetitle">
            <h2>Entre potes</h2>
            <img src="{{ asset('assets/svg/star-pink-yellow.svg') }}" alt="Etoiles rose et jaune">
        </div>
        <div class="arrow">
            <a href="précédent" class="prev" data-tooltip-text="Précédent" aria-label="Précédent">
                <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 24 24"
                    style="fill: rgba(13, 13, 13, 1);">
                    <path d="M13.939 4.939 6.879 12l7.06 7.061 2.122-2.122L11.121 12l4.94-4.939z"></path>
                </svg>
                <span class="linkvisible">Précédent</span>
            </a>
            <a href="suivant" class="next" data-tooltip-text="Suivant" aria-label="Suivant">
                <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 24 24"
                    style="fill: rgba(13, 13, 13, 1);">
                    <path d="M10.061 19.061 17.121 12l-7.06-7.061-2.122 2.122L12.879 12l-4.94 4.939z"></path>
                </svg>
                <span class="linkvisible">Suivant</span>
            </a>
        </div>
    </div>
    <div class="cards">
        @if ($eventsCategoryThree->isEmpty())
        <p class="noevent-white">Aucune bringue à faire entre poto</p>
        @else
        @foreach ($eventsCategoryThree as $event)
        <a href="{{ route('event.show', $event->id) }}" aria-label="Plus d'infos sur l'événement {{ $event->name }}" wire:navigate>
            <div class="card backgroundblack">
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
                        <p>{{ \Carbon\Carbon::parse($event->date)->translatedFormat('j F Y') }} à {{ str_replace(':', 'h', \Carbon\Carbon::parse($event->date)->format('H:i')) }}</p>
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
                    <a href="{{ route('reservation.create', ['event_id' => $event->id]) }}" class="btn-tertiaire" aria-label="Réservez sa place pour l'événement {{ $event->name }}" wire:navigate>Réserver</a>
                </div>
            </div>
        </a>
        @endforeach
        @endif
    </div>
</div>

<!-- EN FAMILLE -->

<div class="category famille">
    <div class="bringues">
        <div class="bringuetitle">
            <h2>En famille</h2>
            <img src="{{ asset('assets/svg/star-pink-yellow.svg') }}" alt="Etoiles rose et jaune">
        </div>
        <div class="arrow">
            <a href="précédent" class="prev" data-tooltip-text="Précédent" aria-label="Précédent">
                <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 24 24"
                    style="fill: rgba(13, 13, 13, 1);">
                    <path d="M13.939 4.939 6.879 12l7.06 7.061 2.122-2.122L11.121 12l4.94-4.939z"></path>
                </svg>
                <span class="linkvisible">Précédent</span>
            </a>
            <a href="suivant" class="next" data-tooltip-text="Suivant" aria-label="Suivant">
                <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 24 24"
                    style="fill: rgba(13, 13, 13, 1);">
                    <path d="M10.061 19.061 17.121 12l-7.06-7.061-2.122 2.122L12.879 12l-4.94 4.939z"></path>
                </svg>
                <span class="linkvisible">Suivant</span>
            </a>
        </div>
    </div>
    <div class="cards">
        @if ($eventsCategoryFour->isEmpty())
        <p class="noevent-white">Aucune bringue à faire en famille</p>
        @else
        @foreach ($eventsCategoryFour as $event)
        <a href="{{ route('event.show', $event->id) }}" aria-label="Plus d'infos sur l'événement {{ $event->name }}" wire:navigate>
            <div class="card backgroundblue">
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
                        <p>{{ \Carbon\Carbon::parse($event->date)->translatedFormat('j F Y') }} à {{ str_replace(':', 'h', \Carbon\Carbon::parse($event->date)->format('H:i')) }}</p>
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
                    <a href="{{ route('reservation.create', ['event_id' => $event->id]) }}" class="btn-tertiaire" aria-label="Réservez sa place pour l'événement {{ $event->name }}" wire:navigate>Réserver</a>
                </div>
            </div>
        </a>
        @endforeach
        @endif
    </div>
</div>

<!--- AVEC LES TCHIOS --->

<div class="category tchios">
    <div class="bringues">
        <div class="bringuetitle">
            <h2>Pour les tchios</h2>
            <img src="{{ asset('assets/svg/star-blue-pink.svg') }}" alt="Etoiles bleu et rose">
        </div>
        <div class="arrow">
            <a href="précédent" class="prev" data-tooltip-text="Précédent" aria-label="Précédent">
                <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 24 24"
                    style="fill: rgba(13, 13, 13, 1);">
                    <path d="M13.939 4.939 6.879 12l7.06 7.061 2.122-2.122L11.121 12l4.94-4.939z"></path>
                </svg>
                <span class="linkvisible">Précédent</span>
            </a>
            <a href="suivant" class="next" data-tooltip-text="Suivant" aria-label="Suivant">
                <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 24 24"
                    style="fill: rgba(13, 13, 13, 1);">
                    <path d="M10.061 19.061 17.121 12l-7.06-7.061-2.122 2.122L12.879 12l-4.94 4.939z"></path>
                </svg>
                <span class="linkvisible">Suivant</span>
            </a>
        </div>
    </div>
    <div class="cards">
        @if ($eventsCategoryFive->isEmpty())
        <p class="noevent">Aucune bringue pour vos mômes</p>
        @else
        @foreach ($eventsCategoryFive as $event)
        <a href="{{ route('event.show', $event->id) }}" aria-label="Plus d'infos sur l'événement {{ $event->name }}" wire:navigate>
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
                        <p>{{ \Carbon\Carbon::parse($event->date)->translatedFormat('j F Y') }} à {{ str_replace(':', 'h', \Carbon\Carbon::parse($event->date)->format('H:i')) }}</p>
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
                    <a href="{{ route('reservation.create', ['event_id' => $event->id]) }}" class="btn-tertiaire" aria-label="Réservez sa place pour l'événement {{ $event->name }}" wire:navigate>Réserver</a>
                </div>
            </div>
        </a>
        @endforeach
        @endif
    </div>
</div>

<!-- AVIS CLIENTS -->

<div>
    <h4 class="titlenotice">Ce qu'en pensent les bringueurs</h4>
    <div class="noticeglobal">
        <div class="allstars">
            <img src="{{ asset('assets/svg/star-yellow.svg') }}" alt="Etoile">
            <img src="{{ asset('assets/svg/star-yellow.svg') }}" alt="Etoile">
            <img src="{{ asset('assets/svg/star-yellow.svg') }}" alt="Etoile">
            <img src="{{ asset('assets/svg/star-yellow.svg') }}" alt="Etoile">
            <img src="{{ asset('assets/svg/half-star-yellow.svg') }}" alt="Demi étoile">
        </div>
        <div class="allcomments">
            <p>4.5/5 basé sur 1277 commentaires</p>
        </div>
    </div>
    <div class="comments">
        <div class="cardcomment">
            <div class="author">
                <span>Sophie P</span>
                <div class="stars">
                    <img src="{{ asset('assets/svg/star.svg') }}" alt="Etoile">
                    <img src="{{ asset('assets/svg/star.svg') }}" alt="Etoile">
                    <img src="{{ asset('assets/svg/star.svg') }}" alt="Etoile">
                    <img src="{{ asset('assets/svg/star.svg') }}" alt="Etoile">
                    <img src="{{ asset('assets/svg/star.svg') }}" alt="Etoile">
                </div>
            </div>
            <p>
                L’application est intuitive et facile à utiliser, offrant une expérience utilisateur fluide et agréable. Les fonctionnalités sont bien pensées et simplifient vraiment l'organisation des événements, tout en étant rapides à maîtriser.
            </p>
        </div>
        <div class="cardcomment">
            <div class="author">
                <span>Marie D</span>
                <div class="stars">
                    <img src="{{ asset('assets/svg/star.svg') }}" alt="Etoile">
                    <img src="{{ asset('assets/svg/star.svg') }}" alt="Etoile">
                    <img src="{{ asset('assets/svg/star.svg') }}" alt="Etoile">
                    <img src="{{ asset('assets/svg/star.svg') }}" alt="Etoile">
                    <img src="{{ asset('assets/svg/star.svg') }}" alt="Etoile">
                </div>
            </div>
            <p>J’ai été impressionné par la précision de la carte intégrée, super pratique ! Trouver le chemin vers des lieux inconnus n’a jamais été aussi simple. Un outil indispensable pour les sorties !
            </p>
        </div>
        <div class="cardcomment">
            <div class="author">
                <span>Edouard S</span>
                <div class="stars">
                    <img src="{{ asset('assets/svg/star.svg') }}" alt="Etoile">
                    <img src="{{ asset('assets/svg/star.svg') }}" alt="Etoile">
                    <img src="{{ asset('assets/svg/star.svg') }}" alt="Etoile">
                    <img src="{{ asset('assets/svg/star.svg') }}" alt="Etoile">
                    <img src="{{ asset('assets/svg/star.svg') }}" alt="Etoile">
                </div>
            </div>
            <p>Une excellente solution pour gérer mes réservations. L’interface est claire, et la fonctionnalité de géolocalisation rend l’organisation beaucoup plus efficace. Je recommande sans hésiter !
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
    <a href="mailto:bringueur@quebringue.be" class="btn-contact" aria-label="Contactez-nous par mail">Contactez nous</a>
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
<div class="map">
    <div id="map"></div>
</div>
<div id="eventImage" style="position: absolute; bottom: 20px; left: 20px; background: white; padding: 10px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); display: none;">
    <a id="eventLink" href="#" target="_blank" wire:navigate>
        <img id="eventImageContent" src="" alt="Image de l'événement" style="width: 200px; height: auto; border-radius: 8px;">
    </a>
</div>

@endsection

@push('scripts')
<script type="text/javascript" src="/js/slideevent.js"></script>
<script>
    function initMap() {
        // Position par défaut
        var defaultCenter = {
            lat: 50.60769606201858,
            lng: 3.3965018621070597
        };

        // Crée la carte
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 14,
            center: defaultCenter
        });

        // Récupérer les données des événements (passées depuis le contrôleur)
        var locations = @json($locations);

        locations.forEach(function(location) {
            // Créer une icône personnalisée avec l'image de l'événement
            var imageUrl = location.main_image ? '/storage/' + location.main_image : '/storage/default_marker_image.png'; // Utiliser une image par défaut si aucune image n'est fournie

            // Crée un marqueur avec une icône personnalisée
            var marker = new google.maps.Marker({
                position: {
                    lat: parseFloat(location.lat),
                    lng: parseFloat(location.lng)
                },
                map: map,
                title: 'Événement ici',
                icon: {
                    url: imageUrl,
                    size: new google.maps.Size(40, 40),
                    scaledSize: new google.maps.Size(40, 40), // Taille de l'image à afficher
                    origin: new google.maps.Point(0, 0), // Point de départ de l'image
                    anchor: new google.maps.Point(20, 20) // Centrer l'image dans le cercle
                }
            });

            google.maps.event.addListener(marker, 'click', function() {
                console.log('Event Name:', location.event_name);
                // Mettre à jour l'image de l'événement et le lien
                document.getElementById('eventImage').style.display = 'block'; // Affiche la div avec l'image
                document.getElementById('eventLink').href = '/event/' + location.event_id; // Lien vers la page de l'événement
                document.getElementById('eventImageContent').src = location.main_image ? '/storage/' + location.main_image : '/storage/default_marker_image.png'; // Image de l'événement

                //window.location.href = '/event/' + location.event_id; // Rediriger vers l'événement sans recharger la page
            });
        });
    }

    // Fonction pour charger Google Maps API
    function loadGoogleMaps() {
        var script = document.createElement('script');
        script.src = "https://maps.googleapis.com/maps/api/js?key={{ config('services.api.key') }}&callback=initMap";
        script.async = true;
        script.defer = true;
        document.body.appendChild(script);
    }

    // Charger la carte une fois la page prête
    document.addEventListener("DOMContentLoaded", loadGoogleMaps);
</script>