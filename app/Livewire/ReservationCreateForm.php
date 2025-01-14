<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reservation;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class ReservationCreateForm extends Component
{
    public $event_id;
    public $seats = 1;

    public function mount($event_id = null)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $this->event_id = $event_id;
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

    public function submit()
    {
        $validatedData = $this->validate([
            'event_id' => 'required|exists:events,id',
            'seats' => 'required|integer|min:1',
        ]);

        $validatedData['user_id'] = Auth::id();
        Reservation::create($validatedData);

        $this->reset();
        session()->flash('success', 'Réservation créée avec succès !');
    }

    public function render()
    {

        return view('livewire.reservation-create-form', [
            'events' => Event::all(),
        ]);
    }
}
