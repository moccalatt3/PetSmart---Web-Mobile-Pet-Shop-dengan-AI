<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatTransaksi extends Model
{
    use HasFactory;

    protected $table = 'riwayat_transaksi';

    protected $fillable = [
        'id_pemesanan',
        'id_pengguna',
        'nama_pengguna',
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

    public function pengguna()
    {
        return $this->belongsTo(User::class, 'id_pengguna');
    }

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'id_pemesanan');
    }

    public function produk()
    {
        return $this->hasOne(Produk::class, 'nama_produk', 'nama_produk');
    }
}