@extends('layouts.app')

@section('title', 'Modifier la réservation')

@section('content')
@livewire('reservation-edit-form', ['reservation_id' => $id])
@endsection