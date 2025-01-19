@extends('layouts.app')

@section('title', 'Connexion')

@section('content')
@livewire('login-form')
@endsection

@push('scripts')
<script>
    console.log("Livewire chargé");
    document.addEventListener('livewire:load', function() {
        window.livewire.on('redirect', (event) => {
            console.log("Événement reçu :", event);
            if (event && event.url) {
                console.log("Redirection vers l'URL :", event.url);
                window.location.href = event.url;
            }
        });
    });
</script>
@endpush