<div>
    <form wire:submit.prevent="logout" method="POST" style="display: inline-block;">
        @csrf
        <button type="submit" class="logout"><img src="{{ asset('assets/svg/log-out.svg') }}" alt="Déconnexion"></button>
    </form>
    @if (session()->has('message'))
    <div class="form-group">
        <p style="color: #FFEC00;">{{ session('message') }}</p>
    </div>
    @endif
</div>