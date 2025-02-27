<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TransaksiController extends Controller
{
    public function buatPesanan(Request $request)
    {
        
        $request->validate([
            'total_harga' => 'required|numeric',
        ]);

        $pemesanans = Pemesanan::where('id_pengguna', Auth::id())->get();

        if ($pemesanans->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'Tidak ada pemesanan ditemukan'], 400);
        }

        do {
            $kodeTransaksi = strtoupper(Str::random(8)); 
        } while (Transaksi::where('kode_transaksi', $kodeTransaksi)->exists()); 

        foreach ($pemesanans as $pemesanan) {
            Transaksi::create([
                'id_pemesanan' => $pemesanan->id_pemesanan,
                'id_pengguna' => Auth::id(),
                'total_harga' => $request->total_harga,
                'status_pembayaran' => 'belum lunas',
                'kode_transaksi' => $kodeTransaksi, 
                'nama_produk' => $pemesanan->nama_produk,
                'jumlah' => $pemesanan->jumlah,
                'harga_produk' => $pemesanan->harga_produk,
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Pesanan berhasil dibuat untuk semua pemesanan!']);
    }

    


}
