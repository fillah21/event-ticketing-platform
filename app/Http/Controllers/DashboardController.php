<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $eventsQuery = Event::query()
            ->with('organization')
            ->orderBy('starts_at');

        if(!$user->hasRole('admin')) {
            $eventsQuery->whereIn('organization_id', $user->organizations()->select('organizations.id'));
        }

        $events = $eventsQuery->get();

        return view('dashboard', compact('events'));
    }
}
