<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Event;

class ReservationCreateForm extends Component
{
    public $user_id;
    public $event_id;
    public $seats = 1;

    public function increment()
    {
        $this->seats++;
    }

    public function decrementSeats()
    {
        if ($this->seats > 1) {
            $this->seats--;
        }
    }


    public function submit()
    {
        $validatedData = $this->validate([
            'user_id' => 'required|exists:users,id',
            'event_id' => 'required|exists:events,id',
            'seats' => 'required|integer|min:1',
        ]);

        Reservation::create($validatedData);

        $this->reset();

        session()->flash('success', 'Réservation créée avec succès !');
    }

    public function render()
    {
        return view('livewire.reservation-create-form', [
            'events' => Event::all(),
            'users' => User::all(),
        ]);
    }
}
