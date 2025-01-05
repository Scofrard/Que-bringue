<div id="event-create-form">
    <div class="container form">
        <div>
            <h1>Créer un événement</h1>
            <form wire:submit.prevent="submit" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Nom de l'événement</label>
                        <input type="text" id="name" wire:model="name" placeholder="Nom de l'événement" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" wire:model="description" placeholder="Description" required></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="seats">Places disponibles</label>
                        <input type="number" id="seats" wire:model="seats" placeholder="Sièges" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Date de l'événement</label>
                        <input type="date" id="date" wire:model="date" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="time">Heure de l'événement</label>
                        <input type="time" id="time" wire:model="time" required>
                    </div>
                    <div class="form-group">
                        <label for="attachment">Photo(s) de l'événement</label>
                        <input type="file" id="attachment" wire:model="attachment" multiple>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="categories">Catégorie(s)</label>
                        <select wire:model="category_ids" multiple>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="address-input">Search Address , City or Country</label>
                        <input type="text" class="form-control map-input" id="address-input" wire:model.defer="addressInput">
                    </div>
                    <hr>
                    <div id="address-map-container" style="width: 100%; height:400px;"> </div>
                    <div style="width: 100%; height: 100%" id="address-map"></div>
                    <div class="form-group">
                        <label for="address-latitude">Latitude</label>
                        <input type="text" class="form-control" id="address-latitude" wire:model.defer="addressLatitude">
                    </div>
                    <div class="form-group">
                        <label for="address-longitude">Longitude</label>
                        <input type="text" class="form-control" id="address-longitude" wire:model.defer="addressLongitude">
                    </div>
                </div>
                <button type="submit" class="btn-primary reservation">Créer</button>
            </form>
            @if (session()->has('success'))
            <div style="color: #FF56C2;">{{ session('success') }}</div>
            @endif
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="{{ asset('css/reset.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">-->
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.api.key') }}&libraries=places&callback=initialize" async defer> </script>
<script type="text/javascript" src="/js/mapinput.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
@endpush