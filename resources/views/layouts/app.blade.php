<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Qué bringue')</title>
    @livewireStyles
    @stack('styles')
    <link rel="icon" href="{{ asset('assets/svg/faviconquebringue.svg') }}" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=sora:400,500,600&display=swap?v=2" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/vmj5cbu.css">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <header class="container">
        <div class="logosvg">
            <a href="{{ route('event.index') }}" wire:navigate>
                <img src="{{ asset('assets/svg/logoquebringue.svg') }}" alt="Logo Québringue">
            </a>
        </div>
        <div class="btnreservation">
            @if (Route::has('login'))
            <nav>
                @auth
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit">Déconnexion</button>
                </form>
                <a href="{{ route('reservation.index') }}" class="btn-primary" wire:navigate>Tes réservations</a>
                @else
                <a href="{{ route('login') }}" wire:navigate>Connexion</a>
                <span>/</span>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" wire:navigate>Inscription</a>
                @endif
                @endauth
            </nav>
            @endif
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->

    <footer>
        <div class="footercolumns">
            <div class="footercolumn one">
                <img src="{{ asset('assets/svg/logoquebringue.svg') }}" alt="Logo Québringue">
                <h5>Follow nous</h5>
                <ul>
                    <li>
                        <a data-social="Facebook" style="--accent-color: #0866FF" href="https://www.facebook.com/"
                            target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path
                                    d="M13.397 20.997v-8.196h2.765l.411-3.209h-3.176V7.548c0-.926.258-1.56 1.587-1.56h1.684V3.127A22.336 22.336 0 0 0 14.201 3c-2.444 0-4.122 1.492-4.122 4.231v2.355H7.332v3.209h2.753v8.202h3.312z">
                                </path>
                            </svg>
                            <span class="linkvisible">Facebook</span>
                        </a>
                    </li>
                    <li>
                        <a data-social="Instagram" style="--accent-color: #E4405F" href="https://www.instagram.com/"
                            target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path
                                    d="M11.999 7.377a4.623 4.623 0 1 0 0 9.248 4.623 4.623 0 0 0 0-9.248zm0 7.627a3.004 3.004 0 1 1 0-6.008 3.004 3.004 0 0 1 0 6.008z">
                                </path>
                                <circle cx="16.806" cy="7.207" r="1.078"></circle>
                                <path
                                    d="M20.533 6.111A4.605 4.605 0 0 0 17.9 3.479a6.606 6.606 0 0 0-2.186-.42c-.963-.042-1.268-.054-3.71-.054s-2.755 0-3.71.054a6.554 6.554 0 0 0-2.184.42 4.6 4.6 0 0 0-2.633 2.632 6.585 6.585 0 0 0-.419 2.186c-.043.962-.056 1.267-.056 3.71 0 2.442 0 2.753.056 3.71.015.748.156 1.486.419 2.187a4.61 4.61 0 0 0 2.634 2.632 6.584 6.584 0 0 0 2.185.45c.963.042 1.268.055 3.71.055s2.755 0 3.71-.055a6.615 6.615 0 0 0 2.186-.419 4.613 4.613 0 0 0 2.633-2.633c.263-.7.404-1.438.419-2.186.043-.962.056-1.267.056-3.71s0-2.753-.056-3.71a6.581 6.581 0 0 0-.421-2.217zm-1.218 9.532a5.043 5.043 0 0 1-.311 1.688 2.987 2.987 0 0 1-1.712 1.711 4.985 4.985 0 0 1-1.67.311c-.95.044-1.218.055-3.654.055-2.438 0-2.687 0-3.655-.055a4.96 4.96 0 0 1-1.669-.311 2.985 2.985 0 0 1-1.719-1.711 5.08 5.08 0 0 1-.311-1.669c-.043-.95-.053-1.218-.053-3.654 0-2.437 0-2.686.053-3.655a5.038 5.038 0 0 1 .311-1.687c.305-.789.93-1.41 1.719-1.712a5.01 5.01 0 0 1 1.669-.311c.951-.043 1.218-.055 3.655-.055s2.687 0 3.654.055a4.96 4.96 0 0 1 1.67.311 2.991 2.991 0 0 1 1.712 1.712 5.08 5.08 0 0 1 .311 1.669c.043.951.054 1.218.054 3.655 0 2.436 0 2.698-.043 3.654h-.011z">
                                </path>
                            </svg>
                            <span class="linkvisible">Instagram</span>
                        </a>
                    </li>
                    <li>
                        <a data-social="TikTok" style="--accent-color: #cd3361" href="https://www.tiktok.com/"
                            target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path
                                    d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z">
                                </path>
                            </svg>
                            <span class="linkvisible">TikTok</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="footercolumn two">
                <h5>Catégories</h5>
                <ul>
                    <li><a href="#">A nié louper</a></li>
                    <li><a href="#">En couple</a></li>
                    <li><a href="#">Entre potes</a></li>
                    <li><a href="#">En famille</a></li>
                    <li><a href="#">Avec les tchios</a></li>
                </ul>
            </div>
            <div class="footercolumn three">
                <h5>Villes</h5>
                <ul>
                    <li><a href="#">Tournai</a></li>
                    <li><a href="#">Mons</a></li>
                    <li><a href="#">Charleroi</a></li>
                    <li><a href="#">Liège</a></li>
                    <li><a href="#">Namur</a></li>
                </ul>
            </div>
            <div class="footercolumn four">
                <h5>Infos</h5>
                <ul>
                    <li><a href="#">Politique de confidentialité</a></li>
                    <li><a href="#">Mentions légales</a></li>
                </ul>
            </div>
        </div>
    </footer>
    @livewireScripts
    @stack('scripts')
</body>

</html>