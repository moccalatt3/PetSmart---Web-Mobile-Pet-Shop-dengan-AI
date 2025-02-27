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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

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
                <a class="nav-link collapsed" href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.datapengguna') }}">
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
            <h1>Pengguna</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Pengguna</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Pengguna</h5>

                        <!-- Table with stripped rows -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengguna as $index => $user)
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="icon-action">
                                            <a href="#" class="melihat icon-view" title="Lihat">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                            <a href="#" class="mengedit icon-edit" title="Edit"
                                                data-bs-toggle="modal" data-bs-target="#ubahPasswordModal"
                                                data-id="{{ $user->id_pengguna }}">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="#" class="menghapus icon-delete" title="Hapus"
                                                data-id="{{ $user->id_pengguna }}">
                                                <i class="bi bi-trash3-fill"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- Modal Ubah Password -->
        <div class="modal fade" id="ubahPasswordModal" tabindex="-1" aria-labelledby="ubahPasswordModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ubahPasswordModalLabel">Ubah Password Pengguna</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formUbahPassword">
                            @csrf
                            <input type="hidden" name="id_pengguna" id="id_pengguna">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password Baru</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Ubah Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Event listener untuk tautan hapus
            document.querySelectorAll('.menghapus').forEach(function(deleteLink) {
                deleteLink.addEventListener('click', function(e) {
                    e.preventDefault(); // Mencegah tindakan default

                    const userId = this.getAttribute('data-id');

                    // Konfirmasi menggunakan SweetAlert2
                    Swal.fire({
                        title: 'Konfirmasi Hapus',
                        text: "Anda yakin ingin menghapus pengguna ini?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Hapus',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Jika pengguna mengkonfirmasi, kirim permintaan hapus
                            fetch(`/admin/pengguna/${userId}/hapus`, {
                                    method: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector(
                                            'input[name="_token"]').value
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    // Tampilkan SweetAlert berdasarkan hasil
                                    if (data.success) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Dihapus',
                                            text: 'Pengguna berhasil dihapus!',
                                        }).then(() => {
                                            // Reload halaman setelah menghapus
                                            window.location.reload();
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Gagal',
                                            text: data.message,
                                        });
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal',
                                        text: 'Terjadi kesalahan saat menghapus pengguna.',
                                    });
                                });
                        }
                    });
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Event listener untuk tautan edit
            document.querySelectorAll('.mengedit').forEach(function(editLink) {
                editLink.addEventListener('click', function() {
                    const userId = this.getAttribute('data-id');
                    document.getElementById('id_pengguna').value = userId;
                });
            });

            // Event listener untuk form ubah password
            document.getElementById('formUbahPassword').addEventListener('submit', function(e) {
                e.preventDefault(); // Mencegah form dari pengiriman default

                const formData = new FormData(this);
                const userId = formData.get('id_pengguna');

                // Kirim data ke server menggunakan Fetch API
                fetch(`/admin/pengguna/${userId}/ubah-password`, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Tampilkan SweetAlert berdasarkan hasil
                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: 'Password berhasil diubah!',
                            }).then(() => {
                                // Arahkan ke halaman datapengguna setelah modal ditutup
                                window.location.href = data.redirect;
                            });
                            // Tutup modal
                            $('#ubahPasswordModal').modal('hide');
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: data.message,
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Terjadi kesalahan saat mengubah password.',
                        });
                    });
            });
        });
    </script>

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
