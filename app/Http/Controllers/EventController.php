<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function userIndex()
    {
        $events = Event::where('status', 'active')
                      ->orderBy('event_date', 'desc')  // Menggunakan event_date alih-alih date
                    ->get();
        return view('user.events', compact('events'));
    }

    public function adminIndex()
    {
        $events = Event::orderBy('event_date', 'desc')->get();
        return view('admin.admin', compact('events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'location' => 'required',
            'event_date' => 'required|date',  // Menggunakan event_date
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive',
            'price' => 'required|numeric'
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/events'), $imageName);

        Event::create([
            'title' => $request->title,
            'location' => $request->location,
            'event_date' => $request->event_date,  // Menggunakan event_date
            'description' => $request->description,
            'image' => $imageName,
            'status' => $request->status,
            'price' => $request->price
        ]);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'location' => 'required',
            'event_date' => 'required|date',  // Menggunakan event_date
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive',
            'price' => 'required|numeric'
        ]);

        if ($request->hasFile('image')) {
            if ($event->image) {
                Storage::delete('public/uploads/events/' . $event->image);
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/events'), $imageName);
            $event->image = $imageName;
        }

        $event->update([
            'title' => $request->title,
            'location' => $request->location,
            'event_date' => $request->event_date,  // Menggunakan event_date
            'description' => $request->description,
            'status' => $request->status,
            'price' => $request->price
        ]);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil diperbarui!');
    }
}