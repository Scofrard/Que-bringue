<div id="reset-password-form">
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
                <div class="form-row">
                    <div class="form-group">
                        <label for="password">{{ __('Nouveau mot de passe') }}</label>
                        <input id="password" type="password" wire:model="password" placeholder="Nouveau mot de passe" required>
                        @error('password') <span style="color: #FF56C2;">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="password_confirmation">{{ __('Confirmer le mot de passe') }}</label>
                        <input id="password_confirmation" type="password" wire:model="password_confirmation" placeholder="Confirmer le mot de passe" required>
                        @error('password_confirmation') <span style="color: #FF56C2;">{{ $message }}</span> @enderror
                    </div>
                </div>
                <button type="submit" class="btn-primary reservation">{{ __('Réinitialiser le mot de passe') }}</button>
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