<div id="reservation-edit-form">
    <div class="container">
        <h1>Modifier la réservation</h1>
        <form wire:submit.prevent="submit">
            @csrf
            @method('POST')
            <div>
                <label for="user_id">User</label>
                <select name="user_id" id="user_id" wire:model="user_id" required>
                    <option value="">Select User</option>
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('user_id') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="event_id">Event</label>
                <select name="event_id" id="event_id" wire:model="event_id" required>
                    <option value="">Select Event</option>
                    @foreach ($events as $event)
                    <option value="{{ $event->id }}">{{ $event->name }}</option>
                    @endforeach
                </select>
                @error('event_id') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="seats">Seats</label>
                <input type="number" name="seats" id="seats" wire:model="seats" min="1" required>
                @error('seats') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div>
                <button type="submit">Modifier la réservation</button>
            </div>
        </form>
        @if (session()->has('success'))
        <p class="success">{{ session('success') }}</p>
        @endif
        <a href="{{ route('reservation.index') }}" wire:navigate>Retour à la liste des réservations</a>
    </div>
</div>