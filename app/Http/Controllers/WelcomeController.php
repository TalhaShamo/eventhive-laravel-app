<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // Fetch all events, ordered by the newest first
        $events = Event::latest()->get();

        // Pass the events to the welcome view
        return view('welcome', ['events' => $events]);
    }
}