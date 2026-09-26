<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Models\Event;
use App\Models\Organization;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Http\Request;

class EventController extends Controller
{
    public function create()
    {
        if (Auth::user()->hasRole('admin')) {
            $organizations = Organization::all();
        } else {
            $organizations = Auth::user()->organizations;
        }

        return view('events.create', compact('organizations'));
    }

    public function store(StoreEventRequest $request)
    {
        Event::create($request->validated());

        return redirect()->route('dashboard')->with('success', 'Event created successfully.');;
    }
}
