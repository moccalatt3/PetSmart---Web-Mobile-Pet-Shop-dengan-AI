<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetSmart</title>
    <meta name="title" content="Kitter - Hight Quality Pet Food">
    <meta name="description" content="This is an eCommerce html template made by codewithsadee">


    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;600;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('Kitter/assets/css/style.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
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
                    <button class="action-btn" aria-label="cart" onclick="window.location.href='{{ route('keranjang') }}'">
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
        <article>

            <!-- Bagian Gambar Shop -->
            <section class="image-shop" id="home" aria-label="home">
                <!-- Gambar Shop -->
                <img src="/Kitter/assets/images/shop2.jpg" alt="Shop Image" class="image-shop">

                <!-- Teks Shoping dan Deskripsi -->
                <div class="shop-text">
                    <h1 class="shop-heading">Shoping</h1>
                    <p class="shop-description">Teman berbulu anda juga ingin belanja, Carikan hal-hal yang mereka
                        suka.
                    </p>
                    <a href="#" class="btn-shop-now">SHOP NOW</a>
                </div>
            </section>

            <!-- Bagian Detail Produk -->
            <section class="detail-produk-section">
                <div class="detail-produk-container">

                    <div class="gambar-produk">
                        <img src="{{ asset('storage/' . $produk->gambar_produk) }}" alt="{{ $produk->nama_produk }}"
                            class="detail-produk-img">
                    </div>

                    <div class="informasi-produk">

                        <h2 class="nama-produk">{{ $produk->nama_produk }}</h2>
                        <h2 class="harga-produk">Rp. {{ number_format($produk->harga_produk, 0, ',', '.') }}</h2>

                        <p class="deskripsi-produk">{{ $produk->deskripsi_produk }}</p>

                        <div class="jumlah-produk">
                            <div class="quantity-wrapper">
                                <div class="quantity-control">
                                    <button type="button" class="quantity-btn minus-btn">
                                        <img src="/Kitter/assets/images/minus.png" alt="Kurangi">
                                    </button>
                                    <span id="quantity" name="quantity" class="quantity-display">1</span>
                                    <button type="button" class="quantity-btn plus-btn">
                                        <img src="/Kitter/assets/images/ples.png" alt="Tambah">
                                    </button>
                                </div>

                                <!-- Form untuk menambahkan produk ke keranjang -->
                                <form action="{{ route('keranjang.tambah', $produk->id_produk) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="jumlah" id="jumlah" value="1">
                                    <button type="submit" class="tambah-keranjang">ADD TO CART</button>
                                </form>
                            </div>
                        </div>

                        <div class="stok-produk">
                            <p>Stok tersedia : <span class="stok-terakhir">{{ $produk->stok_produk }}</span> produk
                            </p>
                        </div>

                        <button class="btn-wishlist">
                            <i class="bi bi-heart"></i> Add to Wishlist
                        </button>

                        <!-- Kategori dan Tags -->
                        <div class="meta-produk">
                            <p>Kategori : <span class="meta-kategori">{{ $produk->kategori_produk }}</span></p>
                        </div>
                    </div>
                </div>
            </section>

        </article>
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

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: true, // Menampilkan tombol konfirmasi
                confirmButtonText: 'Tutup', // Mengatur teks tombol konfirmasi
                customClass: {
                    confirmButton: 'custom-confirm-button' // Menghubungkan kelas CSS kustom
                }
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
                showConfirmButton: true, // Menampilkan tombol konfirmasi
                confirmButtonText: 'Tutup', // Mengatur teks tombol konfirmasi
                customClass: {
                    confirmButton: 'custom-confirm-button' // Menghubungkan kelas CSS kustom
                }
            });
        </script>
    @endif

    <style>
        .custom-confirm-button {
            background: linear-gradient(45deg, #C74134, #ae3024) !important;
            color: white !important;
            border: none !important;
            padding: 7px 25px !important;
            font-size: 16px !important;
            border-radius: 20px !important;
            cursor: pointer !important;
            outline: none !important;
            box-shadow: none !important;
            font-family: 'Nunito', sans-serif !important;
            font-weight: 700 !important;
            font-size: 14px !important;
        }

        /* Hover state for the custom button */
        .custom-confirm-button:hover {
            background: linear-gradient(45deg, #ae3024, #C74134) !important;
            color: white !important;
        }

        .custom-confirm-button:focus {
            outline: none !important;
            box-shadow: none !important;
        }
    </style>

    <script>
        // Ambil elemen tombol dan span jumlah
        const minusBtn = document.querySelector('.minus-btn');
        const plusBtn = document.querySelector('.plus-btn');
        const quantityDisplay = document.getElementById('quantity');
        const jumlahInput = document.getElementById('jumlah');

        // Ambil stok dari produk (dari blade template)
        const maxStock = {{ $produk->stok_produk }};

        // Fungsi untuk mengurangi jumlah
        minusBtn.addEventListener('click', function() {
            let currentValue = parseInt(quantityDisplay.textContent);
            if (currentValue > 1) {
                quantityDisplay.textContent = currentValue - 1;
                jumlahInput.value = currentValue - 1; // Update nilai input jumlah
            }
        });

        // Fungsi untuk menambah jumlah
        plusBtn.addEventListener('click', function() {
            let currentValue = parseInt(quantityDisplay.textContent);
            if (currentValue < maxStock) {
                quantityDisplay.textContent = currentValue + 1;
                jumlahInput.value = currentValue + 1; // Update nilai input jumlah
            }
        });
    </script>


</body>

</html>
