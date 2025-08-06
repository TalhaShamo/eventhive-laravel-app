<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        // Fetch all events from the database, ordered by the newest first
        $events = Event::latest()->get();

        // Pass the events to the view
        return view('events.index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
            // This method just shows the form view we just created.
            return view('events.create');
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
            // Validate the incoming request data
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'date' => 'required|date',
                'location' => 'required|string|max:255',
            ]);
            
            // Merge the logged-in user's ID into the validated data
            $validated['user_id'] = auth()->id();
            
            // Create the new event
            Event::create($validated);
            
            // Redirect the user to the events index page with a success message
            return redirect()->route('events.index')
                            ->with('success', 'Event created successfully!');
        }

    /**
     * Display the specified resource.
     */
    
    public function show(Event $event){
        // Thanks to Route Model Binding, Laravel has already fetched the correct event.
        // We just need to pass it to the view.
        return view('events.show', ['event' => $event]);
    }


    /**
    * Show the form for editing the specified resource.
    */
    public function edit(Event $event){
            // The correct event is already loaded by Route Model Binding.
            // We just show the edit form and pass the event data to it.
            return view('events.edit', ['event' => $event]);
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event){
        // Validate the incoming request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        // Update the event with the validated data
        $event->update($validated);

        // Redirect back to the events index page with a success message
        return redirect()->route('events.index')
                        ->with('success', 'Event updated successfully!');
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event){
        // Delete the event from the database
        $event->delete();

        // Redirect back to the events index page with a success message
        return redirect()->route('events.index')
                        ->with('success', 'Event deleted successfully!');
    }
}
