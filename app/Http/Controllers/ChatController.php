<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        // Validasi input
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        // Ambil ID admin yang sesuai
        $adminId = 1; // Sesuaikan dengan logika ID admin

        // Simpan pesan ke database
        $chat = Chat::create([
            'pengguna_id' => Auth::id(),
            'admin_id' => $adminId,
            'nama_pengguna' => Auth::user()->name,
            'message' => $request->message,
            'is_from_admin' => false,
        ]);

        // Kembalikan respons JSON
        return response()->json([
            'success' => true,
            'message' => $chat->message,
            'time' => $chat->created_at->format('h:i A'),
        ]);
    }

    public function getMessages()
    {
        // Ambil ID pengguna yang sedang login
        $userId = Auth::id();

        // Ambil semua pesan yang terkait dengan pengguna yang sedang login
        $chats = Chat::where('pengguna_id', $userId)
                    ->orWhere('admin_id', null) // Jika Anda ingin mengambil chat dari admin
                    ->orderBy('created_at', 'asc')
                    ->get();

        // Kembalikan data chat sebagai JSON
        return response()->json($chats);
    }


}