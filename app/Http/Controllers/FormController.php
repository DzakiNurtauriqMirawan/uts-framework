<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;

class FormController extends Controller
{
    public function index()
        {
            return view('user.form'); // Pastikan file view form.blade.php ada di folder resources/views
        }
    public function store(Request $request)
    {
        // Validasi form
        $request->validate([
            'email' => 'required|email',
            'nama' => 'required|string',
            'pesan' => 'required|string',
        ]);

        // Simpan data ke database
        Form::create($request->all());

        // Redirect setelah data disimpan
        return redirect()->back()->with('success', 'Pesan Anda Berhasil Tersampaikan');
    }
}
