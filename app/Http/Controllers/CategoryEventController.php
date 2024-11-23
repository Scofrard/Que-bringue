<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryEvent;

class CategoryEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
        ]);

        dd($validated);
        //Erreur : SQLSTATE[HY000]: General error: 1 no such table: category_events (Connection: sqlite, SQL: insert into "category_events" ("event_id", "category_id", "updated_at", "created_at") values (6, 2, 2024-11-23 16:26:37, 2024-11-23 16:26:37))

        // Sauvegarde dans la table intermédiaire
        foreach ($validated['categories'] as $category_id) {
            CategoryEvent::create([
                'event_id' => $validated['event_id'],
                'category_id' => $category_id,
            ]);
        }

        return redirect()->route('event.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
