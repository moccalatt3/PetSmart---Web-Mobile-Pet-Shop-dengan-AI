<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use App\Models\Produk;
use App\Models\RiwayatService;
use App\Models\RiwayatTransaksi;
use App\Models\Service;
use App\Models\Chat;
use App\Models\Transaksi;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = Pengguna::count(); // Menghitung jumlah pengguna
        $jumlahTransaksi = Transaksi::distinct('kode_transaksi')->count('kode_transaksi'); // Menghitung transaksi unik berdasarkan kode_transaksi
        $jumlahLayanan = Service::distinct('kode_layanan')->count('kode_layanan');

        // Mengambil produk terlaris
        $topSellingProducts = RiwayatTransaksi::select('nama_produk', DB::raw('SUM(jumlah) as total_terjual'))
            ->groupBy('nama_produk')
            ->orderBy('total_terjual', 'desc')
            ->take(5) // Ambil 5 produk terlaris
            ->get();

        // Mengambil data produk untuk gambar dan stok
        foreach ($topSellingProducts as $product) {
            $produkDetail = Produk::where('nama_produk', $product->nama_produk)->first();
            $product->harga_produk = $produkDetail->harga_produk ?? 0; // Ambil harga produk
            $product->stok_produk = $produkDetail->stok_produk ?? 0; // Ambil stok produk
            $product->gambar_produk = $produkDetail->gambar_produk ?? ''; // Ambil gambar produk
        }

        // Mengambil notifikasi dari transaksi
        $transaksiNotifikasi = Transaksi::with('pengguna')
            ->select('id_transaksi', 'id_pengguna', 'kode_transaksi', 'nama_produk', 'jumlah')
            ->orderBy('created_at', 'desc')
            ->take(5) // Ambil 5 notifikasi terbaru
            ->get();

        // Mengambil notifikasi dari layanan
        $layananNotifikasi = Service::with('pengguna')
            ->select('id_services', 'id_pengguna', 'kode_layanan', 'jenis_layanan', 'tanggal_layanan')
            ->orderBy('created_at', 'desc')
            ->take(5) // Ambil 5 notifikasi terbaru
            ->get();

        // Menggabungkan notifikasi
        $notifikasi = $transaksiNotifikasi->map(function ($item) {
            return [
                'nama_pengguna' => $item->pengguna->name ?? 'Unknown',
                'jenis_notifikasi' => 'Transaksi',
                'kode' => $item->kode_transaksi,
                'nama_produk' => $item->nama_produk,
                'jumlah' => $item->jumlah,
            ];
        })->merge($layananNotifikasi->map(function ($item) {
            return [
                'nama_pengguna' => $item->pengguna->name ?? 'Unknown',
                'jenis_notifikasi' => 'Layanan',
                'kode' => $item->kode_layanan,
                'nama_produk' => $item->jenis_layanan,
                'jumlah' => 1, // Anda bisa menyesuaikan ini sesuai kebutuhan
            ];
        }));

        // Mengambil notifikasi chat terbaru dari setiap pengguna
        $chatNotifikasi = Chat::with('pengguna')
            ->select('pengguna_id', 'message', 'created_at')
            ->whereIn('pengguna_id', Pengguna::pluck('id_pengguna')) // Ambil chat dari pengguna yang ada
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('pengguna_id') // Kelompokkan berdasarkan pengguna
            ->map(function ($group) {
                return [
                    'nama_pengguna' => $group->first()->pengguna->name ?? 'Unknown',
                    'isi_chat' => $group->first()->message,
                    'waktu_chat' => $group->first()->created_at->diffForHumans(), // Format waktu chat
                ];
            });

        return view('admin.dashboard', compact('totalUsers', 'jumlahTransaksi', 'jumlahLayanan', 'topSellingProducts', 'notifikasi', 'chatNotifikasi'));
    }

    public function produk()
    {
        $produk = Produk::all();
        return view('admin.produk', compact('produk'));
    }

    public function tambahProduk(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|max:255',
            'deskripsi_produk' => 'required',
            'harga_produk' => 'required|numeric',
            'stok_produk' => 'required|integer',
            'kategori_produk' => 'required|max:100',
            'status_produk' => 'required|in:Tersedia,Tidak Tersedia',
            'gambar_produk' => 'nullable|image|max:2048',
        ]);

        // Generate kode produk acak
        $kode_produk = strtoupper(Str::random(8));

        // Simpan produk
        $produk = new Produk;
        $produk->kode_produk = $kode_produk;
        $produk->nama_produk = $request->nama_produk;
        $produk->deskripsi_produk = $request->deskripsi_produk;
        $produk->harga_produk = $request->harga_produk;
        $produk->stok_produk = $request->stok_produk;
        $produk->kategori_produk = $request->kategori_produk;
        $produk->status_produk = $request->status_produk;

        // Handle upload gambar produk
        if ($request->hasFile('gambar_produk')) {
            $gambarPath = $request->file('gambar_produk')->store('produk', 'public');
            $produk->gambar_produk = $gambarPath;
        }

        $produk->save();

        return redirect()->route('admin.produk')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function updateProduk(Request $request)
    {
        $request->validate([
            'id_produk' => 'required|exists:produk,id_produk',
            'nama_produk' => 'required|max:255',
            'deskripsi_produk' => 'required',
            'harga_produk' => 'required|numeric',
            'stok_produk' => 'required|integer',
            'kategori_produk' => 'required|max:100',
            'status_produk' => 'required|in:Tersedia,Tidak Tersedia',
            'gambar_produk' => 'nullable|image|max:2048',
        ]);

        try {
            $produk = Produk::find($request->id_produk);
            $produk->nama_produk = $request->nama_produk;
            $produk->deskripsi_produk = $request->deskripsi_produk;
            $produk->harga_produk = $request->harga_produk;
            $produk->stok_produk = $request->stok_produk;
            $produk->kategori_produk = $request->kategori_produk;
            $produk->status_produk = $request->status_produk;

            // Handle upload gambar produk
            if ($request->hasFile('gambar_produk')) {
                // Hapus gambar lama jika ada
                if ($produk->gambar_produk) {
                    Storage::disk('public')->delete($produk->gambar_produk);
                }

                // Simpan gambar baru
                $gambarPath = $request->file('gambar_produk')->store('produk', 'public');
                $produk->gambar_produk = $gambarPath;
            }

            $produk->save();

            return redirect()->route('admin.produk')->with('success', 'Produk berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('admin.produk')->with('error', 'Terjadi kesalahan saat memperbarui produk!');
        }
    }

    public function hapusProduk($id)
    {
        $produk = Produk::find($id);

        if ($produk) {
            $produk->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

    public function transaksi()
    {
        // Ambil data transaksi
        $transaksi = Transaksi::select('kode_transaksi', 'total_harga', 'status_pembayaran', 'bukti_pembayaran')
            ->addSelect(DB::raw('(SELECT status_produk FROM transaksi AS t WHERE t.kode_transaksi = transaksi.kode_transaksi ORDER BY t.created_at DESC LIMIT 1) as status_produk'))
            ->groupBy('kode_transaksi', 'total_harga', 'status_pembayaran', 'bukti_pembayaran')
            ->get();

        // Ambil data riwayat transaksi
        $riwayatTransaksi = RiwayatTransaksi::all();

        // Kirim data transaksi dan riwayat transaksi ke view
        return view('admin.transaksi', compact('transaksi', 'riwayatTransaksi'));
    }

    public function showTransaksi($kode_transaksi)
    {
        // Mengambil semua transaksi yang memiliki kode_transaksi yang sama
        $transaksi = Transaksi::where('kode_transaksi', $kode_transaksi)->get();

        // Mengembalikan data transaksi dalam bentuk JSON
        return response()->json($transaksi);
    }

    
    public function hapusTransaksi($kode_transaksi)
    {
        try {
            // Start a transaction to ensure atomicity
            DB::beginTransaction();

            // Find all transactions with the same kode_transaksi and delete them
            $deletedRows = Transaksi::where('kode_transaksi', $kode_transaksi)->delete();

            if ($deletedRows > 0) {
                DB::commit(); // Commit the transaction if deletions succeed
                return response()->json(['success' => true]);
            }

            DB::rollBack(); // Rollback if no transactions were found with the kode_transaksi
            return response()->json(['success' => false, 'message' => 'Data transaksi tidak ditemukan.'], 404);

        } catch (\Exception $e) {
            DB::rollBack(); // Rollback in case of an error
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan saat menghapus data.'], 500);
        }
    }

    public function showPembayaran($kode_transaksi)
    {
        // Mengambil semua transaksi yang memiliki kode_transaksi yang sama
        $transaksi = Transaksi::where('kode_transaksi', $kode_transaksi)->get();

        // Mengembalikan data transaksi dalam bentuk JSON
        return response()->json($transaksi);
    }

    public function layanan()
    {
        // Ambil data layanan dari tabel services, mengelompokkan berdasarkan kode_layanan
        $services = Service::select('kode_layanan', 
                                    DB::raw('MIN(jenis_layanan) as jenis_layanan'), 
                                    DB::raw('MIN(paket_layanan) as paket_layanan'), 
                                    DB::raw('MIN(harga_layanan) as harga_layanan'), 
                                    DB::raw('MIN(status_pembayaran) as status_pembayaran'), 
                                    DB::raw('MIN(status_layanan) as status_layanan'))
            ->groupBy('kode_layanan')
            ->get();

        // Ambil data dari tabel riwayat_services
        $riwayatLayanan = RiwayatService::select('kode_layanan', 'nama_pelanggan', 'jenis_hewan', 'jenis_layanan', 'harga_layanan', 'tanggal_layanan')
            ->get();

        return view('admin.layanan', compact('services', 'riwayatLayanan')); 
    }

    public function showLayananDetail($kode_layanan)
    {
        // Mengambil semua layanan yang memiliki kode_layanan yang sama
        $layanan = Service::where('kode_layanan', $kode_layanan)->get();

        // Mengembalikan data layanan dalam bentuk JSON
        return response()->json($layanan);
    }

    public function updateStatusLayanan(Request $request)
    {
        $request->validate([
            'kode_layanan' => 'required|exists:services,kode_layanan',
            'status_pembayaran' => 'required|in:belum lunas,lunas',
            'status_layanan' => 'required|in:ditolak,diproses,sudah siap',
            'pesan' => 'nullable|string|max:255'
        ]);

        try {
            // Update status pembayaran dan status layanan berdasarkan kode layanan
            Service::where('kode_layanan', $request->kode_layanan)->update([
                'status_pembayaran' => $request->status_pembayaran,
                'status_layanan' => $request->status_layanan,
                'pesan' => $request->pesan
            ]);

            return response()->json(['success' => true, 'message' => 'Status berhasil diperbarui!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan saat memperbarui status.'], 500);
        }
    }

    public function destroyByKodeLayanan($kode_layanan)
    {
        // Pastikan pengguna sudah login
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Hapus semua data dengan kode_layanan yang sama
        $deletedRows = Service::where('kode_layanan', $kode_layanan)->delete();

        if ($deletedRows > 0) {
            return response()->json(['success' => 'Data layanan berhasil dihapus.']);
        } else {
            return response()->json(['error' => 'Data layanan tidak ditemukan.'], 404);
        }
    }

    public function getBuktiPembayaran($kode_layanan)
    {
        // Ambil layanan berdasarkan kode_layanan
        $service = Service::where('kode_layanan', $kode_layanan)->first();

        if ($service) {
            return response()->json([
                'success' => true,
                'bukti_pembayaran' => asset('storage/' . $service->bukti_pembayaran),
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Layanan tidak ditemukan.']);
    }

    public function updateStatusTransaksi(Request $request)
    {
        $request->validate([
            'kode_transaksi' => 'required|string',
            'status_pembayaran' => 'required|in:lunas,belum lunas',
            'status_layanan' => 'required|in:diproses,ditolak,sudah siap',
            'pesan' => 'nullable|string|max:255'
        ]);

        try {
            // Update status pembayaran dan status produk berdasarkan kode transaksi
            Transaksi::where('kode_transaksi', $request->kode_transaksi)->update([
                'status_pembayaran' => $request->status_pembayaran,
                'status_produk' => $request->status_layanan,
                'pesan' => $request->pesan
            ]);

            // Redirect ke halaman transaksi setelah berhasil
            return redirect()->route('admin.transaksi')->with('success', 'Status transaksi berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('admin.transaksi')->with('error', 'Terjadi kesalahan saat memperbarui status transaksi.');
        }
    }

    public function selesaikanTransaksi(Request $request)
    {
        try {
            // Mulai transaksi untuk memastikan atomicity
            DB::beginTransaction();

            // Ambil semua transaksi
            $transaksis = Transaksi::all();

            // Kumpulkan kode transaksi yang sudah dipindahkan
            $kodeTransaksiDipindahkan = [];

            foreach ($transaksis as $transaksi) {
                // Jika kode transaksi belum dipindahkan
                if (!in_array($transaksi->kode_transaksi, $kodeTransaksiDipindahkan)) {
                    // Ambil semua transaksi dengan kode transaksi yang sama
                    $transaksiSama = Transaksi::where('kode_transaksi', $transaksi->kode_transaksi)->get();

                    foreach ($transaksiSama as $transaksiItem) {
                        // Simpan ke tabel riwayat_transaksi
                        RiwayatTransaksi::create([
                            'id_pemesanan' => $transaksiItem->id_pemesanan,
                            'id_pengguna' => $transaksiItem->id_pengguna,
                            'nama_pengguna' => $transaksiItem->pengguna->name, // Ambil nama pengguna
                            'total_harga' => $transaksiItem->total_harga,
                            'status_pembayaran' => $transaksiItem->status_pembayaran,
                            'kode_transaksi' => $transaksiItem->kode_transaksi,
                            'nama_produk' => $transaksiItem->nama_produk,
                            'jumlah' => $transaksiItem->jumlah,
                            'harga_produk' => $transaksiItem->harga_produk,
                            'status_produk' => $transaksiItem->status_produk,
                            'bukti_pembayaran' => $transaksiItem->bukti_pembayaran,
                            'pesan' => $transaksiItem->pesan,
                        ]);

                        // Mengurangi stok produk
                        $produk = Produk::where('nama_produk', $transaksiItem->nama_produk)->first();
                        if ($produk) {
                            $produk->stok_produk -= $transaksiItem->jumlah; // Kurangi stok
                            $produk->save(); // Simpan perubahan stok
                        }
                    }

                    // Tambahkan kode transaksi ke array
                    $kodeTransaksiDipindahkan[] = $transaksi->kode_transaksi;
                }
            }

            // Hapus semua transaksi yang sudah dipindahkan
            Transaksi::whereIn('kode_transaksi', $kodeTransaksiDipindahkan)->delete();

            DB::commit(); // Commit jika semua berhasil
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback jika ada kesalahan
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan saat memindahkan data: ' . $e->getMessage()]);
        }
    }

    public function selesaikanLayanan(Request $request)
    {
        $request->validate([
            'kode_layanan' => 'required|string|exists:services,kode_layanan',
        ]);

        DB::beginTransaction();
        try {
            // Get all services with the same kode_layanan
            $services = Service::where('kode_layanan', $request->kode_layanan)->get();

            if ($services->isNotEmpty()) {
                foreach ($services as $service) {
                    RiwayatService::create($service->toArray());
                    $service->delete();
                }

                DB::commit();
                return response()->json(['success' => true]);
            }

            return response()->json(['success' => false, 'message' => 'Layanan tidak ditemukan.'], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan saat memindahkan data: ' . $e->getMessage()]);
        }
    }

    public function konsultasi()
    {
        // Ambil semua pengguna yang memiliki chat
        $users = Pengguna::has('chats')->get();

        return view('admin.konsultasi', compact('users'));
    }

    public function chatDetail($id_pengguna)
    {
        // Ambil data pengguna
        $pengguna = Pengguna::findOrFail($id_pengguna);

        // Ambil pesan dari pengguna dan admin
        $messages = Chat::where('pengguna_id', $id_pengguna)->orderBy('created_at')->get();

        // Cek apakah request berasal dari AJAX
        if (request()->ajax()) {
            return response()->json([
                'pengguna' => $pengguna,
                'messages' => $messages
            ]);
        }

        // Jika bukan AJAX, tampilkan halaman seperti biasa
        $users = Pengguna::has('chats')->get();
        return view('admin.konsultasi', compact('users', 'pengguna', 'messages'));
    }


    public function sendMessage(Request $request)
    {
        $request->validate([
            'pengguna_id' => 'required|exists:pengguna,id_pengguna',
            'message' => 'required|string',
        ]);

        $pengguna = Pengguna::findOrFail($request->pengguna_id);

        // Simpan pesan dari admin
        Chat::create([
            'pengguna_id' => $request->pengguna_id,
            'admin_id' => 1, // ID admin tetap
            'nama_pengguna' => $pengguna->name, // Tambahkan nama pengguna
            'message' => $request->message,
            'is_from_admin' => true,
        ]);

        return redirect()->route('admin.konsultasi.detail', ['id_pengguna' => $pengguna->id_pengguna]);
    }

    public function datapengguna()
    {
        // Ambil semua pengguna dari database
        $pengguna = Pengguna::all(); // Atau sesuaikan dengan query yang Anda butuhkan

        return view('admin.datapengguna', compact('pengguna'));
    }

    public function ubahPassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $pengguna = Pengguna::findOrFail($id);
        $pengguna->password = bcrypt($request->password);
        $pengguna->save();

        return response()->json(['success' => true, 'redirect' => route('admin.datapengguna')]);
    }

    public function hapusPengguna($id)
    {
        $pengguna = Pengguna::findOrFail($id);

        // Hapus pengguna
        $pengguna->delete();

        return response()->json(['success' => true]);
    }

}
