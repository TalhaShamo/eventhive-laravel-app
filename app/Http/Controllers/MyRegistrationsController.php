<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyRegistrationsController extends Controller
{
    public function index()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Load the events the user is registered for using the relationship we defined
        $registrations = $user->registrations()->latest()->get();

        // Pass the registrations to a new view
        return view('my-registrations.index', ['registrations' => $registrations]);
    }
}