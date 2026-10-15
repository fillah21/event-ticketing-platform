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
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            $organizations = Organization::all();
        } else {
            $organizations = $user->organizations()
                ->wherePivot('role', 'owner')
                ->get();
        }

        return view('events.create', compact('organizations'));
    }


    public function store(StoreEventRequest $request)
    {
        Event::create($request->validated());

        return redirect()->route('dashboard')->with('success', 'Event created successfully.');;
    }
}
