<div id="event-create-form">
    <h1>Créer un nouvel événement</h1>
    <form wire:submit.prevent="submit" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div>
            <label for="name">Nom de l'événement</label>
            <input type="text" id="name" wire:model="name" placeholder="Nom" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea id="description" wire:model="description" placeholder="Description" required></textarea>
        </div>
        <div>
            <label for="seats">Places disponibles</label>
            <input type="number" id="seats" wire:model="seats" placeholder="Sièges" required>
        </div>
        <div>
            <label for="date">Date de l'événement</label>
            <input type="date" id="date" wire:model="date" required>
        </div>
        <div>
            <label for="time">Heure de l'événement</label>
            <input type="time" id="time" wire:model="time" required>
        </div>
        <div>
            <label for="attachment">Photo(s) de l'événement</label>
            <input type="file" id="attachment" wire:model="attachment" multiple>
        </div>
        <div>
            <label for="categories">Catégorie(s)</label>
            <select wire:model="category_ids" multiple>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="address-input" class="form-label">Search Address , City or Country</label>
            <input type="text" class="form-control map-input" id="address-input" wire:model.defer="addressInput">
        </div>
        <hr>
        <div id="address-map-container" style="width: 100%; height:400px;"> </div>
        <div style="width: 100%; height: 100%" id="address-map"></div>
        <div class="mb-3">
            <label for="address-latitude" class="form-label">Latitude</label>
            <input type="text" class="form-control" id="address-latitude" wire:model.defer="addressLatitude">
        </div>
        <div class="mb-3">
            <label for="address-longitude" class="form-label">Longitude</label>
            <input type="text" class="form-control" id="address-longitude" wire:model.defer="addressLongitude">
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
    @if (session()->has('success'))
    <div style="color: #FF56C2;">{{ session('success') }}</div>
    @endif
</div>

@push('styles')
<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">-->
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.api.key') }}&libraries=places&callback=initialize" async defer> </script>
<script type="text/javascript" src="/js/mapinput.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
@endpush