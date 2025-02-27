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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;600;700&display=swap"
        rel="stylesheet">
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

            <main>
                <article>
                    <section class="section-grooming" aria-label="offer">
                        <div class="container-grooming">
                            <div class="row">
                                <!-- Card 1 -->
                                <div class="card-grooming">
                                    <div class="content-grooming">
                                        <div class="icon-grooming">
                                            <img src="/Kitter/assets/images/grooming1.png" alt="Icon Paket 1" />
                                        </div>
                                        <div class="detail-grooming">
                                            <h3 class="nama-paket">Bulu Kinclong</h3>
                                            <p class="harga-paket">Rp 150.000</p>
                                            <p class="deskripsi-paket">Bulu Kinclong yang mencakup layanan seperti mandi, potong kuku, dan pengeringan.</p>
                                            <div class="read-more-container">
                                                <a href="#" class="read-more">Read More</a>
                                                <i class="bi bi-arrow-right arrow-icon"></i>
                                            </div>
                                        </div>                                                                               
                                    </div>
                                </div>
            
                                <div class="card-grooming">
                                    <div class="content-grooming">
                                        <div class="icon-grooming">
                                            <img src="/Kitter/assets/images/grooming2.png" alt="Icon Paket 2" />
                                        </div>
                                        <div class="detail-grooming">
                                            <h3 class="nama-paket">Si Bersih Sehat</h3>
                                            <p class="harga-paket">Rp 250.000</p>
                                            <p class="deskripsi-paket">Si Bersih Sehat yang mencakup layanan seperti mandi, potong kuku, dan perawatan bulu.</p>
                                            <div class="read-more-container">
                                                <a href="#" class="read-more">Read More</a>
                                                <i class="bi bi-arrow-right arrow-icon"></i>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
            
                                <!-- Card 3 -->
                                <div class="card-grooming">
                                    <div class="content-grooming">
                                        <div class="icon-grooming">
                                            <img src="/Kitter/assets/images/grooming3.png" alt="Icon Paket 3" />
                                        </div>
                                        <div class="detail-grooming">
                                            <h3 class="nama-paket">Ganteng Maksimal</h3>
                                            <p class="harga-paket">Rp 350.000</p>
                                            <p class="deskripsi-paket">Ganteng Maksimal yang mencakup layanan seperti mandi, potong kuku, pijat, dan pengeringan.</p>
                                            <div class="read-more-container">
                                                <a href="#" class="read-more">Read More</a>
                                                <i class="bi bi-arrow-right arrow-icon"></i>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
            
                                <!-- Card 4 -->
                                <div class="card-grooming">
                                    <div class="content-grooming">
                                        <div class="icon-grooming">
                                            <img src="/Kitter/assets/images/grooming4.png" alt="Icon Paket 4" />
                                        </div>
                                        <div class="detail-grooming">
                                            <h3 class="nama-paket">Spa Mewah</h3>
                                            <p class="harga-paket">Rp 450.000</p>
                                            <p class="deskripsi-paket">Spa Mewah yang mencakup layanan lengkap seperti mandi, potong kuku, perawatan bulu, dan pijat.</p>
                                            <div class="read-more-container">
                                                <a href="#" class="read-more">Read More</a>
                                                <i class="bi bi-arrow-right arrow-icon"></i>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="grooming-background">
                        <form action="{{ route('grooming.store') }}" method="POST" class="grooming-form-container">
                            @csrf
                            <h2>Booking Sekarang</h2>
                    
                            <div class="grooming-form-group">
                                <label for="kontak" class="grooming-label">Nomor Kontak</label>
                                <input type="text" id="kontak" name="kontak" class="grooming-input" required>
                            </div>
                    
                            <div class="grooming-form-group">
                                <label for="jenis-hewan" class="grooming-label">Jenis Hewan</label>
                                <select id="jenis-hewan" name="jenis_hewan" class="grooming-select" required>
                                    <option value="kucing">Kucing</option>
                                    <option value="anjing">Anjing</option>
                                </select>
                            </div>
                    
                            <div class="grooming-form-group">
                                <label for="paket-grooming" class="grooming-label">Pilih Paket Grooming</label>
                                <select id="paket-grooming" name="paket_grooming" class="grooming-select" required>
                                    <option value="Bulu Kinclong">Bulu Kinclong - Rp 150.000</option>
                                    <option value="Si Bersih Sehat">Si Bersih Sehat - Rp 250.000</option>
                                    <option value="Ganteng Maksimal">Ganteng Maksimal - Rp 350.000</option>
                                    <option value="Spa Mewah">Spa Mewah - Rp 450.000</option>
                                </select>
                            </div>
                    
                            <div class="grooming-form-group">
                                <label for="tanggal-layanan" class="grooming-label">Tanggal Layanan</label>
                                <input type="date" id="tanggal-layanan" name="tanggal_layanan" class="grooming-input" required>
                            </div>
                    
                            <div class="grooming-form-group">
                                <label for="catatan" class="grooming-label">Catatan Tambahan</label>
                                <textarea id="catatan" name="catatan" class="grooming-textarea"></textarea>
                            </div>
                    
                            <div class="grooming-form-group button-group">
                                <button type="submit" class="grooming-submit">PESAN SEKARANG</button>
                                <a href="{{ route('struk.layanan') }}">
                                    <button type="button" class="grooming-struk">STRUK</button>
                                </a>                                
                            </div>
                        </form>
                    </section>
                    
                </article>
            </main>
            

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
