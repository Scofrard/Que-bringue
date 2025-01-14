<div id="reservation-create-form">
    <div class="container">
        <a href="{{ route('event.index') }}" class="close-btn" wire:navigate>
            <img src="{{ asset('assets/svg/rollback.svg') }}" alt="Revenir en arrière">
        </a>
        <div class="form">
            <div>
                <h1 class="form-title">Réserve t'place ichi</h3>
                    <form wire:submit.prevent="submit" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group">
                                <label for="event_id">Événement :</label>
                                <select name="event_id" id="event_id" wire:model="event_id" required>
                                    <option value="">Sélectionner un événement</option>
                                    @foreach ($events as $event)
                                    <option value="{{ $event->id }}">{{ $event->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="places-group">
                                <label for="seats">Places :</label>
                                <div class="places-control">
                                    <button type="button" class="places-btn" wire:click="decrement">-</button>
                                    <input type="number" id="seats" name="seats" value="1" min="1" wire:model="seats">
                                    <button type="button" class="places-btn" wire:click="increment">+</button>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn-primary reservation">RÉSERVER</button>
                    </form>
                    @if (session()->has('success'))
                    <p class="success">{{ session('success') }}</p>
                    @endif
            </div>
        </div>
    </div>
</div>