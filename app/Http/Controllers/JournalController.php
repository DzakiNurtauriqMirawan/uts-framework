<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Journal;
use Illuminate\Support\Facades\Storage;

class JournalController extends Controller
{
    // Method baru untuk tampilan user
    public function userIndex() {
        $journals = Journal::orderBy('date', 'desc')->get();
        return view('user.journals', compact('journals'));
    }

    // Method untuk tampilan admin (renamed dari index ke adminIndex untuk kejelasan)
    public function adminIndex() {
        // Mengambil semua data journal dan mengirimkannya ke view
        $journals = Journal::all(); // atau Journal::paginate(10) untuk pagination
        
        return view('admin.admin', compact('journals'));
    }

    public function create() {
        return view('admin.create');
    }

    public function store(Request $request) {
        // Validasi data yang diinputkan
        $validatedData = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'date' => 'required|date',
            'caption' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        // Buat instance journal baru
        $journal = new Journal();
        $journal->title = $request->title;
        $journal->category = $request->category;
        $journal->date = $request->date;
        $journal->caption = $request->caption;

        // Upload dan simpan gambar
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('assets', 'public');
            $journal->image = $path;
        }

        $journal->save();

        return redirect()->route('admin.journals.index')
            ->with('success', 'Jurnal berhasil ditambahkan.');
    }

    public function edit($id) {
        $journal = Journal::findOrFail($id);
        return view('admin.edit', compact('journal'));
    }

    public function update(Request $request, $id) {
        $journal = Journal::findOrFail($id);

        // Validasi data yang diinputkan
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'caption' => 'required|max:150',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|in:Music,Column,Education',
            'date' => 'required|date',
        ]);

        // Update basic fields
        $journal->title = $validatedData['title'];
        $journal->caption = $validatedData['caption'];
        $journal->category = $validatedData['category'];
        $journal->date = $validatedData['date'];

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($journal->image) {
                Storage::disk('public')->delete($journal->image);
            }
            // Store new image
            $path = $request->file('image')->store('assets', 'public');
            $journal->image = $path;
        }

        $journal->save();

        return redirect()->route('admin.journals.index')
            ->with('success', 'Jurnal berhasil diperbarui');
    }

    public function destroy($id) {
        $journal = Journal::findOrFail($id);

        // Delete associated image if exists
        if ($journal->image) {
            Storage::disk('public')->delete($journal->image);
        }

        $journal->delete();

        return redirect()->route('admin.journals.index')
            ->with('success', 'Jurnal berhasil dihapus');
    }
}