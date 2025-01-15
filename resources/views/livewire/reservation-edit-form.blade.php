<div id="reservation-edit-form">
    <div class="container">
        <div class="details-hero">
            <a href="{{ route('reservation.index') }}" class="close-btn" wire:navigate>
                <img src="{{ asset('assets/svg/rollback.svg') }}" alt="Revenir en arrière">
            </a>
        </div>
        <div class="form">
            <div>
                <h1 class="form-title">Modifie ta réservation</h1>
                <form wire:submit.prevent="submit">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="event_name">Événement :</label>
                        <input type="text" id="event_name" value="{{ $event->name }}" disabled>
                    </div>
                    <div class="places-group">
                        <label for="seats">Places :</label>
                        <div class="places-control">
                            <button type="button" class="places-btn" wire:click="decrement">-</button>
                            <input type="number" id="seats" name="seats" value="1" min="1" wire:model="seats">
                            <button type="button" class="places-btn" wire:click="increment">+</button>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn-primary">Modifie ta réservation</button>
                    </div>
                </form>
                @if (session()->has('success'))
                <p class="success">{{ session('success') }}</p>
                @endif
            </div>
        </div>
    </div>
</div>