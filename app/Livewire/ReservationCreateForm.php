<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reservation;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ReservationCreateForm extends Component
{
    public int $event_id;
    public $seats = 1;

    public function mount(int $event_id)
    {
        //Vérifier que l'utlisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $this->event_id = $event_id ?? Session::get('event_id'); // Initialise l'ID de l'event
    }


    public function increment()
    {
        $this->seats++;
    }

    public function decrement()
    {
        if ($this->seats > 1) {
            $this->seats--;
        }
    }

    public function submit(int $id)
    {
        Session::put('event_id', $id); // Stocke l'ID de l'événement dans la session

        // Valide les données soumises
        $validatedData = $this->validate([
            'seats' => 'required|integer|min:1',
        ]);

        //Trouver l'event via l'ID
        $event = Event::findOrFail($id);

        if ($this->seats > $event->seats) {
            session()->flash('error', 'Le nombre de places disponibles est insuffisant !');
            return;
        }

        //Enregistrer la réservation dans la DB
        Auth()->user()->reservations()->create([
            'seats' => $validatedData['seats'],
            'event_id' => $id
        ]);

        $event->seats -= $this->seats; // Diminue le nombre de places disponibles pour l'événement
        $event->save();

        $this->reset();

        session()->flash('success', 'Réservation créée avec succès !');
    }

    public function render()
    {
        return view('livewire.reservation-create-form', [
            'event' => Event::findOrFail($this->event_id ?? Session::get('event_id')),
        ]);
    }
}
