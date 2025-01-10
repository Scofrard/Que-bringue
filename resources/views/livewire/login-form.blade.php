<div id="event-create-form">
    <div class="container form">
        <div class="auth-form">
            <h1 class="form-title">Connexion</h1>
            <form wire:submit.prevent="login">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label for="email">{{ __('Email') }}</label>
                        <input id="email" type="email" wire:model="email" required autofocus>

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="password">{{ __('Mot de passe') }}</label>
                        <input id="password" type="password" wire:model="password" required>
                    </div>
                </div>
                <div>
                    <label for="remember_me">
                        <input id="remember_me" type="checkbox" wire:model="remember">
                        <span>{{ __('Se souvenir de moi') }}</span>
                </div>
                <div class="form-group">
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié ?') }}
                    </a>
                    @endif
                </div>
                <button type="submit" class="btn-primary reservation">
                    {{ __('Connexion') }}
                </button>
                <div class="error">
                    @error('email') <span style="color: #FF56C2;">{{ $message }}</span> @enderror
                </div>
        </div>
        @if (session()->has('error'))
        <div>
            {{ session('error') }}
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