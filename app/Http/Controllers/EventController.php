<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::query();

        // Filter: title
        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        // Filter: status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter: start_date
        if ($request->filled('start_date')) {
            $query->whereDate('start_date', $request->start_date);
        }

        $events = $query->orderByDesc('start_date')->paginate(10)->withQueryString();

        return view('welcome', compact('events'));
    }

    public function create()
    {
        return view('form');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|in:published,draft,pused',
            'visibility' => 'required|in:live,draft',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'url' => 'nullable|url',
        ]);
        Event::create($data);
        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function edit(Event $event)
    {
        return view('form', compact('event'));
    }

    public function update(Request $request, Event $event): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|in:published,draft,pused',
            'visibility' => 'required|in:live,draft',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'url' => 'nullable|url',
        ]);
        $event->update($data);
        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event): RedirectResponse
    {
        $event->delete();
        return back()->with('success', 'Event deleted.');
    }
}
