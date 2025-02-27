<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetSmart</title>
    <meta name="title" content="Kitter - Hight Quality Pet Food">
    <meta name="description" content="This is an eCommerce html template made by codewithsadee">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('Kitter/assets/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;600;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bangers&family=Carter+One&family=Nunito+Sans:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="preload" as="image" href="{{ url('Kitter/assets/images/hero-banner.jpg') }}">


</head>

<body id="top">

    <header class="header" data-header>
        <div class="container">

            <button class="nav-toggle-btn" aria-label="toggle manu" data-nav-toggler>
                <ion-icon name="menu-outline" aria-hidden="true" class="menu-icon"></ion-icon>
                <ion-icon name="close-outline" aria-label="true" class="close-icon"></ion-icon>
            </button>

            <div class="header-container">
                <nav class="navbar" data-navbar>
                    <ul class="navbar-list">
                        <li class="navbar-logo">
                            <img src="{{ asset('Kitter/assets/images/logonav.png') }}" alt="Logo"
                                class="logo-image">
                        </li>
                        <li class="navbar-item">
                            <a href="{{ route('beranda') }}" class="navbar-link" data-nav-link>Home</a>
                        </li>
                        <li class="navbar-item">
                            <a href="{{ route('shop') }}" class="navbar-link" data-nav-link>Shop</a>
                        </li>
                        <li class="navbar-item">
                            <a href="{{ route('service') }}" class="navbar-link" data-nav-link>Service</a>
                        </li>                        
                        <li class="navbar-item">
                            <a href="{{ route('konsultasi') }}" class="navbar-link" data-nav-link>Konsultasi</a>
                        </li>
                        <li class="navbar-item">
                            <a href="{{ route('diagnosis') }}" class="navbar-link" data-nav-link>Diagnosis</a>
                        </li>
                    </ul>
                    <a href="#" class="navbar-action-btn">Log In</a>
                </nav>

                <div class="header-actions">
                    
                    <button class="action-btn user" aria-label="User " onclick="window.location='{{ route('profile') }}'">
                        <ion-icon name="person-outline" aria-hidden="true"></ion-icon>
                    </button>
                    <button class="action-btn" aria-label="cart"
                        onclick="window.location.href='{{ route('keranjang') }}'">
                        <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>
                        <span class="btn-badge">{{ $jumlah_pemesanan }}</span>
                    </button>
                    <button class="action-btn" aria-label="chat" onclick="window.location.href='{{ route('chat') }}'">
                        <ion-icon name="chatbubble-outline" aria-hidden="true"></ion-icon>
                        <span class="btn-badge">{{ $jumlah_chat_masuk }}</span>
                    </button>
                    <button class="action-btn" aria-label="favorites" onclick="window.location.href='{{ route('rating') }}'">
                        <ion-icon name="star-outline" aria-hidden="true"></ion-icon>
                        <span class="btn-badge">{{ $jumlah_riwayat_transaksi }}</span>
                    </button>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            </div>

        </div>
    </header>

    <main>

        <section class="keranjang-section">
            <img src="{{ asset('Kitter/assets/images/landkeranjang.jpg') }}" alt="Keranjang Background"
                class="keranjang-img">
            <div class="keranjang-text">
                <h1 class="keranjang-heading">Keranjang Belanja Anda</h1>
                <p class="keranjang-deskripsi">Cek kembali barang yang ingin Anda beli sebelum melanjutkan ke
                    pembayaran.</p>
            </div>
        </section>

        <div class="container keranjang-belanja">
            @foreach ($pemesanans as $pemesanan)
                <div class="produk-item" id="produk-{{ $pemesanan->id_pemesanan }}">
                    <img src="{{ asset('storage/' . $pemesanan->gambar_produk) }}"
                        alt="{{ $pemesanan->nama_produk }}" class="gambar-barang">

                    <div class="info-produk">
                        <p class="nama-barang">{{ $pemesanan->nama_produk }}</p>
                        <p class="kategori">{{ $pemesanan->kategori_produk }}</p>
                    </div>

                    <div class="harga-satuan">
                        <p>Rp{{ number_format($pemesanan->harga_produk, 0, ',', '.') }}</p>
                        <!-- Hidden field for product price -->
                        <input type="hidden" id="harga-produk-{{ $pemesanan->id_pemesanan }}"
                            value="{{ $pemesanan->harga_produk }}">
                    </div>

                    <div class="product-control">
                        <div class="tombol-control">
                            <input type="hidden" id="stok-produk-{{ $pemesanan->id_pemesanan }}"
                                value="{{ $pemesanan->produk->stok_produk }}">

                            <button type="button" class="quantity-btn minus-btn"
                                onclick="ubahJumlah({{ $pemesanan->id_pemesanan }}, 'minus')">
                                <img src="/Kitter/assets/images/minus.png" alt="Kurangi">
                            </button>
                            <span id="hitung-{{ $pemesanan->id_pemesanan }}" name="quantity"
                                class="hitung-display">{{ $pemesanan->jumlah }}</span>
                            <button type="button" class="quantity-btn plus-btn"
                                onclick="ubahJumlah({{ $pemesanan->id_pemesanan }}, 'plus')">
                                <img src="/Kitter/assets/images/ples.png" alt="Tambah">
                            </button>
                        </div>

                        <!-- Stok alert berada di dalam product-control -->
                        <p id="stok-alert-{{ $pemesanan->id_pemesanan }}" class="stok-alert" style="display:none;">
                            Stoknya cuma ada {{ $pemesanan->produk->stok_produk }}
                        </p>
                    </div>


                    <div class="total-harga">
                        <p id="total-harga-{{ $pemesanan->id_pemesanan }}">
                            Rp{{ number_format($pemesanan->jumlah * $pemesanan->harga_produk, 0, ',', '.') }}
                        </p>
                    </div>

                    <div class="hapus-produk">
                        <button class="btn-trash" onclick="hapusProduk({{ $pemesanan->id_pemesanan }})">
                            <ion-icon name="trash-outline"></ion-icon>
                        </button>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>

        <div class="total-pembayaran-container">
            <div class="total-section">
                <div class="total-harga-semua">
                    <span class="label-total">Total</span>
                    <span class="angka-total" id="angka-total">Rp0</span>
                </div>
            </div>

            <div class="separator-line"></div>

            <div class="tombol-section">
                <button class="pesanan">Buat Pesanan</button>
                <a href="{{ route('struk') }}" class="struk">Struk</a>
            </div>
        </div>

    </main>

    <footer class="footer" style="background-image: url('{{ asset('Kitter/assets/images/footer-bg.jpg') }}')">

        <div class="footer-top section">
            <div class="container">

                <div class="footer-brand">

                    <a href="#" class="logo">
                        <img src="{{ asset('Kitter/assets/images/logonav.png') }}" alt="Logo" width="220"
                            height="auto">
                    </a>

                    <p class="footer-text">
                        If you have any question, please contact us at <a href="mailto:support@gmail.com"
                            class="link">petsmart@gmail.com</a>
                    </p>

                    <ul class="contact-list">

                        <li class="contact-item">
                            <ion-icon name="location-outline" aria-hidden="true"></ion-icon>

                            <address class="address">
                                Jl. Raya Jatibarang Bulak Blok Roma No.14, Bulak, Kec. Jatibarang, Kabupaten Indramayu,
                                Jawa Barat 45273
                            </address>
                        </li>

                        <li class="contact-item">
                            <ion-icon name="call-outline" aria-hidden="true"></ion-icon>

                            <a href="tel:+16234567891011" class="contact-link">0823-1675-1347</a>
                        </li>

                    </ul>

                    <ul class="social-list">

                        <li>
                            <a href="#" class="social-link">
                                <ion-icon name="logo-facebook"></ion-icon>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="social-link">
                                <ion-icon name="logo-twitter"></ion-icon>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="social-link">
                                <ion-icon name="logo-pinterest"></ion-icon>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="social-link">
                                <ion-icon name="logo-instagram"></ion-icon>
                            </a>
                        </li>

                    </ul>

                </div>

                {{-- <ul class="footer-list">

                    <li>
                        <p class="footer-list-title">Corporate</p>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Careers</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">About Us</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Contact Us</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">FAQs</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Vendors</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Affiliate Program</a>
                    </li>

                </ul>

                <ul class="footer-list">

                    <li>
                        <p class="footer-list-title">Information</p>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Online Store</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Privacy Policy</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Refund Policy</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Shipping Policy</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Terms of Service</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Track Order</a>
                    </li>

                </ul>

                <ul class="footer-list">

                    <li>
                        <p class="footer-list-title">Services</p>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Grooming</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Positive Dog Training</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Veterinary Services</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Petco Insurance</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Pet Adoption</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Resource Center</a>
                    </li>

                </ul> --}}

            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">

                <p class="copyright">
                    &copy; 2022 Made with ♥ by <a href="#" class="copyright-link">codewithsadee.</a>
                </p>

                <img src="{{ asset('Kitter/assets/images/payment.png') }}" width="397" height="32"
                    loading="lazy" alt="payment method" class="img">

            </div>
        </div>

    </footer>


    <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
        <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
    </a>

    {{-- <script src="{{ asset('Kitter/assets/js/script.js') }}" defer></script> --}}
    <script>
        // Fungsi untuk menghitung total semua harga produk di keranjang
        function hitungTotalPembayaran() {
            let totalSemua = 0;

            // Iterasi melalui semua produk untuk menjumlahkan total harga
            document.querySelectorAll('.produk-item').forEach(function(produkItem) {
                let idPemesanan = produkItem.id.split('-')[1]; // Ambil ID pemesanan dari elemen produk
                let jumlah = parseInt(document.getElementById('hitung-' + idPemesanan).innerText);
                let hargaProduk = parseInt(document.getElementById('harga-produk-' + idPemesanan).value);
                totalSemua += jumlah * hargaProduk;
            });

            // Format total harga dengan format Rp
            let formattedTotalSemua = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(totalSemua);

            // Update tampilan total harga
            document.getElementById('angka-total').innerText = formattedTotalSemua;
        }

        // Modifikasi fungsi ubahJumlah untuk memanggil hitungTotalPembayaran setelah mengubah jumlah produk
        function ubahJumlah(id_pemesanan, tipe) {
            let jumlahSpan = document.getElementById('hitung-' + id_pemesanan);
            let jumlah = parseInt(jumlahSpan.innerText);
            let stokProduk = parseInt(document.getElementById('stok-produk-' + id_pemesanan).value);
            let hargaProduk = parseInt(document.getElementById('harga-produk-' + id_pemesanan).value);

            if (tipe === 'plus') {
                if (jumlah < stokProduk) {
                    jumlah++;
                } else {
                    let stokAlert = document.getElementById('stok-alert-' + id_pemesanan);
                    stokAlert.style.display = 'block';
                    setTimeout(function() {
                        stokAlert.style.display = 'none';
                    }, 3000);
                    return;
                }
            } else if (tipe === 'minus' && jumlah > 1) {
                jumlah--;
            }

            jumlahSpan.innerText = jumlah;
            let totalHarga = jumlah * hargaProduk;
            let formattedTotalHarga = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(totalHarga);
            document.getElementById('total-harga-' + id_pemesanan).innerText = formattedTotalHarga;

            // Update jumlah barang di server
            fetch(`/keranjang/update-jumlah/${id_pemesanan}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        jumlah: jumlah
                    })
                }).then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Panggil fungsi untuk menghitung total pembayaran
                        hitungTotalPembayaran();
                    } else {
                        console.error('Gagal memperbarui jumlah barang');
                    }
                });
        }

        function hapusProduk(id_pemesanan) {
            fetch(`/keranjang/hapus/${id_pemesanan}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    }
                }).then(response => response.json())
                .then(data => {
                    if (data.success) {
                        let produkElement = document.getElementById(`produk-${id_pemesanan}`);
                        if (produkElement) {
                            produkElement.remove();
                        }
                        console.log('Produk berhasil dihapus');

                        // Panggil fungsi untuk menghitung total pembayaran
                        hitungTotalPembayaran();

                        // Update jumlah pemesanan di keranjang
                        let jumlahPemesanan = parseInt(document.querySelector('.btn-badge').innerText);
                        jumlahPemesanan--; // Kurangi jumlah pemesanan
                        document.querySelector('.btn-badge').innerText =
                            jumlahPemesanan; // Update tampilan jumlah pemesanan
                    } else {
                        console.error('Gagal menghapus produk');
                    }
                }).catch(error => {
                    console.error('Terjadi kesalahan:', error);
                });
        }


        // Panggil fungsi untuk menghitung total pembayaran saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            hitungTotalPembayaran();
        });

        document.querySelector('.pesanan').addEventListener('click', async function() {
            let totalHarga = parseInt(document.getElementById('angka-total').innerText.replace(/[^\d]/g, ''));
            let pemesananData = [];

            // Ambil data pemesanan
            document.querySelectorAll('.produk-item').forEach(item => {
                let idPemesanan = item.id.split('-')[1]; // Ambil ID pemesanan dari elemen produk
                let jumlah = parseInt(document.getElementById('hitung-' + idPemesanan).innerText);
                let hargaSatuan = parseInt(document.getElementById('harga-produk-' + idPemesanan).value);
                
                pemesananData.push({
                    id_pemesanan: idPemesanan,
                    nama_produk: item.querySelector('.nama-barang').innerText,
                    jumlah: jumlah,
                    harga_satuan: hargaSatuan
                });
            });

            try {
                let response = await fetch('/transaksi/buat', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        total_harga: totalHarga,
                        pemesanan_items: pemesananData // Kirim data pemesanan
                    })
                });

                if (!response.ok) {
                    throw new Error(`Server error: ${response.status}`);
                }

                let data = await response.json();

                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Pesanan berhasil dibuat!',
                        text: 'Silahkan cek struknya',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = "/keranjang";
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal membuat pesanan',
                        text: data.message,
                    });
                }
            } catch (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi kesalahan',
                    text: 'Gagal terhubung dengan server.',
                });
            }
        });

    </script>


    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>

{{-- <div class="diskon">
                    <span class="label-diskon">Potongan Diskon</span>
                    <span class="angka-diskon">Rp {{ number_format(1000, 0, ',', '.') }}</span>
                </div>                 --}}
