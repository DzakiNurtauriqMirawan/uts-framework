<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
{
        // Jika request adalah GET, tampilkan form login
        if ($request->isMethod('get')) {
            return view('login');
        }

        // Validasi input
        $credentials = $request->only('email', 'password');

        // Cek apakah login berhasil
        if (Auth::attempt($credentials, $request->remember)) {
            // Debugging untuk memastikan login berhasil
            // dd('berhasil'); // bisa dihapus setelah pengujian

            // Regenerasi session
            $request->session()->regenerate();

            // Redirect berdasarkan role
            if (Auth::user()->role == 'admin') {
                return redirect()->intended('/admin.admin')->with('success', 'Login berhasil, selamat datang Admin!');
            } elseif (Auth::user()->role == 'user') {
                return redirect()->intended('/welcome')->with('success', 'Login berhasil, selamat datang!');
            }
        }

        // Jika gagal login
        return redirect()->back()->withErrors([
            'email' => 'Email atau password salah, coba lagi.',
        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Anda telah logout.');
    }
}
