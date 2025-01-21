<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Event;

class EventSearch extends Component
{
    public $search = '';
    public function render()
    {
        //Déclaraton des résultats dans un tableau vide
        $results = [];

        //Si 1 caractère ou plus est entré par l'utulisateur on recherche tous les événemets correspondants
        if (strlen($this->search) >= 1) {
            $results = Event::where('name', 'like', '%' . $this->search . '%')->limit(7)->get();
        }

        return view('livewire.event-search', [
            'events' => $results
        ]);
    }
}
