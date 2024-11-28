<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        $categories = Category::all();

        $eventsCategoryEnCouple = Event::whereHas('categories', function ($query) {
            $query->where('categories.name', 'En couple');
        })->get();
        //dd($eventsCategoryEnCouple);

        return view('event.index', compact('events', 'eventsCategoryEnCouple'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::findOrFail($id);
        return view('event.show', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('event.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'seats' => 'required',
            'date' => 'required',
            'categories' => 'required|array',
            'categories.*' => 'integer|exists:categories,id',
        ]);

        $event = Event::create($validated);
        $event->categories()->attach($validated['categories']);

        return redirect()->route('event.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        $categories = Category::all();
        return view('event.edit', compact('event', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);

        $event->name = $event->name !== $request->name ? $request->name : $event->name;
        $event->description = $event->description !== $request->description ? $request->description : $event->description;
        $event->seats = $event->seats !== $request->seats ? $request->seats : $event->seats;
        $event->date = $event->date !== $request->date ? $request->date : $event->date;

        $event->save();

        return redirect()->route('event.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('event.index');
    }
}
