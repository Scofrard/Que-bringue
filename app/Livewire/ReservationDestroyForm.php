<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reservation;

class ReservationDestroyForm extends Component
{
    public $reservationId;

    public function destroy()
    {
        $reservation = Reservation::findOrFail($this->reservationId);

        // Récupération de l'event lié
        $event = $reservation->event;

        // Mise à jour des places disponibles
        $event->seats += $reservation->seats;
        $event->save();

        // Suppression de la réservation
        $reservation->delete();

        session()->flash('success', 'La réservation a été supprimée');
    }
}
