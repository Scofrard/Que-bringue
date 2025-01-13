<div id="forgot-password-form">
    <div class="container form">
        <div class="auth-form">
            <h1 class="form-title">Mot de passe oublié</h1>
            <form wire:submit.prevent="submit">
                <div class="form-row">
                    <div class="form-group">
                        <label for="email">{{ __('Email') }}</label>
                        <input id="email" type="email" wire:model="email" placeholder="Email" required autofocus>
                        @error('email') <span style="color: #FF56C2;">{{ $message }}</span> @enderror
                    </div>
                </div>
                <button type="submit" class="btn-primary reservation">{{ __('Envoyer le lien par mail') }}</button>
                @if (session()->has('message'))
                <div class="form-group">
                    <p style="color: #FF56C2;">{{ session('message') }}</p>
                </div>
                @endif
            </form>
        </div>
    </div>
</div>
@push('styles')
<link rel="stylesheet" href="{{ asset('css/reset.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush