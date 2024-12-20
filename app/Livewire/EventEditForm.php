<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Event;
use App\Models\Category;
use Carbon\Carbon;

class EventEditForm extends Component
{
    public $event;
    public $categories;
    public $name;
    public $description;
    public $seats;
    public $date;
    public $time;
    public $selectedCategories = [];
    public $newImages = [];

    public function mount($id)
    {
        $this->event = Event::with('categories')->findOrFail($id);
        $this->categories = Category::all();

        // Initialisation des propriétés
        $this->name = $this->event->name;
        $this->description = $this->event->description;
        $this->seats = $this->event->seats;
        $this->date = Carbon::parse($this->event->date)->format('Y-m-d');
        $this->time = Carbon::parse($this->event->date)->format('H:i');
        $this->selectedCategories = $this->event->categories->pluck('id')->toArray();
    }

    public function submit()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'seats' => 'required|integer|min:1',
            'date' => 'required|date',
            'time' => 'required',
            'selectedCategories' => 'array',
        ]);

        $datetime = $validatedData['date'] . ' ' . $validatedData['time'];
        $this->event->update([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'seats' => $validatedData['seats'],
            'date' => $datetime,
        ]);

        $this->event->categories()->sync($validatedData['selectedCategories']);

        session()->flash('success', 'Événement mis à jour avec succès.');
    }

    public function render()
    {
        return view('livewire.event-edit-form');
    }
}
