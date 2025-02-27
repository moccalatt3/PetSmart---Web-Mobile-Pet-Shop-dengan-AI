<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin Petsmart.Id</title>
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
                <a class="nav-link collapsed" href="{{ route('admin.datapengguna') }}">
                    <i class="bi bi-person-lines-fill"></i><span>Pengguna</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.produk') }}">
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
                <a class="nav-link collapsed" href="users-profile.html">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li><!-- End Profile Page Nav -->

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

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <!-- Menggunakan Flexbox untuk menata elemen di dalam card-body -->
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Data Produk</h5>
                                <a href="#" class="icon-settings" title="Tambah Produk" data-bs-toggle="modal"
                                    data-bs-target="#tambahProdukModal">
                                    <i class="bi bi-plus-circle"></i>
                                </a>
                            </div>
                            <div class="modal fade" id="tambahProdukModal" tabindex="-1"
                                aria-labelledby="tambahProdukLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="tambahProdukLabel">Tambah Produk</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.produk.tambah') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="nama_produk" class="form-label">Nama Produk</label>
                                                    <input type="text" class="form-control" id="nama_produk"
                                                        name="nama_produk" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="deskripsi_produk" class="form-label">Deskripsi
                                                        Produk</label>
                                                    <textarea class="form-control" id="deskripsi_produk" name="deskripsi_produk" rows="3" required></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="harga_produk" class="form-label">Harga Produk</label>
                                                    <input type="number" class="form-control" id="harga_produk"
                                                        name="harga_produk" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="stok_produk" class="form-label">Stok Produk</label>
                                                    <input type="number" class="form-control" id="stok_produk"
                                                        name="stok_produk" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="kategori_produk" class="form-label">Kategori
                                                        Produk</label>
                                                    <select class="form-select" id="kategori_produk"
                                                        name="kategori_produk" required>
                                                        <option value="" disabled selected>Pilih Kategori
                                                        </option>
                                                        <option value="Makanan Hewan">Makanan Hewan</option>
                                                        <option value="Minuman Hewan">Minuman Hewan</option>
                                                        <option value="Aksesoris Hewan">Aksesoris Hewan</option>
                                                        <option value="Vitamin dan Obat Hewan">Vitamin dan Obat Hewan
                                                        </option>
                                                        <option value="Mainan Hewan">Mainan Hewan</option>
                                                        <option value="Kandang dan Tempat Tidur">Kandang dan Tempat
                                                            Tidur</option>
                                                        <option value="Peralatan Grooming">Peralatan Grooming</option>
                                                        <option value="Perlengkapan Makanan & Minuman">Perlengkapan
                                                            Makanan & Minuman</option>
                                                        <option value="Pasir dan Toilet Hewan">Pasir dan Toilet Hewan
                                                        </option>
                                                        <option value="Lain-lain">Lain-lain</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="status_produk" class="form-label">Status
                                                        Produk</label>
                                                    <select class="form-select" id="status_produk"
                                                        name="status_produk" required>
                                                        <option value="Tersedia">Tersedia</option>
                                                        <option value="Tidak Tersedia">Tidak Tersedia</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="gambar_produk" class="form-label">Gambar
                                                        Produk</label>
                                                    <input type="file" class="form-control" id="gambar_produk"
                                                        name="gambar_produk">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Simpan Produk</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Table with stripped rows -->
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Kode Produk</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Stok</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produk as $item)
                                        <tr>
                                            <th scope="row">{{ $item->kode_produk }}</th>
                                            <td>{{ $item->nama_produk }}</td>
                                            <td>{{ $item->kategori_produk }}</td>
                                            <td>Rp {{ number_format($item->harga_produk, 0, ',', '.') }}</td>
                                            <td>{{ $item->stok_produk }}</td>
                                            <td>{{ $item->status_produk }}</td>
                                            <td class="icon-action">
                                                <a href="#" class="melihat icon-view" title="Lihat"
                                                    data-bs-toggle="modal" data-bs-target="#viewProdukModal"
                                                    data-kode="{{ $item->kode_produk }}"
                                                    data-nama="{{ $item->nama_produk }}"
                                                    data-kategori="{{ $item->kategori_produk }}"
                                                    data-harga="{{ $item->harga_produk }}"
                                                    data-stok="{{ $item->stok_produk }}"
                                                    data-status="{{ $item->status_produk }}"
                                                    data-deskripsi="{{ $item->deskripsi_produk }}"
                                                    data-gambar="{{ asset('storage/' . $item->gambar_produk) }}">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>

                                                <a href="#" class="mengedit icon-edit" title="Edit"
                                                    data-id="{{ $item->id_produk }}"
                                                    data-nama="{{ $item->nama_produk }}"
                                                    data-deskripsi="{{ $item->deskripsi_produk }}"
                                                    data-harga="{{ $item->harga_produk }}"
                                                    data-stok="{{ $item->stok_produk }}"
                                                    data-kategori="{{ $item->kategori_produk }}"
                                                    data-status="{{ $item->status_produk }}">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a href="#" class="menghapus icon-delete" title="Hapus"
                                                    data-id="{{ $item->id_produk }}">
                                                    <i class="bi bi-trash3-fill"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Modal View Produk -->
                            <div class="modal fade" id="viewProdukModal" tabindex="-1"
                                aria-labelledby="viewProdukModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="viewProdukModalLabel">Detail Produk</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Tambahkan bagian gambar produk di sini -->
                                            <div class="text-center mb-3">
                                                <img id="viewGambarProduk" src="" alt="Gambar Produk"
                                                    style="max-width: 200px; max-height: 200px; object-fit: cover;">
                                            </div>
                                            <p><strong>Kode Produk:</strong> <span id="viewKodeProduk"></span></p>
                                            <p><strong>Nama Produk:</strong> <span id="viewNamaProduk"></span></p>
                                            <p><strong>Kategori:</strong> <span id="viewKategoriProduk"></span></p>
                                            <p><strong>Harga:</strong> Rp <span id="viewHargaProduk"></span></p>
                                            <p><strong>Stok:</strong> <span id="viewStokProduk"></span></p>
                                            <p><strong>Status:</strong> <span id="viewStatusProduk"></span></p>
                                            <p><strong>Deskripsi:</strong> <span id="viewDeskripsiProduk"></span></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Edit Produk -->
                            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form id="editForm" action="{{ route('admin.produk.update') }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit Produk</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="id_produk" id="id_produk">
                                                <div class="mb-3">
                                                    <label for="nama_produk" class="form-label">Nama Produk</label>
                                                    <input type="text" class="form-control" id="nama_produk"
                                                        name="nama_produk" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="deskripsi_produk" class="form-label">Deskripsi
                                                        Produk</label>
                                                    <textarea class="form-control" id="deskripsi_produk" name="deskripsi_produk" rows="3" required></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="harga_produk" class="form-label">Harga Produk</label>
                                                    <input type="number" class="form-control" id="harga_produk"
                                                        name="harga_produk" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="stok_produk" class="form-label">Stok Produk</label>
                                                    <input type="number" class="form-control" id="stok_produk"
                                                        name="stok_produk" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="kategori_produk" class="form-label">Kategori
                                                        Produk</label>
                                                    <select class="form-select" id="kategori_produk"
                                                        name="kategori_produk" required>
                                                        <option value="" disabled selected>Pilih Kategori
                                                        </option>
                                                        <option value="Makanan Hewan">Makanan Hewan</option>
                                                        <option value="Minuman Hewan">Minuman Hewan</option>
                                                        <option value="Aksesoris Hewan">Aksesoris Hewan</option>
                                                        <option value="Vitamin dan Obat Hewan">Vitamin dan Obat Hewan
                                                        </option>
                                                        <option value="Mainan Hewan">Mainan Hewan</option>
                                                        <option value="Kandang dan Tempat Tidur">Kandang dan Tempat
                                                            Tidur</option>
                                                        <option value="Peralatan Grooming">Peralatan Grooming</option>
                                                        <option value="Perlengkapan Makanan & Minuman">Perlengkapan
                                                            Makanan & Minuman</option>
                                                        <option value="Pasir dan Toilet Hewan">Pasir dan Toilet Hewan
                                                        </option>
                                                        <option value="Lain-lain">Lain-lain</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="status_produk" class="form-label">Status
                                                        Produk</label>
                                                    <select class="form-select" id="status_produk"
                                                        name="status_produk" required>
                                                        <option value="Tersedia">Tersedia</option>
                                                        <option value="Tidak Tersedia">Tidak Tersedia</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="gambar_produk" class="form-label">Gambar
                                                        Produk</label>
                                                    <input type="file" class="form-control" id="gambar_produk"
                                                        name="gambar_produk">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan
                                                    Perubahan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <script>
                                // Event listener untuk mengisi data modal edit
                                document.querySelectorAll('.mengedit').forEach(function(editButton) {
                                    editButton.addEventListener('click', function() {
                                        const id = this.getAttribute('data-id');
                                        const nama = this.getAttribute('data-nama');
                                        const deskripsi = this.getAttribute('data-deskripsi');
                                        const harga = this.getAttribute('data-harga');
                                        const stok = this.getAttribute('data-stok');
                                        const kategori = this.getAttribute('data-kategori');
                                        const status = this.getAttribute('data-status');

                                        document.getElementById('id_produk').value = id;
                                        document.getElementById('nama_produk').value = nama;
                                        document.getElementById('deskripsi_produk').value = deskripsi;
                                        document.getElementById('harga_produk').value = harga;
                                        document.getElementById('stok_produk').value = stok;
                                        document.getElementById('kategori_produk').value = kategori;
                                        document.getElementById('status_produk').value = status;

                                        // Tampilkan modal
                                        $('#editModal').modal('show');
                                    });
                                });
                            </script>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelectorAll('.menghapus').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const produkId = this.dataset.id; // Ambil id produk dari data-id
                Swal.fire({
                    title: 'Yakin mau dihapus?',
                    text: "Datanya engga bisa dibalikin lo!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Lakukan request untuk menghapus produk
                        fetch(`/admin/produk/hapus/${produkId}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Content-Type': 'application/json',
                                }
                            })
                            .then(response => {
                                if (response.ok) {
                                    Swal.fire(
                                        'Terhapus!',
                                        'Produk telah dihapus.',
                                        'success'
                                    ).then(() => {
                                        location
                                            .reload(); // Reload halaman setelah produk dihapus
                                    });
                                } else {
                                    Swal.fire(
                                        'Gagal!',
                                        'Terjadi kesalahan saat menghapus produk.',
                                        'error'
                                    );
                                }
                            });
                    }
                });
            });
        });
    </script>

    <script>
        $(document).on('click', '.melihat', function() {
            var kodeProduk = $(this).data('kode');
            var namaProduk = $(this).data('nama');
            var kategoriProduk = $(this).data('kategori');
            var hargaProduk = $(this).data('harga');
            var stokProduk = $(this).data('stok');
            var statusProduk = $(this).data('status');
            var deskripsiProduk = $(this).data('deskripsi');
            var gambarProduk = $(this).data('gambar');

            // Menampilkan data produk di modal
            $('#viewKodeProduk').text(kodeProduk);
            $('#viewNamaProduk').text(namaProduk);
            $('#viewKategoriProduk').text(kategoriProduk);
            $('#viewHargaProduk').text(hargaProduk.toLocaleString('id-ID', {
                minimumFractionDigits: 0
            }));
            $('#viewStokProduk').text(stokProduk);
            $('#viewStatusProduk').text(statusProduk);
            $('#viewDeskripsiProduk').text(deskripsiProduk);

            // Menampilkan gambar produk di modal
            $('#viewGambarProduk').attr('src', gambarProduk);
        });
    </script>

    <script>
        // Success alert
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: '{{ session('success') }}',
                timer: 3000, // Auto close after 3 seconds
                showConfirmButton: false
            });
        @endif

        // Error alert
        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session('error') }}',
                timer: 3000, // Auto close after 3 seconds
                showConfirmButton: false
            });
        @endif
    </script>

</body>

</html>
