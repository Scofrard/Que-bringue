@extends('layouts.app')

@section('title', 'Edit an event')

@section('content')
@livewire('event-edit-form', ['id' => $id])
@endsection