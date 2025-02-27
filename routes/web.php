<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ChatController;


Route::get('/', function () {
    return view('landing');
});


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process'); 


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/produk', [AdminController::class, 'produk'])->name('admin.produk');
    Route::post('/admin/produk/tambah', [AdminController::class, 'tambahProduk'])->name('admin.produk.tambah');
    Route::post('/admin/produk/update', [AdminController::class, 'updateProduk'])->name('admin.produk.update');
    Route::delete('/admin/produk/hapus/{id}', [AdminController::class, 'hapusProduk'])->name('admin.produk.hapus');
    Route::get('/admin/transaksi', [AdminController::class, 'transaksi'])->name('admin.transaksi');
    Route::get('/admin/transaksi/{kode_transaksi}', [AdminController::class, 'showTransaksi']);
    Route::delete('/admin/transaksi/hapus/{kode_transaksi}', [AdminController::class, 'hapusTransaksi'])->name('admin.transaksi.hapus');
    Route::get('/admin/transaksi/{kode_transaksi}', [AdminController::class, 'showPembayaran']);
    Route::get('/admin/layanan', [AdminController::class, 'layanan'])->name('admin.layanan');
    Route::get('/layanan/detail/{kode_layanan}', [AdminController::class, 'showLayananDetail']);
    Route::post('/admin/transaksi/updateStatus', [AdminController::class, 'updateStatusLayanan'])->name('admin.transaksi.updateStatus');
    Route::delete('/admin/layanan/{kode_layanan}', [AdminController::class, 'destroyByKodeLayanan'])->name('admin.layanan.destroy');
    Route::get('/admin/bukti-pembayaran/{kode_layanan}', [AdminController::class, 'getBuktiPembayaran'])->name('admin.bukti.pembayaran');
    Route::post('/admin/transaksi/update-status-transaksi', [AdminController::class, 'updateStatusTransaksi'])->name('admin.transaksi.updateStatusTransaksi');
    Route::post('/admin/transaksi/selesaikan', [AdminController::class, 'selesaikanTransaksi']);
    Route::post('/admin/layanan/selesaikan', [AdminController::class, 'selesaikanLayanan']);
    Route::get('/admin/konsultasi', [AdminController::class, 'konsultasi'])->name('admin.konsultasi');
    Route::get('/admin/konsultasi/{id_pengguna}', [AdminController::class, 'chatDetail'])->name('admin.konsultasi.detail');
    Route::post('/admin/konsultasi/kirim', [AdminController::class, 'sendMessage'])->name('admin.konsultasi.kirim');
    Route::get('/admin/datapengguna', [AdminController::class, 'datapengguna'])->name('admin.datapengguna');
    Route::post('/admin/pengguna/{id}/ubah-password', [AdminController::class, 'ubahPassword'])->name('admin.pengguna.ubahPassword');
    Route::delete('/admin/pengguna/{id}/hapus', [AdminController::class, 'hapusPengguna'])->name('admin.pengguna.hapus');
});


Route::middleware('auth:pengguna')->group(function () {
    Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');
    Route::get('/diagnosis', [HomeController::class, 'diagnosis'])->name('diagnosis');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/diagnosis/rabies', [HomeController::class, 'rabies'])->name('diagnosis.rabies');
    Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
    Route::get('/shop/detail/{id_produk}', [HomeController::class, 'detail'])->name('shop.detail');
    Route::get('/keranjang', [HomeController::class, 'keranjang'])->name('keranjang');
    Route::post('/keranjang/tambah/{id_produk}', [PemesananController::class, 'tambahPemesanan'])->name('keranjang.tambah');
    Route::post('/keranjang/update-jumlah/{id_pemesanan}', [PemesananController::class, 'updateJumlah'])->name('keranjang.updateJumlah');
    Route::post('/keranjang/hapus/{id_pemesanan}', [PemesananController::class, 'hapusProduk'])->name('keranjang.hapus');
    Route::post('/keranjang/hapus/{id_pemesanan}', [PemesananController::class, 'hapusPemesanan'])->name('keranjang.hapus');
    Route::post('/transaksi/buat', [TransaksiController::class, 'buatPesanan'])->name('transaksi.buat');
    Route::get('/struk', [HomeController::class, 'struk'])->name('struk');
    Route::get('/service', [HomeController::class, 'service'])->name('service');
    Route::get('/service/grooming', [HomeController::class, 'groomingService'])->name('service.grooming');
    Route::post('/grooming/booking', [HomeController::class, 'storeGroomingService'])->name('grooming.store');
    Route::get('/layanan/struklayanan', [HomeController::class, 'strukLayanan'])->name('struk.layanan');
    Route::get('/layanan/pelatihan', [HomeController::class, 'pelatihan'])->name('layanan.pelatihan');
    Route::post('/pelatihan/booking', [HomeController::class, 'storePelatihanService'])->name('pelatihan.store');
    Route::post('/transaksi/upload-bukti', [HomeController::class, 'uploadBuktiPembayaranLayanan'])->name('transaksi.uploadBukti');
    Route::post('/transaksi/upload-bukti-transaksi', [HomeController::class, 'uploadBuktiPembayaran'])->name('transaksi.uploadBuktiPembayaran');
    Route::get('/konsultasi', [HomeController::class, 'konsultasi'])->name('konsultasi');
    Route::get('/chat', [HomeController::class, 'chat'])->name('chat');
    Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');
    Route::get('/chat/messages', [ChatController::class, 'getMessages'])->name('chat.messages');
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::put('/profile', [HomeController::class, 'updateProfile'])->name('profile.update');
    Route::delete('/profile/image', [HomeController::class, 'deleteProfileImage'])->name('profile.deleteImage');
    Route::post('/profile/change-password', [HomeController::class, 'changePassword'])->name('profile.changePassword');
    Route::get('/rating', [HomeController::class, 'rating'])->name('rating');
    Route::post('/rating/submit', [HomeController::class, 'submitRating'])->name('rating.submit');
});