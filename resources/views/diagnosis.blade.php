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

    <main class="diagnosis-main" style="padding: 64px 0;">
        <div class="diagnosis-wrap">
            <div class="container container-diagnosis">
                <!-- Main Card Section -->
                <div class="diagnosis-card bg-hijau">
                    <div class="container-fluid"></div>
                    <div class="card-content text-center card-padding">
                        <span class="title">Kenali Gejala</span>
                        <div class="subtitle-section">
                            <span class="subtitle">Perhatikan</span>
                            <span id="rotate-diagnosis">
                                <span class="rotate-item">Kesehatannya</span>
                                <span class="rotate-item">Perilakunya</span>
                                <span class="rotate-item">Gejalanya</span>
                            </span>
                        </div>
                        <script>
                            let rotateItems = document.querySelectorAll('#rotate-diagnosis .rotate-item');
                            let currentIndex = 0;

                            function rotateText() {
                                rotateItems.forEach(item => item.classList.remove('active'));
                                rotateItems[currentIndex].classList.add('active');
                                currentIndex = (currentIndex + 1) % rotateItems.length;
                            }
                            rotateItems[0].classList.add('active');
                            setInterval(rotateText, 2000);
                        </script>
                        <span class="quote">
                            "Langkah awal untuk memastikan teman berbulu sehat<br>
                            adalah dengan memahami gejalanya"
                        </span>
                    </div>
                </div>

                <!-- Card Section for Pet Health Diagnosis Test -->
                <div class="diagnosis-test mt-n12 row align-center" style="margin: 8px auto; max-width: 410px;">
                    <div class="flex">
                        <a href="{{ route('diagnosis.rabies') }}" class="test-card v-card--hover theme-light">
                        <div class="test-card v-card--hover theme-light" data-url="tes-diagnosis-hewan">
                            <div class="container-fluid fill-height">
                                <div class="layout custom-card-padding">
                                    <div class="flex align-end d-flex">
                                        <span class="test-title">
                                            Diagnosis of Rabies</span>
                                    </div>
                                </div>
                            </div>
                            <div class="test-description">
                                Yuk, cek kondisi kesehatan hewan peliharaanmu!
                            </div>
                            <div class="test-actions footer-card">
                                <span class="test-duration">4 menit Test</span>
                                <div class="spacer"></div>
                                <div class="text-right">
                                    <button type="button" class="btn-icon">
                                        <img src="{{ asset('Kitter/assets/images/arrow.png') }}" alt="arrow icon"
                                            style="max-width: 24px;">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
        <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
    </a>

    {{-- <script src="{{ asset('Kitter/assets/js/script.js') }}" defer></script> --}}

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
