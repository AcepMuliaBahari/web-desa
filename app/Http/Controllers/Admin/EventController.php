<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{ 
    public function index()
    {
        $events = Event::latest()->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.form');
    }

    public function store(EventRequest $request)
    {
        $data = $request->validated();
        $data['is_active'] = $request->has('is_active');
        
        Event::create($data);
        return redirect()->route('admin.events.index')
            ->with('success', 'Acara berhasil ditambahkan');
    }

    public function show(Event $event)
    {
        return view('admin.events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('admin.events.form', compact('event'));
    }

    public function update(EventRequest $request, Event $event)
    {
        $data = $request->validated();
        $data['is_active'] = $request->has('is_active');
        
        $event->update($data);
        return redirect()->route('admin.events.index')
            ->with('success', 'Acara berhasil diperbarui');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index')
            ->with('toast',"sucess", 'Acara berhasil dihapus');
    }
}
