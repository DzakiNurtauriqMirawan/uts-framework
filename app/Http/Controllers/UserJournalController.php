<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Journal;

class UserJournalController extends Controller
{
    public function showForUser()
{
    $journals = Journal::all(); // Mengambil semua jurnal
    return view('user.journals', compact('journals')); // Mengirim data jurnal ke view user.journals
}

}
