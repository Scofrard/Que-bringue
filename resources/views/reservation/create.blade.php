@extends('layouts.app')

@section('title', 'Réservez vos places')

@section('content')

@livewire('reservation-create-form', ['event_id' => $event_id])

@endsection