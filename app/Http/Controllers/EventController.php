<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    // Method baru untuk landing page
    public function getUpcomingEvents()
    {
        $events = Event::query()
            ->where('is_active', true)
            ->whereDate('event_date', '>=', now()->format('Y-m-d'))
            ->orderBy('event_date', 'asc')
            ->take(3)
            ->get();

        // Log untuk debugging
        Log::info('Upcoming Events Query:', [
            'count' => $events->count(),
            'current_date' => now()->format('Y-m-d'),
            'events' => $events->toArray()
        ]);

        return $events;
    }
}

