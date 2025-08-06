<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventRegistrationController extends Controller
{
    /**
     * Register the authenticated user for an event.
     */
    public function store(Request $request, Event $event)
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Attach the user to the event's attendees list.
        // Eloquent handles adding the record to the event_user pivot table.
        // attach() prevents duplicate entries automatically.
        $event->attendees()->attach($user->id);

        // Redirect back to the event page with a success message
        return redirect()->route('events.show', $event)
                         ->with('success', 'You have successfully registered for this event!');
    }

    /**
     * Unregister the authenticated user from an event.
     */
    public function destroy(Request $request, Event $event)
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Detach the user from the event's attendees list.
        // Eloquent handles removing the record from the event_user pivot table.
        $event->attendees()->detach($user->id);

        // Redirect back to the event page with a success message
        return redirect()->route('events.show', $event)
                         ->with('success', 'You have successfully unregistered from this event!');
    }
}
