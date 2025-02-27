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
        <article>

            <section class="image-shop" id="home" aria-label="home">
                <!-- Gambar Shop -->
                <img src="/Kitter/assets/images/shop2.jpg" alt="Shop Image" class="image-shop">

                <!-- Teks Shoping dan Deskripsi -->
                <div class="shop-text">
                    <h1 class="shop-heading">We Have Everithing For Your Pet</h1>
                    <p class="shop-description">Teman berbulu anda juga ingin belanja, Carikan hal-hal yang mereka
                        suka.
                    </p>
                    <a href="#" class="btn-shop-now">SHOP NOW</a>
                </div>
            </section>

            <!-- Filter Section (Sort By & Category) -->
            <section class="shop-filters">
                <div class="container">
                    <div class="filter-bar">

                        <div class="filter-item">
                            <form id="sortForm" method="GET" action="{{ route('shop') }}">
                                <select id="sortBy" name="sortBy" onchange="this.form.submit()">
                                    <option value="#">Rated</option>
                                    <option value="priceLowToHigh"
                                        {{ request('sortBy') == 'priceLowToHigh' ? 'selected' : '' }}>Price : Low to High
                                    </option>
                                    <option value="priceHighToLow"
                                        {{ request('sortBy') == 'priceHighToLow' ? 'selected' : '' }}>Price : High to Low</option>
                                </select>
                            </form>
                        </div>

                        <div class="filter-item">
                            <form id="categoryForm" method="GET" action="{{ route('shop') }}" onsubmit="submitForm(event)">
                                <select id="category" name="kategori_produk" onchange="this.form.submit()">
                                    <option value="all">All Categories</option>
                                    @foreach ($kategori_produk as $kategori)
                                        <option value="{{ $kategori->kategori_produk }}" {{ request('kategori_produk') == $kategori->kategori_produk ? 'selected' : '' }}>
                                            {{ $kategori->kategori_produk }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <section class="product-list-section" id="product-list-section">
                <div id="product-container" class="product-list-container">
                    @include('partials.product-grid', ['produks' => $produks])
                </div>
            
                <div class="container-nek">
                    <div class="pagenation-nomer">
                        @if ($produks->currentPage() > 1)
                            <a href="{{ $produks->previousPageUrl() }}#product-list-section" class="nomer-halaman">←</a>
                        @endif
            
                        @for ($i = 1; $i <= $produks->lastPage(); $i++)
                            <a href="{{ $produks->url($i) }}#product-list-section" class="nomer-halaman">{{ $i }}</a>
                        @endfor
            
                        @if ($produks->hasMorePages())
                            <a href="{{ $produks->nextPageUrl() }}#product-list-section" class="panah-berikut">→</a>
                        @endif
                    </div>
                </div>
            </section>
            

            <!-- Monthly Discount Section (as a Card) -->
            <section class="monthly-discount">
                <div class="container">
                    <div class="discount-card">
                        <img src="/Kitter/assets/images/diskon2.jpg" alt="Discount Background" class="discount-bg">
                        <h2>Monthly Discount!</h2>
                        <p>Get up to <strong>30% OFF</strong> on selected pet food and toys!</p>
                        <a href="#" class="tombol-diskon">SHOP NOW</a>
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

    <script>
        window.addEventListener('beforeunload', function() {
            localStorage.setItem('scrollPosition', window.scrollY);
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const scrollPosition = localStorage.getItem('scrollPosition');
            if (scrollPosition) {
                window.scrollTo(0, parseInt(scrollPosition));
                localStorage.removeItem('scrollPosition'); // Clear the stored position
            }
        });
    </script>

    <script>
        function submitForm(event) {
            event.preventDefault(); // Prevent default form submission
    
            const form = document.getElementById('categoryForm');
            const formData = new FormData(form);
    
            fetch(form.action, {
                method: 'GET',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('product-container').innerHTML = data;
                // No need to scroll, as the position is maintained
            })
            .catch(error => console.error('Error:', error));
        }
    </script>

    <script>
        document.getElementById('filterForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            const sortBy = document.getElementById('sortBy').value; // Get the selected filter value
            const url = new URL(window.location.href);
            url.searchParams.set('sortBy', sortBy); // Set the filter parameter
            url.hash = 'product-list-section'; // Set the hash to scroll to the section

            // Apply fade-out effect to the product container
            const productContainer = document.getElementById('product-container');
            productContainer.classList.add('fade-out'); // Start fade out

            // Wait for the fade-out animation to finish before redirecting
            setTimeout(() => {
                // Redirect to the same page with the filter parameter and hash
                window.location.href = url.toString();
            }, 500); // Match the timeout with the CSS transition duration
        });

        // Smooth scroll on page load if there is a hash
        window.addEventListener('load', function() {
            if (window.location.hash === '#product-list-section') {
                document.getElementById('product-list-section').scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.nomer-halaman, .panah-berikut').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const url = this.getAttribute('href');

                    if (url) {
                        fetch(url)
                            .then(response => response.text())
                            .then(data => {
                                // Replace product container with new content
                                document.getElementById('product-container').innerHTML =
                                    new DOMParser()
                                    .parseFromString(data, 'text/html')
                                    .querySelector('#product-container').innerHTML;

                                // Add animation class
                                document.getElementById('product-container').classList.add(
                                    'fade-in');
                                setTimeout(() => {
                                    document.getElementById('product-container')
                                        .classList.remove('fade-in');
                                }, 500);
                            })
                            .catch(error => console.error('Error fetching data:', error));
                    }
                });
            });
        });
    </script>


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
            /* Warna gradient saat hover */
            color: white !important;
            /* Pastikan teks tetap putih saat hover */
        }

        .custom-confirm-button:focus {
            outline: none !important;
            /* Hilangkan outline saat tombol difokuskan */
            box-shadow: none !important;
            /* Hilangkan shadow saat difokuskan */
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in-out forwards;
            /* Fade in effect */
        }

        .fade-out {
            animation: fadeOut 0.5s ease-in-out forwards;
            /* Fade out effect */
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }

            to {
                opacity: 0;
            }
        }
    </style>




</body>

</html>
