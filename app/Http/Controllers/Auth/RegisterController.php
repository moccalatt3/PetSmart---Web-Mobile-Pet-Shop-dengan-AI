<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Pengguna; // Model Pengguna

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // Validasi input pengguna
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pengguna',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Cek apakah ada kesalahan validasi
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) // Kirim pesan kesalahan ke tampilan
                ->withInput();
        }

        // Jika validasi berhasil, simpan data pengguna
        Pengguna::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Kirim alert sukses menggunakan SweetAlert
        return redirect()->back()->with('success', 'Registration successful!');
    }


}
