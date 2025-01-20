<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reservation;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class ReservationEditForm extends Component
{
    public int $reservation_id;
    public int $event_id;
    public $seats;

    public function mount(int $reservation_id)
    {
        $reservation = Reservation::with('event')->findOrFail($reservation_id);

        if ($reservation->user_id !== Auth::id()) {
            abort(403);
        }

        $this->reservation_id = $reservation->id;
        $this->event_id = $reservation->event->id;
        $this->seats = $reservation->seats;
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
            'seats' => 'required|integer|min:1',
        ]);

        $reservation = Reservation::findOrFail($this->reservation_id);

        if ($reservation->user_id !== Auth::id()) {
            abort(403);
        }

        $event = Event::findOrFail($this->event_id);

        // Calcul de la différence entre les places réservées
        $difference = $validatedData['seats'] - $reservation->seats;

        // Vérification de la disponibilité si l'utilisateur augmente ses places
        if ($difference > 0 && $event->seats < $difference) {
            session()->flash('error', 'Pas assez de places disponibles');
            return;
        }

        // Mise à jour des places disponibles pour l'événement
        $event->seats -= $difference;
        $event->save();

        $reservation->update([
            'seats' => $validatedData['seats'],
        ]);

        session()->flash('success', 'Réservation mise à jour !');
    }

    public function render()
    {
        $event = Event::findOrFail($this->event_id);

        return view('livewire.reservation-edit-form', compact('event'));
    }
}
