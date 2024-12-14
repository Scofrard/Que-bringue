@extends('layouts.app')

@section('title', 'Bringue')

@section('content')
<a href="{{ route('event.index') }}">Revenir aux événements</a>
<ul>
    <li>
        <img src="{{ asset('storage/./' . $event->images[0]->path ?? 'storage/./' . $event->images[0]->$image->path) }}" style="width: 150px; height: auto;">
    </li>
    <li>id : {{ $event->id }}</li>
    <li>Nom : {{ $event->name }}</li>
    <li>Description : {{ $event->description }}</li>
    <li>Sièges : {{ $event->seats }}</li>
    <li>Date : {{ $event->date }}</li>
    @foreach ($event->categories as $category)
    <li>Catégorie(s) : {{ $category->name }}</li>
    @endforeach
    <li>Adresse : {{ $event->localisation->full_address }}</li>
    <li>Galerie d'images :
        @foreach ($event->images->skip(1) as $image)
        <img src="{{ asset('storage/' . $image->path) }}" alt="Image de l'événement" style="width: 150px; height: auto;">
        @endforeach
    </li>
</ul>
<a href="{{ route('event.edit', $event->id) }} ">Modifier l'événement</a>
@endsection