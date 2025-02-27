<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetSmart</title>
    <meta name="title" content="Kitter - Hight Quality Pet Food">
    <meta name="description" content="This is an eCommerce html template made by codewithsadee">

    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('Kitter/assets/css/style.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/ionicons@5.5.2/dist/css/ionicons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;600;700;800&display=swap" rel="stylesheet">

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
            <section class="section hero has-bg-image" id="home" aria-label="home"
                style="background-image: url('/Kitter/assets/images/petshop.jpg');">
                <div class="container">
                    <h1 class="h1 hero-title">
                        <span class="span">High Quality</span>Makanan Sehat, Grooming Profesional, dan Konsultasi
                        Ahli.
                    </h1>
                    <a href="#" class="shop">SHOP NOW</a>
                </div>
            </section>

            <section class="section stats" id="website-stats" aria-label="Website Stats">
                <div class="container stats-wrapper">
                    <!-- Stats Cards Container with unified background -->
                    <div class="stats-card-container">
                        <!-- Card 1: Grooming Users -->
                        <div class="stats-card">
                            <h2 class="stats-number">500+</h2>
                            <p class="stats-description">Orang sudah menggunakan layanan Grooming</p>
                        </div>
                        <!-- Card 2: Health Users -->
                        <div class="stats-card">
                            <h2 class="stats-number">300+</h2>
                            <p class="stats-description">Orang sudah menggunakan layanan Kesehatan</p>
                        </div>
                        <!-- Card 3: Adoption Users -->
                        <div class="stats-card">
                            <h2 class="stats-number">200+</h2>
                            <p class="stats-description">Hewan telah berhasil diadopsi</p>
                        </div>
                        <!-- Card 4: Satisfaction Rate -->
                        <div class="stats-card">
                            <h2 class="stats-number">95%</h2>
                            <p class="stats-description">Pelanggan puas dengan layanan kami</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section layanan" aria-label="offer">
                <!-- Judul Layanan -->
                <div class="layanan-header">
                    <h2 class="layanan-title">Layanan PetSmart.id</h2>
                    <p class="layanan-description">Kami menyediakan berbagai layanan untuk memastikan teman berbulu Anda
                        selalu sehat dan bahagia. Pilih layanan yang sesuai dengan kebutuhan hewan peliharaan Anda!</p>
                </div>

                <!-- Card Layanan -->
                <div class="layanan-container">
                    <div class="card-layanan">

                        <!-- Konten Card -->
                        <div class="card-content">
                            <img src="/Kitter/assets/images/layanan1.jpg" alt="Layanan Grooming" class="layanan-img">
                            <h3 class="jenis-layanan">Grooming</h3>
                            <p class="deskripsi-layanan">Layanan grooming untuk menjaga kebersihan dan kesehatan bulu hewan peliharaan anda.</p>
                            <a href="{{ route('service.grooming') }}" class="btn-mulai-layanan">MULAI LAYANAN</a>
                        </div>
                    </div>

                    <!-- Card Layanan 2 (contoh tambahan jika diperlukan) -->
                    <div class="card-layanan">

                        <div class="card-content">
                            <img src="/Kitter/assets/images/layanan2.jpg" alt="Layanan Medis" class="layanan-img">
                            <h3 class="jenis-layanan">Kesehatan</h3>
                            <p class="deskripsi-layanan">Layanan kesehatan untuk memastikan hewan peliharaan anda tetap sehat dan bugar.</p>
                            <a href="" class="btn-mulai-layanan">MULAI LAYANAN</a>
                        </div>
                    </div>
                    
                    <div class="card-layanan">

                        <div class="card-content">
                            <img src="/Kitter/assets/images/layanan3.jpg" alt="Layanan Medis" class="layanan-img">
                            <h3 class="jenis-layanan">Pelatihan</h3>
                            <p class="deskripsi-layanan">Pelatihan khusus untuk meningkatkan kemampuan dan perilaku hewan peliharaan.</p>
                            <a href="{{ route('layanan.pelatihan') }}" class="btn-mulai-layanan">MULAI LAYANAN</a>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section product" id="shop" aria-label="product">
                <div class="container">
                    <!-- Judul dan deskripsi -->
                    <h2 class="layanan-title">Produk Terlaris di PetSmart.id</h2>
                    <p class="layanan-description">
                        Temukan berbagai produk terlaris yang kami tawarkan untuk memenuhi kebutuhan hewan peliharaan
                        Anda. Nikmati kualitas terbaik dengan harga yang bersaing.
                    </p>
            
                    <!-- Product List -->
                    <section class="product-list-section">
                        <div class="product-list-container">
                            <div class="product-grid">
                                @foreach($produk_terlaris as $item)
                                    <div class="product-card-item fade-in" data-category="{{ $item->kategori_produk }}">
                                        <img src="{{ asset('storage/' . $item->gambar_produk) }}" alt="{{ $item->nama_produk }}">
                                        <div class="rating-wrapper">
                                            @for ($i = 0; $i < 5; $i++)
                                                <ion-icon name="star" aria-hidden="true" class="{{ $i < ($item->rating ?? 0) ? 'filled' : '' }}"></ion-icon>
                                            @endfor
                                            <span class="span">({{ $item->rating ?? 0 }})</span>
                                        </div>
                                        <h3>{{ $item->nama_produk }}</h3>
                                        <p>Rp. {{ number_format($item->harga_produk, 0, ',', '.') }}</p>
                                        <div class="product-icons-container">
                                            <div class="product-icons">
                                                <a href="{{ route('shop.detail', $item->id_produk) }}" class="cart-icon">
                                                    <img src="/Kitter/assets/images/detail.png" alt="Detail Produk" class="icon-keranjang">
                                                </a>
                                            </div>
                                            <div class="product-icons">
                                                <form action="{{ route('keranjang.tambah', $item->id_produk) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="jumlah" value="1">
                                                    <button type="submit" class="cart-icon">
                                                        <img src="/Kitter/assets/images/keranjang.png" alt="Tambah Keranjang" class="icon-keranjang">
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>                   
                    </section>
                </div>
            </section>

            <section class="cta has-bg-image" aria-label="cta"
                style="background-image: url('{{ asset('Kitter/assets/images/cta-bg.jpg') }}')">
                <div class="container">

                    <figure class="cta-banner">
                        <img src="{{ asset('Kitter/assets/images/cta-banner.png') }}" width="900" height="660"
                            loading="lazy"alt="cat" class="w-100">
                    </figure>

                    <div class="cta-content">

                        <img src="{{ asset('Kitter/assets/images/cta-icon.png') }}" width="120" height="35"
                            loading="lazy" alt="taste guarantee" class="img">

                        <h2 class="h2 section-title">Cicipi, suka atau kami akan menggantinya… Dijamin!</h2>

                        <p class="section-text">
                            Di Petsmart, kami yakin anjing dan kucing Anda akan sangat menyukai makanannya sehingga jika
                            tidak… kami akan membantu Anda mencari penggantinya. Itu jaminan rasa kami.
                        </p>

                        <a href="{{ route('shop') }}" class="tombol-read">Find out more</a>

                    </div>

                </div>
            </section>

            <section class="section brand" aria-label="brand">
                <div class="container">

                    {{-- <h2 class="layanan-title">Popular Brands PetSmart.id</h2> --}}

                    <ul class="has-scrollbar">

                        <li class="scrollbar-item">
                            <div class="brand-card img-holder" style="--width: 150; --height: 150;">
                                <img src="{{ asset('Kitter/assets/images/brand-1.jpg') }}" width="150"
                                    height="150" loading="lazy" alt="brand logo" class="img-cover">
                            </div>
                        </li>

                        <li class="scrollbar-item">
                            <div class="brand-card img-holder" style="--width: 150; --height: 150;">
                                <img src="{{ asset('Kitter/assets/images/brand-2.jpg') }}" width="150"
                                    height="150" loading="lazy" alt="brand logo" class="img-cover">
                            </div>
                        </li>

                        <li class="scrollbar-item">
                            <div class="brand-card img-holder" style="--width: 150; --height: 150;">
                                <img src="{{ asset('Kitter/assets/images/brand-3.jpg') }}" width="150"
                                    height="150" loading="lazy" alt="brand logo" class="img-cover">
                            </div>
                        </li>

                        <li class="scrollbar-item">
                            <div class="brand-card img-holder" style="--width: 150; --height: 150;">
                                <img src="{{ asset('Kitter/assets/images/brand-4.jpg') }}" width="150"
                                    height="150" loading="lazy" alt="brand logo" class="img-cover">
                            </div>
                        </li>

                        <li class="scrollbar-item">
                            <div class="brand-card img-holder" style="--width: 150; --height: 150;">
                                <img src="{{ asset('Kitter/assets/images/brand-5.jpg') }}" width="150"
                                    height="150" loading="lazy" alt="brand logo" class="img-cover">
                            </div>
                        </li>

                    </ul>

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

</body>

</html>
