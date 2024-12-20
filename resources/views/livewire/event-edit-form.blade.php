<div id="event-edit-blade.php">
    <div class="container">
        <a href="{{ route('event.index') }}" wire:navigate>Revenir aux événements</a>
        <h1>Modifier l'événement </h1>
        <form wire:submit.prevent="submit" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div>
                <label for="name">Nom de l'événement</label>
                <input type="text" id="name" wire:model="name" placeholder="Nom">
            </div>

            <div>
                <label for="description">Description</label>
                <input type="text" id="description" wire:model="description" placeholder="Description">
            </div>

            <div>
                <label for="seats">Places disponibles</label>
                <input type="number" id="seats" wire:model="seats" placeholder="Sièges">
            </div>

            <div>
                <label for="date">Date de l'événement</label>
                <input type="date" id="date" wire:model="date">
            </div>

            <div>
                <label for="time">Heure de l'événement</label>
                <input type="time" id="time" wire:model="time">
            </div>

            <div>
                <label for="attachment">Photo de l'événement</label>
                @foreach ($event->images as $image)
                <img src="{{ asset('storage/' . $image->path) }}" alt="Event Image" style="width: 150px; height: auto;">
                @endforeach
                <input type="file" id="attachment" wire:model="attachments" multiple>
            </div>

            <div>
                <label for="categories">Catégories</label>
                <select wire:model="selectedCategories" multiple>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Modifier</button>
        </form>
        @if (session()->has('success'))
        <div style="color: #FF56C2;">{{ session('success') }}</div>
        @endif
    </div>
</div>