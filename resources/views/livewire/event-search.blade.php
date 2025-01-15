<div>
    <form role="search">
        <input type="search"
            class="search-bar"
            placeholder="Recherche une bringue..."
            wire:model.live="search">
    </form>
    <div class="event-list">
        @foreach ($events as $event)
        <div class="event-item">
            <a href="{{ route('event.show', $event->id) }}" wire:navigate>
                <h3>{{ $event->name }}</h3>
                <p>{{ Str::limit($event->description, 100) }}</p>
            </a>
        </div>
        @endforeach
    </div>
</div>