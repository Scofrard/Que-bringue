@extends('layouts.app')

@section('title', 'Les meilleures bringues')

@section('content')

<!-- AFFICHER TOUS LES EVENEMENTS

<a href="{{ route('event.create') }}" wire:navigate>Créer un nouvel événement</a>
@foreach ($events as $event)
<ul>
    <li>
        @if (!$event->images->isEmpty())
        <img src="{{ asset('storage/./' . $event->images[0]->path) }}" style="width: 150px; height: auto;">
        @endif
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
<a href="{{ route('reservation.create', ['event_id' => $event->id]) }} " wire:navigate>Réserver</a><br>
<a href="{{ route('event.localisation.edit', $event->id) }}" wire:navigate>Modifier la localisation</a><br>
<a href="{{ route('event.show', $event->id) }} " wire:navigate>Plus d'infos sur l'événement</a><br>
<a href="{{ route('event.edit', $event->id) }} " wire:navigate>Modifier l'événement</a><br>
<form action="{{ route('event.destroy' , $event->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Supprimer l'événement</button>
</form>
@endforeach -->


<!--- BANDEAU --->

<div class="headband">
    <div class="content banger">
        ** Event banger ** Event banger ** Event banger ** Event banger ** Event banger ** Event banger ** Event
        banger ** Event banger ** Event banger ** Event banger ** Event banger ** Event banger ** Event banger **
        Event banger
    </div>
</div>

<div class="search-event">
    <img id="search-icon" src="{{ asset('assets/svg/search.svg') }}" alt="Rechercher">
    @livewire('event-search')
</div>

<!--- MAIN EVENT --->

@if ($eventBanger)
<a href="{{ route('event.show', $eventBanger->id) }}" wire:navigate>
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
                <p>{{ \Carbon\Carbon::parse($event->date)->translatedFormat('j F Y') }} à {{ str_replace(':', 'h', \Carbon\Carbon::parse($event->date)->format('H:i')) }}</p>
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
            <a href="{{ route('reservation.create', ['event_id' => $eventBanger->id]) }}" class="btn-secondary" wire:navigate>Réserver</a>
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
        @if ($eventsCategoryOne->isEmpty())
        <p class="noevent">Aucune bringue à nié louper</p>
        @else
        @foreach ($eventsCategoryOne as $event)
        <a href="{{ route('event.show', $event->id) }}" wire:navigate>
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
                    <a href="{{ route('reservation.create', ['event_id' => $event->id]) }}" class="btn-tertiaire" wire:navigate>Réserver</a>
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
        @if ($eventsCategoryTwo->isEmpty())
        <p class="noevent-white">Aucune bringues pour votre couple</p>
        @else
        @foreach ($eventsCategoryTwo as $event)
        <a href="{{ route('event.show', $event->id) }}" wire:navigate>
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
                    <a href="{{ route('reservation.create', ['event_id' => $event->id]) }}" class="btn-tertiaire" wire:navigate>Réserver</a>
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
        @if ($eventsCategoryThree->isEmpty())
        <p class="noevent-white">Aucune bringue à faire entre poto</p>
        @else
        @foreach ($eventsCategoryThree as $event)
        <a href="{{ route('event.show', $event->id) }}" wire:navigate>
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
                    <a href="{{ route('reservation.create', ['event_id' => $event->id]) }}" class="btn-tertiaire" wire:navigate>Réserver</a>
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
        @if ($eventsCategoryFour->isEmpty())
        <p class="noevent-white">Aucune bringue à faire en famille</p>
        @else
        @foreach ($eventsCategoryFour as $event)
        <a href="{{ route('event.show', $event->id) }}" wire:navigate>
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
                    <a href="{{ route('reservation.create', ['event_id' => $event->id]) }}" class="btn-tertiaire" wire:navigate>Réserver</a>
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
        @if ($eventsCategoryFive->isEmpty())
        <p class="noevent">Aucune bringue pour vos mômes</p>
        @else
        @foreach ($eventsCategoryFive as $event)
        <a href="{{ route('event.show', $event->id) }}" wire:navigate>
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
                    <a href="{{ route('reservation.create', ['event_id' => $event->id]) }}" class="btn-tertiaire" wire:navigate>Réserver</a>
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
                <span>Sophie P</span>
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
            <p>
                L’application est intuitive et facile à utiliser, offrant une expérience utilisateur fluide et agréable. Les fonctionnalités sont bien pensées et simplifient vraiment l'organisation des événements, tout en étant rapides à maîtriser.
            </p>
        </div>
        <div class="cardcomment">
            <div class="author">
                <span>Marie D</span>
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
            <p>J’ai été impressionné par la précision de la carte intégrée, super pratique ! Trouver le chemin vers des lieux inconnus n’a jamais été aussi simple. Un outil indispensable pour les sorties !
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

@endsection

@push('scripts')
<script type="text/javascript" src="/js/slideevent.js"></script>
@endpush