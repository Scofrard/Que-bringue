<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reservation;

class ReservationDestroyForm extends Component
{
    public $reservationId;

    public function destroy()
    {
        $reservationId = Reservation::findOrFail($this->reservationId);
        $reservationId->delete();

        session()->flash('success', 'La réservation a été supprimée');
    }

    public function render()
    {
        return view('livewire.reservation-destroy-form');
    }
}
