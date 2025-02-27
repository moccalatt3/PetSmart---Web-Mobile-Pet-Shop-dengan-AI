<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatService extends Model
{
    use HasFactory;

    protected $table = 'riwayat_services'; 
    protected $primaryKey = 'id_services'; 

    protected $fillable = [
        'nama_pelanggan',
        'nomor_kontak',
        'jenis_hewan',
        'paket_layanan',
        'tanggal_layanan',
        'catatan_tambahan',
        'jenis_layanan',
        'id_pengguna',
        'status_pembayaran',
        'status_layanan',
        'harga_layanan',
        'bukti_pembayaran',
        'kode_layanan',
        'pesan',
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id_pengguna');
    }
}