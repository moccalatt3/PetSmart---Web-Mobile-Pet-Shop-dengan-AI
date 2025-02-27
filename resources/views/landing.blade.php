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
                    </ul>
                </nav>

                <div class="header-actions">
                </div>
                <a href="{{ url('/register') }}" class="register-btn">Register</a>
                <a href="{{ url('/login') }}" class="login-btn">Log In</a>
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


{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page - PetSmart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-size: cover;
            margin: 0;
        }
        .navbar {
            background-color: rgba(255, 255, 255, 0.8); 
            backdrop-filter: blur(10px); 
        }
        .landing-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white; 
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
            background-color: rgba(0, 0, 0,); 
            padding: 20px; 
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
        }
        .landing-container h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }
        .btn-custom {
            margin: 10px;
            width: 150px;
        }
        .btn-login {
            background-color: #489aba; 
            color: white; 
            border: none; 
        }
        .btn-login:hover {
            background-color: #347d9a; 
        }
        .btn-register {
            background-color: #50a075; 
            color: white; 
            border: none; 
        }
        .btn-register:hover {
            background-color: #42805f; 
        }
    </style>
</head>
<body>

    <div class="landing-container">
        <h1>Welcome to PetSmart</h1>
        <p>Your one-stop solution for pet care</p>
        <a href="{{ url('/login') }}" class="btn btn-login btn-custom">Login</a>
        <a href="{{ url('/register') }}" class="btn btn-register btn-custom">Register</a> 
    </div>
    
</body>
</html> --}}
