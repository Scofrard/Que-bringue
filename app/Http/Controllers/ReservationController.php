<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Event;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::with(['user', 'event'])
            ->where('user_id', auth()->id())
            ->get();

        return view('reservation.index', compact('reservations'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reservation = Reservation::with(['user', 'event'])->findOrFail($id);

        $latitude = $reservation->event->localisation->latitude ?? null;
        $longitude = $reservation->event->localisation->longitude ?? null;

        return view('reservation.show', compact('reservation', 'latitude', 'longitude'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $events = Event::all();
        $users = User::all();

        // Récupérer l'événement sélectionné via la méthode request ou GET
        $selectedEvent = $request->query('event_id')
            ? Event::find($request->query('event_id'))
            : null;

        return view('reservation.create', compact('events', 'users', 'selectedEvent'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('reservation.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        return redirect()->route('reservation.index');
    }
}
