<x-guest-layout>
    <x-authentication-card>
        <x-slot name="style">
            <link rel="icon" href="{{ asset('assets/svg/faviconquebringue.svg') }}" type="image/x-icon" />
            <link rel="preconnect" href="https://fonts.bunny.net">
            <link href="https://fonts.bunny.net/css?family=sora:400,500,600&display=swap?v=2" rel="stylesheet">
            <link rel="stylesheet" href="https://use.typekit.net/vmj5cbu.css">
            <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
            <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        </x-slot>
        <div id="reset-password-form">
            <div class="form">
                <div class="auth-form">
                    <h1 class="form-title">Réinitialisation du mot de passe</h1>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <!-- Token requis pour le reset -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="form-row">
                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" placeholder="Email" required autofocus>
                                @error('email') <span style="color: #FF56C2;">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="password">{{ __('Nouveau mot de passe') }}</label>
                                <input id="password" type="password" name="password" placeholder="Mot de passe" required>
                                @error('password') <span style="color: #FF56C2;">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="password_confirmation">{{ __('Confirmer le mot de passe') }}</label>
                                <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirmer le mot de passe" required>
                                @error('password_confirmation') <span style="color: #FF56C2;">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn-primary reservation">
                            {{ __('Réinitialiser le mot de passe') }}
                        </button>

                        @if (session()->has('message'))
                        <div class="form-group">
                            <p style="color: #FF56C2;">{{ session('message') }}</p>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>