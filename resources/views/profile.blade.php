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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

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
                    
                    <button class="action-btn user" aria-label="User "
                        onclick="window.location='{{ route('profile') }}'">
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
            <section class="section profile">
                <div class="container-profile">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card-profile-kiri">
                                <img src="{{ $pengguna->image_profil ? asset('storage/' . $pengguna->image_profil) : '/Kitter/assets/images/default-profile.png' }}" alt="Profile Image" class="card-img-top" id="current-profile-image">
                                <div class="card-body-profile-kiri">
                                    <p class="card-title-profile">{{ $pengguna->name }}</p>
                                    <p class="card-title-pengguna">Konsumen</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-profile-kanan">
                                <div class="card-body-profile-kanan">
                                    <nav>
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item-profile">
                                                <a class="nav-link active" data-toggle="tab" href="#overview">Overview</a>
                                            </li>
                                            <li class="nav-item-profile">
                                                <a class="nav-link" data-toggle="tab" href="#edit-profile">Edit Profile</a>
                                            </li>
                                            <li class="nav-item-profile">
                                                <a class="nav-link" data-toggle="tab" href="#change-password">Change Password</a>
                                            </li>
                                        </ul>
                                    </nav>
                        
                                    <div class="tab-content">
                                        <!-- Overview Tab -->
                                        <div id="overview" class="tab-pane fade show active">
                                            <p class="profile-details-title">Profile Details</p>
                                            <div class="profile-detail">
                                                <span class="profile-detail-label">Nama Lengkap</span>
                                                <span class="profile-detail-value">{{ $pengguna->name }}</span>
                                            </div>
                                            <div class="profile-detail">
                                                <span class="profile-detail-label">Email</span>
                                                <span class="profile-detail-value">{{ $pengguna->email }}</span>
                                            </div>
                                            <div class="profile-detail">
                                                <span class="profile-detail-label">No Telepon</span>
                                                <span class="profile-detail-value">{{ $pengguna->telepon }}</span>
                                            </div>
                                        </div>
                        
                                        <!-- Edit Profile Tab -->
                                        <div id="edit-profile" class="tab-pane fade">
                                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT') <!-- Menambahkan metode PUT untuk pembaruan -->
                                                <div class="mb-3">
                                                    <label for="profile_image" class="form-label-profile">Profile Image</label>
                                                    <div class="profile-image-container">
                                                        <img src="{{ $pengguna->image_profil ? asset('storage/' . $pengguna->image_profil) : '/Kitter/assets/images/default-profile.png' }}" alt="Profile Image" class="profile-image" id="current-profile-image">
                                                    </div>
                                                    <input type="file" class="form-control-ubah" id="profile_image" name="profile_image">
                                                </div>
                                                <div class="mb-3">
                                                    <a href="#" class="tombol-upload-profile" onclick="event.preventDefault(); this.closest('form').submit();">
                                                        <i class="bi bi-upload"></i>
                                                    </a>
                                                    <a href="#" class="tombol-hapus-profile" id="delete-image" data-id="{{ $pengguna->id_pengguna }}">
                                                        <i class="bi bi-trash3"></i>
                                                    </a>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="input-group-edit">
                                                        <label for="name" class="form-label-profile">Nama</label>
                                                        <input type="text" class="form-control-edit" id="name" name="name" value="{{ $pengguna->name }}">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="input-group-edit">
                                                        <label for="email" class="form-label-profile">Email</label>
                                                        <input type="email" class="form-control-edit" id="email" name="email" value="{{ $pengguna->email }}">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="input-group-edit">
                                                        <label for="phone" class="form-label-profile">Telepon</label>
                                                        <input type="text" class="form-control-edit" id="phone" name="telepon" value="{{ $pengguna->telepon }}">
                                                    </div>
                                                </div>
                                                <button type="submit" class="tombol-profile">Simpan Perubahan</button>
                                            </form>
                                        </div>
                                        
                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                        <script>
                                            $(document).ready(function() {
                                                $('#delete-image').click(function(e) {
                                                    e.preventDefault();
                                                    var penggunaId = $(this).data('id');

                                                    Swal.fire({
                                                        title: 'Apakah Anda yakin?',
                                                        text: "Anda tidak dapat mengembalikan gambar yang dihapus!",
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#3085d6',
                                                        cancelButtonColor: '#d33',
                                                        confirmButtonText: 'Ya, hapus!',
                                                        cancelButtonText: 'Batal'
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            $.ajax({
                                                                url: '/profile/image', // URL untuk menghapus gambar
                                                                type: 'DELETE',
                                                                data: {
                                                                    _token: '{{ csrf_token() }}',
                                                                    id: penggunaId
                                                                },
                                                                success: function(response) {
                                                                    // Menghapus gambar dari tampilan
                                                                    $('#current-profile-image').attr('src', '/Kitter/assets/images/default-profile.png');
                                                                    Swal.fire(
                                                                        'Dihapus!',
                                                                        'Gambar profil berhasil dihapus.',
                                                                        'success'
                                                                    );
                                                                },
                                                                error: function(xhr) {
                                                                    Swal.fire(
                                                                        'Gagal!',
                                                                        'Terjadi kesalahan saat menghapus gambar profil.',
                                                                        'error'
                                                                    );
                                                                }
                                                            });
                                                        }
                                                    });
                                                });
                                            });
                                        </script>
                        
                                        <!-- Change Password Tab -->
                                        <div id="change-password" class="tab-pane fade">
                                            <form action="{{ route('profile.changePassword') }}" method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <div class="input-group-edit">
                                                        <label for="current_password" class="form-label-password">Password Sebelumnya</label>
                                                        <input type="password" class="form-control-edit" id="current_password" name="current_password" required>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="input-group-edit">
                                                        <label for="new_password" class="form-label-password">New Password</label>
                                                        <input type="password" class="form-control-edit" id="new_password" name="new_password" required>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="input-group-edit">
                                                        <label for="confirm_password" class="form-label-password">Masukkan Ulang Password</label>
                                                        <input type="password" class="form-control-edit" id="confirm_password" name="new_password_confirmation" required>
                                                    </div>
                                                </div>
                                                <button type="submit" class="tombol-ubah">Ubah Password</button>
                                            </form>
                                        </div>
                                        
                                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                        <script>
                                            @if(session('success'))
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: 'Berhasil!',
                                                    text: '{{ session('success') }}',
                                                });
                                            @endif
                                        
                                            @if(session('error'))
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Gagal!',
                                                    text: '{{ session('error') }}',
                                                });
                                            @endif
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
                        
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

    <script>
        $(document).ready(function () {
            $('.nav-tabs .nav-link').on('click', function () {
                // Hapus kelas 'active' dari semua tab link
                $('.nav-tabs .nav-link').removeClass('active');
                // Tambahkan kelas 'active' pada tab yang dipilih
                $(this).addClass('active');
    
                // Sembunyikan semua tab-pane
                $('.tab-content .tab-pane').removeClass('show active');
                // Tampilkan tab-pane yang sesuai dengan link yang dipilih
                const target = $(this).attr('href');
                $(target).addClass('show active');
            });
        });
    </script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
