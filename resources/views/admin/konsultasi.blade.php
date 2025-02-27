<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin PetSmart.Id</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('tema/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('tema/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('tema/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('tema/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('tema/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('tema/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('tema/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('tema/assets/css/style.css') }}" rel="stylesheet">


</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('admin.dashboard') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('tema/assets/img/logonav.png') }}" alt="navlog" class="navlog">
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed " href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.datapengguna') }}">
                    <i class="bi bi-person-lines-fill"></i><span>Pengguna</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.produk') }}">
                    <i class="bi bi-box-seam"></i><span>Produk</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.transaksi') }}">
                    <i class="bi bi-wallet"></i><span>Transaksi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.layanan') }}">
                    <i class="bi bi-clipboard-plus"></i><span>Layanan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.konsultasi') }}">
                    <i class="bi bi-chat-dots"></i><span>Konsultasi</span>
                </a>
            </li>

            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-login.html">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </a>
            </li><!-- End Login Page Nav -->

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <section class="section chat">
                <div class="container-chat">
                    <div class="row-chat">

                        <!-- Sisi Kiri -->
                        <div class="bordered-column">
                            <!-- Tombol Search -->
                            <div class="search-chat mb-3">
                                
                            </div>

                            <!-- Daftar Pengguna -->
                            <div class="pengguna-list">
                                @foreach ($users as $user)
                                    <a href="{{ route('admin.konsultasi.detail', $user->id_pengguna) }}"
                                        class="pengguna-item d-flex align-items-center mb-3">
                                        <img src="{{ $user->image_profil ? asset('storage/' . $user->image_profil) : '/Kitter/assets/images/default-profile.png' }}"
                                            alt="User  Image" class="user-img me-3">
                                        <div class="user-info">
                                            <p class="admin-name mb-1">{{ $user->name }}</p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <!-- Sisi Kanan -->
                        <div class="col-md-8">
                            @if (isset($pengguna) && isset($messages))
                                <!-- Jika pengguna dipilih -->
                                <div class="chat-header d-flex align-items-center mb-3">
                                    <img src="{{ $pengguna->image_profil ? asset('storage/' . $pengguna->image_profil) : '/Kitter/assets/images/default-profile.png' }}"
                                        alt="User  Image" class="user-img me-3">
                                    <div class="user-info">
                                        <p class="admin-name mb-1">{{ $pengguna->name }}</p>

                                    </div>
                                </div>

                                <div class="chat-box mb-3">
                                    @foreach ($messages as $message)
                                        @if ($message->is_from_admin)
                                            <div class="admin mb-2 d-flex justify-content-end">
                                                <div>
                                                    <div class="admin-message">
                                                        {{ $message->message }}
                                                    </div>
                                                    <small
                                                        class="chat-time text-muted">{{ $message->created_at->format('H:i') }}</small>
                                                </div>
                                            </div>
                                        @else
                                            <div class="pengguna mb-2 d-flex justify-content-start">
                                                <div>
                                                    <div class="pengguna-message">
                                                        {{ $message->message }}
                                                    </div>
                                                    <small
                                                        class="chat-time text-muted">{{ $message->created_at->format('H:i') }}</small>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>

                                <form action="{{ route('admin.konsultasi.kirim') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="pengguna_id" value="{{ $pengguna->id_pengguna }}">
                                    <div class="input-group-kirim">
                                        <input type="text" name="message" class="form-control-kirim"
                                            placeholder="Ketik pesan..." required>
                                        <button type="submit" class="tombol-chat">Kirim</button>
                                    </div>
                                </form>
                            @else
                                <!-- Jika tidak ada pengguna dipilih -->
                                <div class="alert alert-info">
                                    Pilih pengguna dari daftar untuk memulai percakapan.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('tema/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('tema/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('tema/assets/vendor/chart.js') }}/chart.umd.js')}}"></script>
    <script src="{{ asset('tema/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('tema/assets/vendor/quill/quill.js') }}"></script>
    <script src="{{ asset('tema/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('tema/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('tema/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('tema/assets/js/main.js') }}"></script>

</body>

</html>
