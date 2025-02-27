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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;600;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


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
            <section class="section chat">
                <div class="container-chat">
                    <div class="row-chat">
                        <!-- Sisi Kiri -->
                        <div class="col-md-4 bordered-column">
                            <!-- Tombol Search -->
                            <div class="search-chat mb-3">
                                <div class="search-chat mb-3">
                                    
                                </div>

                            </div>

                            <!-- Daftar Pengguna -->
                            <div class="pengguna-list">
                                <div class="pengguna-item d-flex align-items-center mb-3">
                                    <img src="/Kitter/assets/images/adminpet.png" alt="User Image"
                                        class="user-img me-3" width="50" height="50">
                                    <div class="user-info">
                                        <p class="admin-name mb-1">Admin Petsmart</p>
                                        
                                    </div>
                                </div>
                                <!-- Tambahkan lebih banyak user-item sesuai kebutuhan -->
                            </div>
                        </div>

                        <!-- Sisi Kanan -->
                        <div class="col-md-8">
                            <!-- Informasi Pengguna -->
                            <div class="chat-header d-flex align-items-center mb-3">
                                <img src="/Kitter/assets/images/adminpet.png" alt="User Image" class="user-img me-3"
                                    width="50" height="50">
                                <div class="user-info">
                                    <p class="admin-name mb-1">Admin Petsmart</p>
                                    <span class="user-status">Online</span>
                                </div>
                            </div>

                            <div class="chat-box mb-3">
                                @foreach ($chats as $chat)
                                    @if ($chat->is_from_admin)
                                        <div class="admin mb-2 d-flex justify-content-start">
                                            <div>
                                                <div class="admin-message">
                                                    {{ $chat->message }}
                                                </div>
                                                <small
                                                    class="chat-time text-muted">{{ $chat->created_at->format('h:i A') }}</small>
                                            </div>
                                        </div>
                                    @else
                                        <div class="pengguna mb-2 d-flex justify-content-end">
                                            <div>
                                                <div class="pengguna-message">
                                                    {{ $chat->message }}
                                                </div>
                                                <small
                                                    class="chat-time text-muted">{{ $chat->created_at->format('h:i A') }}</small>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                            <form id="chat-form" method="post">
                                @csrf
                                <div class="input-group-kirim">
                                    <input type="text" name="message" class="form-control-kirim"
                                        placeholder="Ketik pesan..." required>
                                    <button type="submit" class="tombol-chat">Kirim</button>
                                </div>
                            </form>

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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#chat-form').on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission

                let message = $('input[name="message"]').val();

                $.ajax({
                    url: '{{ route('chat.send') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        message: message,
                    },
                    success: function(response) {
                        if (response.success) {
                            // Add message to chat box
                            let newMessage = `
                    <div class="pengguna mb-2 d-flex justify-content-end">
                        <div>
                            <div class="pengguna-message">
                                ${response.message}
                            </div>
                            <small class="chat-time text-muted">${response.time}</small>
                        </div>
                    </div>`;

                            $('.chat-box').append(newMessage);

                            // Clear input field
                            $('input[name="message"]').val('');
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText); // Log error
                    },
                });
            });

            // Fetch messages every 3 seconds
            setInterval(function() {
                $.ajax({
                    url: '{{ route('chat.messages') }}',
                    type: 'GET',
                    success: function(chats) {
                        let chatBox = $('.chat-box');
                        chatBox.empty(); // Clear chat box

                        // Loop through the received chats
                        chats.forEach(chat => {
                            // Only display messages relevant to the logged-in user
                            if (chat.pengguna_id === {{ Auth::id() }}) {
                                let messageClass = chat.is_from_admin ? 'admin' :
                                    'pengguna';
                                let alignment = chat.is_from_admin ?
                                    'justify-content-start' : 'justify-content-end';

                                chatBox.append(`
                            <div class="${messageClass} mb-2 d-flex ${alignment}">
                                <div>
                                    <div class="${messageClass}-message">
                                        ${chat.message}
                                    </div>
                                    <small class="chat-time text-muted">${new Date(chat.created_at).toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' })}</small>
                                </div>
                            </div>
                        `);
                            }
                        });
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    },
                });
            }, 3000); // Interval of 3 seconds
        });
    </script>
</body>

</html>
