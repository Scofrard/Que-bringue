<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use App\Models\Localisation;
use App\Models\Image;
//use Illuminate\Container\Attributes\Storage;
use Illuminate\Support\Facades\Storage;



class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        $categories = Category::all();
        $localisations = Localisation::all();

        $eventBanger = Event::whereHas('categories', function ($query) {
            $query->where('categories.name', 'Banger');
        })->first();

        $eventsCategoryOne = Event::whereHas('categories', function ($query) {
            $query->where('categories.id', '1');
        })->get();

        $eventsCategoryTwo = Event::whereHas('categories', function ($query) {
            $query->where('categories.id', '2');
        })->get();

        $eventsCategoryThree = Event::whereHas('categories', function ($query) {
            $query->where('categories.id', '3');
        })->get();

        $eventsCategoryFour = Event::whereHas('categories', function ($query) {
            $query->where('categories.id', '4');
        })->get();

        $eventsCategoryFive = Event::whereHas('categories', function ($query) {
            $query->where('categories.id', '5');
        })->get();



        return view('event.index', compact('events', 'eventBanger', 'eventsCategoryOne', 'eventsCategoryTwo', 'eventsCategoryThree', 'eventsCategoryFour', 'eventsCategoryFive'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::findOrFail($id);

        $latitude = 17.189877;
        $longitude = -88.49765;

        $initialMarkers = [
            [
                'position' => [
                    'lat' => 28.625485,
                    'lng' => 79.821091
                ],
                'label' => ['color' => 'white', 'text' => 'P1'],
                'draggable' => true
            ],
            [
                'position' => [
                    'lat' => 28.625293,
                    'lng' => 79.817926
                ],
                'label' => ['color' => 'white', 'text' => 'P2'],
                'draggable' => false
            ],
            [
                'position' => [
                    'lat' => 28.625182,
                    'lng' => 79.81464
                ],
                'label' => ['color' => 'white', 'text' => 'P3'],
                'draggable' => true
            ]
        ];

        return view('event.show', compact('event', 'latitude', 'longitude', 'initialMarkers'));
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
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'address-input' => 'required',
            'address-latitude' => 'required',
            'address-longitude' => 'required',
            'attachment' => 'required|array|mimes:jpg,jpeg,png,pdf|max:2048',
            'categories' => 'required|array',
            'categories.*' => 'integer|exists:categories,id',
        ]);

        //Combiner la date et l'heure dans le champs Date de la table events
        $datetime = $request->date . ' ' . $request->time;

        $event = Event::create(array_merge($validated, ['date' => $datetime]));

        $event->categories()->attach($validated['categories']);

        $localisation = new Localisation();
        $localisation->event_id = $event->id;
        $localisation->full_address = $request->input('address-input');
        $localisation->latitude = $request->input('address-latitude');
        $localisation->longitude = $request->input('address-longitude');
        $localisation->save();

        foreach ($request->file('attachment') as $file) {

            $nameImage = Storage::disk('public')->put('events', $file);

            $image = Image::create([
                'event_id' => $event->id,
                'path' => $nameImage
            ]);
        }

        return redirect()->route('event.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('event.edit', compact('id'));
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

        $datetime = $request->date . ' ' . $request->time;
        $event->date = $event->date !== $datetime ? $datetime : $event->date;

        $event->save();

        $event->categories()->sync($request->categories);

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

    public function editLocalisation($id)
    {
        $event = Event::with('localisation')->findOrFail($id);

        return view('event.edit-localisation', compact('event'));
    }

    public function updateLocalisation(Request $request, $id)
    {
        $validated = $request->validate([
            'address-input' => 'required|string|max:255',
            'address-latitude' => 'required|numeric',
            'address-longitude' => 'required|numeric',
        ]);

        $event = Event::findOrFail($id);

        $event->localisation()->updateOrCreate(
            ['event_id' => $event->id],
            [
                'full_address' => $validated['address-input'],
                'latitude' => $validated['address-latitude'],
                'longitude' => $validated['address-longitude'],
            ]
        );

        return redirect()->route('event.index');
    }
}
