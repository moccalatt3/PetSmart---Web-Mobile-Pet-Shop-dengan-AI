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
                    <button class="action-btn" aria-label="Search">
                        <ion-icon name="search-outline" aria-hidden="true"></ion-icon>
                    </button>
                    <form action="/search" method="GET" class="search-form" id="search-form">
                        <input type="text" name="query" placeholder="Search..." class="search-input">
                    </form>
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
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn">Log In</button>
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
        </article>
    </main>

    {{-- <script src="{{ asset('Kitter/assets/js/script.js') }}" defer></script> --}}

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
