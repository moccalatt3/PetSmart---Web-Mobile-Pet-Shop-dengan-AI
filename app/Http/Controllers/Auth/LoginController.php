<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Cek login sebagai admin terlebih dahulu
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard')->with('success', 'Login berhasil! Selamat datang, Admin.');
        }

        // Jika gagal, cek login sebagai pengguna
        if (Auth::guard('pengguna')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/beranda')->with('success', 'Login berhasil! Selamat datang.');
        }

        // Jika login gagal
        return back()->withErrors([
            'email' => 'Email atau password tidak sesuai.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::guard('pengguna')->logout(); // Logout dari guard pengguna
        $request->session()->invalidate(); // Hapus semua data sesi
        $request->session()->regenerateToken(); // Regenerasi token sesi
    
        return redirect('/login')->with('success', 'Anda telah berhasil logout.'); // Redirect ke halaman login
    }
}