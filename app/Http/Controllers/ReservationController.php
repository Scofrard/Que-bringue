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
        $reservations = Reservation::with(['user', 'event'])->get();
        $users = User::all();
        $events = Event::all();

        return view('reservation.index', compact('reservations', 'users', 'events'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reservation = Reservation::with(['user', 'event'])->findOrFail($id);

        return view('reservation.show', compact('reservation'));
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'event_id' => 'required|exists:events,id',
            'seats' => 'required',
        ]);

        Reservation::create($validated);

        return redirect()->route('reservation.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('reservation.edit', ['id' => $id]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'event_id' => 'required|exists:events,id',
            'seats' => 'required|integer|min:1',
        ]);

        $reservation = Reservation::findOrFail($id);

        $reservation->seats = $reservation->seats !== $request->seats ? $request->seats : $reservation->seats;

        $reservation->update($validated);

        return redirect()->route('reservation.index');
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
