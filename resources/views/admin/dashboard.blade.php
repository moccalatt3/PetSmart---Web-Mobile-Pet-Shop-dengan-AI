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

                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge-notifikasi">{{ $notifikasi->count() }}</span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have {{ $notifikasi->count() }} new notifications
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        @foreach ($notifikasi as $item)
                            <li class="notification-item">
                                <div>
                                    <h4>{{ $item['nama_pengguna'] }}</h4>
                                    <p>{{ $item['jenis_notifikasi'] }}</p>
                                    <p>{{ $item['kode'] }}</p>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        @endforeach
                        <li class="dropdown-footer">
                            <a href="#">Show all notifications</a>
                        </li>
                    </ul><!-- End Notification Dropdown Items -->
                </li><!-- End Notification Nav -->

                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-chat-left-text"></i>
                        <span class="badge-chat">{{ $chatNotifikasi->count() }}</span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                        <li class="dropdown-header">
                            You have {{ $chatNotifikasi->count() }} new messages
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        @foreach ($chatNotifikasi as $chat)
                            <li class="message-item">
                                <a href="#">
                                    <div>
                                        <h4>{{ $chat['nama_pengguna'] }}</h4>
                                        <p>{{ $chat['isi_chat'] }}</p>
                                        <p>{{ $chat['waktu_chat'] }}</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        @endforeach

                        <li class="dropdown-footer">
                            <a href="#">Show all messages</a>
                        </li>
                    </ul><!-- End Messages Dropdown Items -->
                </li>

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="/tema/assets/img/admin.png" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block ps-2">Admin</span>
                    </a>

                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="{{ route('admin.dashboard') }}">
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
                <a class="nav-link collapsed" href="{{ route('admin.konsultasi') }}">
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
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">

                        <div class="col-xxl-4 col-xl-12">

                            <div class="card info-card customers-card">

                                <div class="card-body">
                                    <h5 class="card-title">Pengguna <span>| Today</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person-check"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $totalUsers }}</h6> <!-- Menampilkan jumlah pengguna -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title">Transaksi <span>| Today</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-wallet2"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $jumlahTransaksi }}</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">

                                <div class="card-body">
                                    <h5 class="card-title">Layanan <span>| Today</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-clipboard-check"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $jumlahLayanan }}</h6> <!-- Menampilkan jumlah layanan -->
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->



                        <!-- Top Selling -->
                        <div class="col-12">
                            <div class="card top-selling overflow-auto">

                                <div class="card-body pb-0">
                                    <h5 class="card-title">Top Selling <span>| Today</span></h5>

                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">Gambar</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Stok</th>
                                                <th scope="col">Terjual</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($topSellingProducts as $item)
                                                <tr>
                                                    <th scope="row"><a href="#"><img
                                                                src="{{ asset('storage/' . $item->gambar_produk) }}"
                                                                alt="{{ $item->nama_produk }}"
                                                                style="width: 50px; height: 50px;"></a></th>
                                                    <td><a href="#"
                                                            class="judul-produk">{{ $item->nama_produk }}</a></td>
                                                    <td>Rp {{ number_format($item->harga_produk, 0, ',', '.') }}</td>
                                                    <td class="fw-bold">{{ $item->stok_produk }}</td>
                                                    <td>{{ $item->total_terjual }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div><!-- End Top Selling -->
                    </div>
                </div><!-- End Left side columns -->

                <!-- Right side columns -->
                <div class="col-lg-4">

                    <div class="card">

                        <div class="card-body pb-0">
                            <h5 class="card-title">Layanan Tersedia <span>| Today</span></h5>

                            <div class="news">
                                <div class="post-item clearfix">
                                    <img src="/Kitter/assets/images/adminlayanan1.jpg" alt="">
                                    <h4><a href="#">Grooming</a></h4>
                                    <p>Layanan grooming untuk menjaga kebersihan dan kesehatan bulu hewan peliharaan
                                        anda.</p>
                                </div>

                                <div class="post-item clearfix">
                                    <img src="/Kitter/assets/images/adminlayanan2.jpg" alt="">
                                    <h4><a href="#">Pelatihan</a></h4>
                                    <p>Pelatihan khusus untuk meningkatkan kemampuan dan perilaku hewan peliharaan.</p>
                                </div>

                                <div class="post-item clearfix">
                                    <img src="/Kitter/assets/images/adminlayanan3.jpg" alt="">
                                    <h4><a href="#">Perawatan</a></h4>
                                    <p>Layanan kesehatan untuk memastikan hewan peliharaan anda tetap sehat dan bugar.
                                    </p>
                                </div>

                            </div><!-- End sidebar recent posts-->

                        </div>
                    </div>

                </div><!-- End Right side columns -->

            </div>
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
