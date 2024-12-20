<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Event;

class ReservationEditForm extends Component
{

    public $reservationId;
    public $user_id;
    public $event_id;
    public $seats;

    public $users;
    public $events;

    public function mount($id)
    {
        $this->reservationId = $id;
        $reservation = Reservation::findOrFail($id);

        $this->reservationId = $reservation->id;
        $this->user_id = $reservation->user_id;
        $this->event_id = $reservation->event_id;
        $this->seats = $reservation->seats;

        // Load users and events for the dropdowns
        $this->users = User::all();
        $this->events = Event::all();
    }

    public function submit()
    {
        $validatedData = $this->validate([
            'user_id' => 'required|exists:users,id',
            'event_id' => 'required|exists:events,id',
            'seats' => 'required|integer|min:1',
        ]);

        $reservation = Reservation::findOrFail($this->reservationId);

        $reservation->update($validatedData);

        session()->flash('success', 'La réservation a été mise à jour avec succès.');
    }

    public function render()
    {
        return view('livewire.reservation-edit-form');
    }
}
