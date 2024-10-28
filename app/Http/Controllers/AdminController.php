<?php

namespace App\Http\Controllers;

use App\Models\Event;  // Tambahkan ini untuk model Event
use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // Ambil data events dan journals
        $events = Event::all();
        $journals = Journal::all();

        // Kirim kedua data ke view
        return view('admin.admin', compact('events', 'journals'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}