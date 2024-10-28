<?php

namespace App\Http\Controllers;
use App\Models\Journal;
use App\Models\Event;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $journals = Journal::latest()->take(6)->get();
        $events = Event::where('event_date', '>=', now())
                      ->orderBy('event_date')
                      ->take(6)
                      ->get();

        return view('user.welcome', compact('journals', 'events'));
    }
}
