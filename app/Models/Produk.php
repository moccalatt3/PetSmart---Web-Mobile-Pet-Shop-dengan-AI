<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    // Mengatur nama tabel jika tidak mengikuti konvensi penamaan Laravel
    protected $table = 'produk';

    // Menentukan kolom primary key
    protected $primaryKey = 'id_produk';

    // Menentukan kolom yang dapat diisi
    protected $fillable = [
        'kode_produk',
        'nama_produk',
        'deskripsi_produk',
        'harga_produk',
        'stok_produk',
        'kategori_produk',
        'status_produk',
        'gambar_produk',
        'rating', 
    ];
}