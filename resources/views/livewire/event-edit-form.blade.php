<div id="event-edit-blade">
    <div class="container form">
        <div>
            <form wire:submit.prevent="submit" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Nom de l'événement</label>
                        <input type="text" id="name" wire:model="name" placeholder="Nom">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" id="description" wire:model="description" placeholder="Description">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="seats">Places disponibles</label>
                        <input type="number" id="seats" wire:model="seats" placeholder="Sièges">
                    </div>
                    <div class="form-group">
                        <label for="date">Date de l'événement</label>
                        <input type="date" id="date" wire:model="date">
                    </div>

                    <div class="form-group">
                        <label for="time">Heure de l'événement</label>
                        <input type="time" id="time" wire:model="time">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="attachment">Photo de l'événement</label>
                        @foreach ($existingImages as $image)
                        <div>
                            <img src="{{ asset('storage/' . $image['path']) }}" alt="Image">
                            <button type="button" wire:click="removeImage({{ $image['id'] }})" class="btn-primary">Supprimer</button>
                        </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <h3>Ajouter de nouvelles images</h3>
                        <input type="file" wire:model="newImages" multiple>
                    </div>
                    <button type="button" wire:click="updateImages" class="btn-primary">Enregistrer les images</button>
                </div>
                <div class="form-group">
                    <label for="categories">Catégories</label>
                    <select wire:model="selectedCategories" multiple>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn-primary">Modifier l'événement</button>
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
@endpush