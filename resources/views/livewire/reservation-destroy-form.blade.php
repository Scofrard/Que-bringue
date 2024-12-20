<div>
    <div>
        <button wire:click="destroy">Supprimer</button>
    </div>
    @if (session()->has('success'))
    <p class="success">{{ session('success') }}</p>
    @endif
</div>