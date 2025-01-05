<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Event;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class EventEditForm extends Component
{
    use WithFileUploads;

    public $event;
    public $categories;
    public $name;
    public $description;
    public $seats;
    public $date;
    public $time;
    public $selectedCategories = [];
    public $newImages = [];
    public $existingImages = [];

    private function loadExistingImages()
    {
        $this->existingImages = $this->event->images->map(function ($image) {
            return [
                'id' => $image->id,
                'path' => $image->path,
            ];
        })->toArray();
    }


    public function mount($record)
    {
        $this->event = Event::with('categories')->findOrFail($record);
        $this->categories = Category::all();
        $this->name = $this->event->name;
        $this->description = $this->event->description;
        $this->seats = $this->event->seats;
        $this->date = Carbon::parse($this->event->date)->format('Y-m-d');
        $this->time = Carbon::parse($this->event->date)->format('H:i');
        $this->selectedCategories = $this->event->categories->pluck('id')->toArray();
        $this->loadExistingImages();
    }

    public function removeImage($imageId)
    {
        $image = $this->event->images()->find($imageId);

        if ($image) {
            Storage::delete($image->path);
            $image->delete();
        }

        $this->loadExistingImages();
        session()->flash('success', 'Image supprimée avec succès.');
    }

    public function updateImages()
    {
        $this->validate([
            'newImages.*' => 'image|max:2048',
        ]);

        foreach ($this->newImages as $newImage) {
            $path = $newImage->store('event_images', 'public');
            $image = $this->event->images()->create(['path' => $path]);

            $this->existingImages[] = [
                'id' => $image->id,
                'path' => $image->path,
            ];
        }

        session()->flash('success', 'Images mises à jour avec succès.');
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
