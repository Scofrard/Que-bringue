<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;
use App\Models\Event;
use App\Models\Category;
use App\Models\Localisation;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class EventCreateForm extends Component
{
    use WithFileUploads;
    // Propriétés liées au formulaire
    public $name;
    public $description;
    public $seats;
    public $date;
    public $time;
    public $addressInput;
    public $addressLatitude;
    public $addressLongitude;
    public $attachment = [];
    public $category_ids = [];
    protected $listeners = ['updateCoordinates'];

    #[On('updateCoordinates')]
    public function updateCoordinates($latitude, $longitude, $address)
    {
        $this->addressLatitude = $latitude;
        $this->addressLongitude = $longitude;
        $this->addressInput = $address;
    }

    public function submit()
    {
        // Valider les données du formulaire
        $validatedData = $this->validate([
            'name' => 'required',
            'description' => 'required',
            'seats' => 'required',
            'date' => 'required',
            'time' => 'required',
            'addressInput' => 'required',
            'addressLatitude' => 'required',
            'addressLongitude' => 'required',
            'attachment' => 'nullable|array',
            'attachment.*' => 'file|mimes:jpeg,png,jpg,gif|max:2048',
            'category_ids' => 'required|array',
            'category_ids.*' => 'integer|exists:categories,id',
        ]);

        // Combiner la date et l'heure
        $validatedData['date'] = $validatedData['date'] . ' ' . $validatedData['time'];

        // Créer l'événement
        $event = Event::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'seats' => $validatedData['seats'],
            'date' => $validatedData['date'],
        ]);



        // Associer les catégories
        $event->categories()->attach($validatedData['category_ids']);

        // Créer la localisation et l'associer à l'événement
        $localisation = new Localisation();
        $localisation->event_id = $event->id;
        $localisation->full_address = $validatedData['addressInput'];
        $localisation->latitude = $validatedData['addressLatitude'];
        $localisation->longitude = $validatedData['addressLongitude'];
        $localisation->save();

        // Traiter et enregistrer les fichiers attachés
        foreach ($this->attachment as $file) {
            $path = $file->store('events', 'public');
            Image::create([
                'event_id' => $event->id,
                'path' => $path,
            ]);
        }

        // Réinitialiser le formulaire
        $this->reset();

        // Afficher un message de succès
        session()->flash('success', 'Evénement créé avec succès !');
    }


    public function render()
    {
        return view('livewire.event-create-form', [
            'categories' => Category::all(),
        ]);
    }
}
