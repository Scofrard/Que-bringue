@extends('layouts.app')

@section('title', 'Modifier la réservation')

@section('content')
@livewire('reservation-edit-form', ['id' => $id])
@endsection