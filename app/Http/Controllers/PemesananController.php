<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemesananController extends Controller
{
    public function tambahPemesanan(Request $request, $id_produk)
    {
        // Ambil produk berdasarkan ID
        $produk = Produk::findOrFail($id_produk);

        // Cek apakah produk sudah ada di dalam pemesanan pengguna
        $existingPemesanan = Pemesanan::where('id_produk', $id_produk)
            ->where('id_pengguna', Auth::id())
            ->first();

        if ($existingPemesanan) {
            // Jika produk sudah ada, berikan pesan error
            return redirect()->back()->with('error', 'Produk ini sudah ada di keranjang.');
        }

        // Buat pemesanan baru jika belum ada
        $pemesanan = Pemesanan::create([
            'id_produk' => $produk->id_produk,
            'id_pengguna' => Auth::id(), // Ambil ID pengguna yang sedang login
            'jumlah' => $request->input('jumlah', 1), // Ambil jumlah dari request
            'harga_produk' => $produk->harga_produk,
            'nama_produk' => $produk->nama_produk,
            'kode_produk' => $produk->kode_produk,
            'deskripsi_produk' => $produk->deskripsi_produk,
            'kategori_produk' => $produk->kategori_produk,
            'gambar_produk' => $produk->gambar_produk,
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }


    public function updateJumlah(Request $request, $id_pemesanan)
    {
        $pemesanan = Pemesanan::find($id_pemesanan);
        if ($pemesanan) {
            $pemesanan->jumlah = $request->jumlah;
            $pemesanan->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }


    public function hapusProduk($id_pemesanan)
    {
        try {
            // Menggunakan findOrFail dengan primary key yang benar
            $pemesanan = Pemesanan::findOrFail($id_pemesanan);
            $pemesanan->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function hapusPemesanan($id_pemesanan)
    {
        $pemesanan = Pemesanan::where('id_pemesanan', $id_pemesanan)->where('id_pengguna', Auth::id())->first();

        if ($pemesanan) {
            $pemesanan->delete();

            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

}
