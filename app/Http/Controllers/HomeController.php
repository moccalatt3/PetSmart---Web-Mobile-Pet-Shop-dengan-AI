<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Produk; 
use App\Models\Pemesanan; 
use App\Models\RiwayatTransaksi; 
use App\Models\Transaksi;
use App\Models\Chat;
use App\Models\Pengguna;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    // Halaman Beranda
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu untuk mengakses halaman ini.');
        }

        // Hitung jumlah pemesanan
        $jumlah_pemesanan = Pemesanan::where('id_pengguna', Auth::id())->count();

        // Hitung jumlah riwayat transaksi
        $jumlah_riwayat_transaksi = RiwayatTransaksi::where('id_pengguna', Auth::id())->count();

        // Count all chats from admin for the authenticated user
        $jumlah_chat_masuk = Chat::where('pengguna_id', Auth::id())
            ->where('is_from_admin', true) // Assuming this indicates the chat is from admin
            ->count();

        // Ambil 4 produk dengan rating tertinggi
        $produk_terlaris = Produk::orderBy('rating', 'desc')->take(4)->get();

        return view('beranda', compact('jumlah_pemesanan', 'jumlah_riwayat_transaksi', 'jumlah_chat_masuk', 'produk_terlaris'));
    }

    // Halaman Diagnosis
    public function diagnosis()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu untuk mengakses halaman ini.');
        }

        // Hitung jumlah pemesanan
        $jumlah_pemesanan = Pemesanan::where('id_pengguna', Auth::id())->count();

        // Hitung jumlah riwayat transaksi
        $jumlah_riwayat_transaksi = RiwayatTransaksi::where('id_pengguna', Auth::id())->count();

        // Hitung jumlah chat masuk
        $jumlah_chat_masuk = Chat::where('pengguna_id', Auth::id())
            ->where('is_from_admin', true)
            ->count();

        return view('diagnosis', compact('jumlah_pemesanan', 'jumlah_riwayat_transaksi', 'jumlah_chat_masuk'));
    }

    // Halaman Shop
    public function shop(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu untuk mengakses halaman ini.');
        }

        // Initialize the query
        $query = Produk::query();

        // Check if there is a sorting option selected
        if ($request->has('sortBy')) {
            switch ($request->sortBy) {
                case 'priceLowToHigh':
                    $query->orderBy('harga_produk', 'asc');
                    break;
                case 'priceHighToLow':
                    $query->orderBy('harga_produk', 'desc');
                    break;
                case 'rated':
                    $query->orderBy('rating', 'desc');
                    break;
                default:
                    break;
            }
        }

        // Check if there is a category selected
        if ($request->has('kategori_produk') && $request->kategori_produk != 'all') {
            $query->where('kategori_produk', $request->kategori_produk);
        }

        // Ambil kategori unik dari produk
        $kategori_produk = Produk::select('kategori_produk')->distinct()->get();

        // Paginate the results
        $produks = $query->paginate(8);

        if ($request->ajax()) {
            return view('partials.product-grid', compact('produks'))->render();
        }

        // Hitung jumlah pemesanan
        $jumlah_pemesanan = Pemesanan::where('id_pengguna', Auth::id())->count();

        // Hitung jumlah riwayat transaksi
        $jumlah_riwayat_transaksi = RiwayatTransaksi::where('id_pengguna', Auth::id())->count();

        // Hitung jumlah chat masuk
        $jumlah_chat_masuk = Chat::where('pengguna_id', Auth::id())
            ->where('is_from_admin', true)
            ->count();

        return view('shop', compact('produks', 'jumlah_pemesanan', 'jumlah_riwayat_transaksi', 'jumlah_chat_masuk', 'kategori_produk'));
    }

    // Halaman Detail
    public function detail($id_produk)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu untuk mengakses halaman ini.');
        }

        // Find the product by its ID
        $produk = Produk::findOrFail($id_produk);

        // Hitung jumlah pemesanan
        $jumlah_pemesanan = Pemesanan::where('id_pengguna', Auth::id())->count();

        // Hitung jumlah riwayat transaksi
        $jumlah_riwayat_transaksi = RiwayatTransaksi::where('id_pengguna', Auth::id())->count();

        // Hitung jumlah chat masuk
        $jumlah_chat_masuk = Chat::where('pengguna_id', Auth::id())
            ->where('is_from_admin', true)
            ->count();

        // Pass the product data to the detail view
        return view('detail', compact('produk', 'jumlah_pemesanan', 'jumlah_riwayat_transaksi', 'jumlah_chat_masuk'));
    }

    // Halaman Keranjang
    public function keranjang()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu untuk mengakses halaman ini.');
        }

        // Mengambil pemesanan yang dilakukan oleh pengguna yang sedang login
        $pemesanans = Pemesanan::where('id_pengguna', Auth::id())->get();

        // Hitung jumlah pemesanan
        $jumlah_pemesanan = Pemesanan::where('id_pengguna', Auth::id())->count();

        // Hitung jumlah riwayat transaksi
        $jumlah_riwayat_transaksi = RiwayatTransaksi::where('id_pengguna', Auth::id())->count();

        // Hitung jumlah chat masuk
        $jumlah_chat_masuk = Chat::where('pengguna_id', Auth::id())
            ->where('is_from_admin', true)
            ->count();

        return view('keranjang', compact('pemesanans', 'jumlah_pemesanan', 'jumlah_riwayat_transaksi', 'jumlah_chat_masuk'));
    }

    public function struk()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu untuk mengakses halaman ini.');
        }

        // Ambil pengguna yang sedang login
        $pengguna = Auth::user();

        // Mengambil semua transaksi oleh pengguna untuk referensi lebih lanjut
        $transaksis = Transaksi::where('id_pengguna', $pengguna->id_pengguna)->get();

        // Ambil transaksi terbaru oleh pengguna yang sedang login, termasuk `status_produk` dan `pesan`
        $transaksi = Transaksi::where('id_pengguna', $pengguna->id_pengguna)->latest()->first();

        // Hitung jumlah pemesanan
        $jumlah_pemesanan = Pemesanan::where('id_pengguna', Auth::id())->count();

        // Hitung jumlah riwayat transaksi
        $jumlah_riwayat_transaksi = RiwayatTransaksi::where('id_pengguna', Auth::id())->count();

        // Hitung jumlah chat masuk
        $jumlah_chat_masuk = Chat::where('pengguna_id', Auth::id())
            ->where('is_from_admin', true)
            ->count();

        // Memastikan transaksi terbaru memiliki `status_produk` dan `pesan`
        $status_produk = $transaksi->status_produk ?? '-';
        $pesan = $transaksi->pesan ?? '-';

        return view('struk', compact('pengguna', 'transaksis', 'transaksi', 'jumlah_pemesanan', 'jumlah_riwayat_transaksi', 'jumlah_chat_masuk', 'status_produk', 'pesan'));
    }
    

    public function uploadBuktiPembayaran(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode_transaksi' => 'required|exists:transaksi,kode_transaksi',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan file bukti pembayaran ke folder 'bukti_pembayaran'
        $file = $request->file('bukti_pembayaran');
        $path = $file->store('bukti_pembayaran', 'public');

        // Cari transaksi dengan kode_transaksi yang sama
        $transaksis = Transaksi::where('kode_transaksi', $request->kode_transaksi)->get();

        if ($transaksis->isNotEmpty()) {
            foreach ($transaksis as $transaksi) {
                // Update kolom bukti_pembayaran untuk setiap transaksi yang cocok
                $transaksi->bukti_pembayaran = $path;
                $transaksi->save();
            }

            return redirect()->route('struk')->with('success', 'Bukti pembayaran berhasil diunggah ke semua transaksi dengan kode yang sama.');
        }

        return redirect()->route('struk')->with('error', 'Transaksi tidak ditemukan.');
    }

    public function service()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu untuk mengakses halaman ini.');
        }

        // Hitung jumlah pemesanan
        $jumlah_pemesanan = Pemesanan::where('id_pengguna', Auth::id())->count();

        // Hitung jumlah riwayat transaksi
        $jumlah_riwayat_transaksi = RiwayatTransaksi::where('id_pengguna', Auth::id())->count();

        // Hitung jumlah chat masuk
        $jumlah_chat_masuk = Chat::where('pengguna_id', Auth::id())
            ->where('is_from_admin', true)
            ->count();

        return view('service', compact('jumlah_pemesanan', 'jumlah_riwayat_transaksi', 'jumlah_chat_masuk'));
    }

    public function groomingService()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu untuk mengakses halaman ini.');
        }

        // Hitung jumlah pemesanan
        $jumlah_pemesanan = Pemesanan::where('id_pengguna', Auth::id())->count();

        // Hitung jumlah riwayat transaksi
        $jumlah_riwayat_transaksi = RiwayatTransaksi::where('id_pengguna', Auth::id())->count();

        // Hitung jumlah chat masuk
        $jumlah_chat_masuk = Chat::where('pengguna_id', Auth::id())
            ->where('is_from_admin', true)
            ->count();

        return view('layanan.grooming', compact('jumlah_pemesanan', 'jumlah_riwayat_transaksi', 'jumlah_chat_masuk'));
    }


    public function storeGroomingService(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu untuk mengakses halaman ini.');
        }

        $pengguna = Auth::user();

        $harga_layanan = 0;
        switch ($request->paket_grooming) {
            case 'Bulu Kinclong':
                $harga_layanan = 150000;
                break;
            case 'Si Bersih Sehat':
                $harga_layanan = 250000;
                break;
            case 'Ganteng Maksimal':
                $harga_layanan = 350000;
                break;
            case 'Spa Mewah':
                $harga_layanan = 450000;
                break;
        }

        // Membuat kode layanan unik berdasarkan ID pengguna
        $kode_layanan = strtoupper('GROOM-' . $pengguna->id_pengguna);

        // Simpan data layanan grooming ke tabel services
        $service = new Service();
        $service->nama_pelanggan = $pengguna->name;
        $service->nomor_kontak = $request->kontak;
        $service->jenis_hewan = $request->jenis_hewan;
        $service->paket_layanan = $request->paket_grooming;
        $service->tanggal_layanan = $request->tanggal_layanan;
        $service->catatan_tambahan = $request->catatan;
        $service->jenis_layanan = 'Grooming'; 
        $service->id_pengguna = $pengguna->id_pengguna;
        $service->harga_layanan = $harga_layanan;
        $service->status_pembayaran = 'Belum Dibayar'; 
        $service->status_layanan = 'Menunggu';
        $service->kode_layanan = $kode_layanan; 
        $service->save();

        return redirect()->route('service.grooming')->with('success', 'Pemesanan grooming berhasil.');
    }

    public function strukLayanan()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu untuk mengakses halaman ini.');
        }

        // Ambil pengguna yang sedang login
        $pengguna = Auth::user();

        // Ambil semua layanan yang terkait dengan pengguna yang sedang login
        $services = Service::where('id_pengguna', $pengguna->id_pengguna)->get();

        // Hitung jumlah pemesanan
        $jumlah_pemesanan = Pemesanan::where('id_pengguna', Auth::id())->count();

        // Hitung jumlah riwayat transaksi
        $jumlah_riwayat_transaksi = RiwayatTransaksi::where('id_pengguna', Auth::id())->count();

        // Hitung jumlah chat masuk
        $jumlah_chat_masuk = Chat::where('pengguna_id', Auth::id())
            ->where('is_from_admin', true)
            ->count();

        return view('layanan.struklayanan', compact('pengguna', 'services', 'jumlah_pemesanan', 'jumlah_riwayat_transaksi', 'jumlah_chat_masuk'));
    }

    public function pelatihan()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu untuk mengakses halaman ini.');
        }

        // Hitung jumlah pemesanan
        $jumlah_pemesanan = Pemesanan::where('id_pengguna', Auth::id())->count();

        // Hitung jumlah riwayat transaksi
        $jumlah_riwayat_transaksi = RiwayatTransaksi::where('id_pengguna', Auth::id())->count();

        // Hitung jumlah chat masuk
        $jumlah_chat_masuk = Chat::where('pengguna_id', Auth::id())
            ->where('is_from_admin', true)
            ->count();

        return view('layanan.pelatihan', compact('jumlah_pemesanan', 'jumlah_riwayat_transaksi', 'jumlah_chat_masuk'));
    }

    public function storePelatihanService(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu untuk mengakses halaman ini.');
        }

        $pengguna = Auth::user();

        $harga_layanan = 0;
        switch ($request->paket_pelatihan) {
            case 'Puppy Ceria':
                $harga_layanan = 500000;
                break;
            case 'Si Pintar Profesional':
                $harga_layanan = 800000;
                break;
            case 'Raja Gaul Anjing':
                $harga_layanan = 600000;
                break;
            case 'Bye-bye Bad Habits':
                $harga_layanan = 900000;
                break;
        }

        // Membuat kode layanan unik berdasarkan ID pengguna
        $kode_layanan = strtoupper('GROOM-' . $pengguna->id_pengguna);

        // Simpan data layanan pelatihan ke tabel services
        $service = new Service();
        $service->nama_pelanggan = $pengguna->name;
        $service->nomor_kontak = $request->kontak;
        $service->jenis_hewan = $request->jenis_hewan;
        $service->paket_layanan = $request->paket_pelatihan;
        $service->tanggal_layanan = $request->tanggal_layanan;
        $service->catatan_tambahan = $request->catatan;
        $service->jenis_layanan = 'Pelatihan'; 
        $service->id_pengguna = $pengguna->id_pengguna;
        $service->harga_layanan = $harga_layanan;
        $service->status_pembayaran = 'Belum Dibayar'; 
        $service->status_layanan = 'Menunggu';
        $service->kode_layanan = $kode_layanan; 
        $service->save();

        return redirect()->route('layanan.pelatihan')->with('success', 'Pemesanan pelatihan berhasil.');
    }

    public function uploadBuktiPembayaranLayanan(Request $request)
    {
        // Validate input
        $request->validate([
            'kode_layanan' => 'required|exists:services,kode_layanan',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Store the payment proof file
        $file = $request->file('bukti_pembayaran');
        $path = $file->store('bukti_pembayaran', 'public');

        // Find all services with the same kode_layanan
        $services = Service::where('kode_layanan', $request->kode_layanan)->get();

        if ($services->isNotEmpty()) {
            foreach ($services as $service) {
                // Update the payment proof for each matching service
                $service->bukti_pembayaran = $path;
                $service->status_pembayaran = 'Lunas'; 
                $service->save();
            }

            return redirect()->route('struk.layanan')->with('success', 'Bukti pembayaran berhasil diunggah untuk semua layanan.');
        }

        return redirect()->route('struk.layanan')->with('error', 'Layanan tidak ditemukan.');
    }

    public function konsultasi()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu untuk mengakses halaman ini.');
        }

        // Hitung jumlah pemesanan
        $jumlah_pemesanan = Pemesanan::where('id_pengguna', Auth::id())->count();

        // Hitung jumlah riwayat transaksi
        $jumlah_riwayat_transaksi = RiwayatTransaksi::where('id_pengguna', Auth::id())->count();

        // Hitung jumlah chat masuk
        $jumlah_chat_masuk = Chat::where('pengguna_id', Auth::id())
            ->where('is_from_admin', true)
            ->count();

        return view('konsultasi', compact('jumlah_pemesanan', 'jumlah_riwayat_transaksi', 'jumlah_chat_masuk'));
    }

    public function chat()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu untuk mengakses halaman ini.');
        }

        $userId = Auth::id();
        $jumlah_pemesanan = Pemesanan::where('id_pengguna', Auth::id())->count();

        // Ambil semua chat yang relevan untuk pengguna ini
        $chats = Chat::where('pengguna_id', $userId)
                    ->orWhere('admin_id', null) // Jika Anda ingin mengambil chat dari admin
                    ->orderBy('created_at', 'asc')
                    ->get();

        // Hitung jumlah riwayat transaksi
        $jumlah_riwayat_transaksi = RiwayatTransaksi::where('id_pengguna', Auth::id())->count();

        // Hitung jumlah chat masuk
        $jumlah_chat_masuk = Chat::where('pengguna_id', Auth::id())
            ->where('is_from_admin', true)
            ->count();

        return view('chat', compact('chats', 'jumlah_pemesanan', 'jumlah_riwayat_transaksi', 'jumlah_chat_masuk'));
    }

    public function profile()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu untuk mengakses halaman ini.');
        }

        // Mengambil data pengguna yang sedang login
        $pengguna = Auth::user();

        // Menghitung jumlah pesanan untuk pengguna yang sedang login
        $jumlah_pemesanan = Pemesanan::where('id_pengguna', Auth::id())->count();

        // Hitung jumlah riwayat transaksi
        $jumlah_riwayat_transaksi = RiwayatTransaksi::where('id_pengguna', Auth::id())->count();

        // Hitung jumlah chat masuk
        $jumlah_chat_masuk = Chat::where('pengguna_id', Auth::id())
            ->where('is_from_admin', true)
            ->count();

        return view('profile', compact('pengguna', 'jumlah_pemesanan', 'jumlah_riwayat_transaksi', 'jumlah_chat_masuk'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'nullable|string|max:15',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
        ]);

        $pengguna = Auth::user();
        $pengguna->name = $request->name;
        $pengguna->email = $request->email;
        $pengguna->telepon = $request->telepon;

        // Jika ada gambar yang diupload
        if ($request->hasFile('profile_image')) {
            // Hapus gambar lama jika ada
            if ($pengguna->image_profil) {
                Storage::delete($pengguna->image_profil);
            }

            // Simpan gambar baru
            $path = $request->file('profile_image')->store('profile_images', 'public');
            $pengguna->image_profil = $path;
        }
        
        $pengguna->save(); 

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui.');
    }

    public function deleteProfileImage(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:pengguna,id_pengguna',
        ]);

        $pengguna = Pengguna::find($request->id);

        // Hapus gambar profil jika ada
        if ($pengguna->image_profil) {
            Storage::delete($pengguna->image_profil);
            $pengguna->image_profil = null; // Set kolom image_profil menjadi null
            $pengguna->save();
        }

        return response()->json(['success' => true, 'message' => 'Gambar profil berhasil dihapus.']);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Check if the current password is correct
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Password sebelumnya salah.');
        }

        // Update the password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Password berhasil diubah.');
    }

    public function rating()
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu untuk mengakses halaman ini.');
        }

        // Ambil data riwayat transaksi untuk pengguna yang terautentikasi dengan eager loading produk
        $riwayatTransaksi = RiwayatTransaksi::with('produk')->where('id_pengguna', Auth::id())->get();

        // Hitung jumlah pemesanan
        $jumlah_pemesanan = $riwayatTransaksi->count();

        // Hitung jumlah riwayat transaksi
        $jumlah_riwayat_transaksi = RiwayatTransaksi::where('id_pengguna', Auth::id())->count();

        // Hitung jumlah chat masuk
        $jumlah_chat_masuk = Chat::where('pengguna_id', Auth::id())
            ->where('is_from_admin', true)
            ->count();

        // Return the rating view with the order count and transaction history
        return view('rating', compact('jumlah_pemesanan', 'jumlah_riwayat_transaksi', 'jumlah_chat_masuk', 'riwayatTransaksi'));
    }

    public function submitRating(Request $request)
    {
        // Validasi input
        $request->validate([
            'product_id' => 'required|integer|exists:produk,id_produk',
            'rating' => 'required|numeric|min:0|max:5',
        ]);

        // Temukan produk berdasarkan ID
        $produk = Produk::find($request->product_id);

        // Simpan rating
        $produk->rating = $request->rating;
        $produk->save();

        return response()->json(['success' => true]);
    }

    public function rabies()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu untuk mengakses halaman ini.');
        }

        // Hitung jumlah pemesanan
        $jumlah_pemesanan = Pemesanan::where('id_pengguna', Auth::id())->count();

        // Hitung jumlah riwayat transaksi
        $jumlah_riwayat_transaksi = RiwayatTransaksi::where('id_pengguna', Auth::id())->count();

        // Hitung jumlah chat masuk dari admin untuk pengguna yang sedang login
        $jumlah_chat_masuk = Chat::where('pengguna_id', Auth::id())
            ->where('is_from_admin', true) // Misalnya ini untuk menunjukkan bahwa chat berasal dari admin
            ->count();

        // Ambil 4 produk dengan rating tertinggi
        $produk_terlaris = Produk::orderBy('rating', 'desc')->take(4)->get();

        // Tampilkan halaman diagnosis rabies
        return view('diagnosis.rabies', compact('jumlah_pemesanan', 'jumlah_riwayat_transaksi', 'jumlah_chat_masuk', 'produk_terlaris'));
    }

}




