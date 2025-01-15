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
    public function create(int $event_id)
    {
        $users = User::all();

        return view('reservation.create', [
            'event_id' => $event_id,
            'users' => $users
        ]);
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
