<div id="reservation-edit-form">
    <div class="container">
        <div class="form">
            <div>
                <h1>Modifier la réservation</h1>
                <form wire:submit.prevent="submit">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="user_id">Utilisateur</label>
                        <select name="user_id" id="user_id" wire:model="user_id" required>
                            <option value="">Select User</option>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="event_id">Evénement</label>
                        <select name="event_id" id="event_id" wire:model="event_id" required>
                            <option value="">Select Event</option>
                            @foreach ($events as $event)
                            <option value="{{ $event->id }}">{{ $event->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="seats">Places</label>
                        <input type="number" name="seats" id="seats" wire:model="seats" min="1" required>
                    </div>
                    <div>
                        <button type="submit" class="btn-primary">Modifier la réservation</button>
                    </div>
                </form>
                @if (session()->has('success'))
                <p class="success">{{ session('success') }}</p>
                @endif
                <a href="{{ route('reservation.index') }}" wire:navigate>Retour à la liste des réservations</a>
            </div>
        </div>
    </div>
</div>