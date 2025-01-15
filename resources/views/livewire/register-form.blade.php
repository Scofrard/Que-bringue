<div id="event-create-form">
    <div class="form">
        <div class="auth-form">
            <h1 class="form-title">Inscription</h1>
            <form wire:submit.prevent="register">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label for="firstname">{{ __('Prénom') }}</label>
                        <input id="firstname" type="text" wire:model="firstname" placeholder="Prénom" required autofocus>
                        @error('firstname') <span style="color: #FF56C2;">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">{{ __('Nom') }}</label>
                        <input id="name" type="text" wire:model="name" placeholder="Nom" required>
                        @error('name') <span style="color: #FF56C2;">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="phone">{{ __('Téléphone') }}</label>
                        <input id="phone" type="tel" wire:model="phone" placeholder="Téléphone" required>
                        @error('phone') <span style="color: #FF56C2;">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="email">{{ __('Email') }}</label>
                        <input id="email" type="email" wire:model="email" placeholder="Email" required>
                        @error('email') <span style="color: #FF56C2;">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="password">{{ __('Mot de passe') }}</label>
                        <input id="password" type="password" wire:model="password" placeholder="Mot de passe" required>
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
                <div class="remember">
                    <label for="terms">
                        <input id="terms" type="checkbox" wire:model="terms" required>
                        <span>{{ __('J\'accepte les termes et conditions') }}</span>
                    </label>
                    @error('terms') <span style="color: #FF56C2;">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="btn-primary reservation">
                    {{ __('S\'inscrire') }}
                </button>
                @if (session()->has('message'))
                <div class="form-group">
                    <p style="color: #FF56C2;">{{ session('message') }}</p>
                </div>
                @endif
                <div class="form-group">
                    <a href="{{ route('login') }}" wire:navigate>Déjà inscrit ? Connecte-toi</a>
                </div>
            </form>
        </div>
    </div>
</div>
@push('styles')
<link rel="stylesheet" href="{{ asset('css/reset.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush