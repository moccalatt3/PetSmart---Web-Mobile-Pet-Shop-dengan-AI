<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'id_pemesanan',
        'id_pengguna',
        'total_harga',
        'status_pembayaran',
        'kode_transaksi',
        'nama_produk',
        'jumlah',
        'harga_produk',
        'status_produk', 
        'bukti_pembayaran', 
        'pesan', 
    ];

    // Relasi ke tabel Pemesanan
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'id_pemesanan');
    }

    // Relasi ke tabel Pengguna
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }
}
