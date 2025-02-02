<div id="event-create-form">
    <div class="form">
        <div class="auth-form">
            <h1 class="form-title">Connexion</h1>
            <form wire:submit.prevent="login">
                <!-- token permettent de sécuriser la relation entre l'application web, navigateur et utilisateurs -->
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label for="email">{{ __('Email') }}</label>
                        <input id="email" type="email" wire:model="email" placeholder="Email" required autofocus>
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
                <div class="remember">
                    <label for="remember_me">
                        <input id="remember_me" type="checkbox" wire:model="remember">
                        <span>{{ __('Se souvenir de moi') }}</span>
                    </label>
                </div>
                <button type="submit" class="btn-primary reservation">
                    {{ __('Se connecter') }}
                </button>
                @if (session()->has('success'))
                <div class="form-group">
                    <p style="color:#FFEC00">{{ session('success') }}</p>
                </div>
                @endif
                <div class="form-group">
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" wire:navigate>
                        {{ __('Mot de passe oublié ?') }}
                    </a>
                    <a href="{{ route('register') }}" wire:navigate>Pas de compte ? Inscris-toi</a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@push('styles')
<link rel="stylesheet" href="{{ asset('css/reset.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush