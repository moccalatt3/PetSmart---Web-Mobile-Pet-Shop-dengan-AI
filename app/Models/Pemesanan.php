<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan'; // Tentukan primary key

    protected $fillable = [
        'id_produk',
        'id_pengguna',
        'jumlah',
        'harga_produk',
        'nama_produk',
        'kode_produk',
        'deskripsi_produk',
        'kategori_produk',
        'gambar_produk',
    ];

    // Definisikan relasi ke model Produk dan Pengguna jika diperlukan
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }
}
