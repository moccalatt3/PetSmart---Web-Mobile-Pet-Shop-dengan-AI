<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin PetSmart.Id</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">


    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-JUHRfAu0D7wRlV/miHkF1f+O6jZfXsKxnY5UwT3DaBqKGlzz+AnRf4FOmA7LTlRE" crossorigin="anonymous">


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

        {{-- <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div> --}}

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
                <a class="nav-link collapsed" href="{{ route('admin.produk') }}">
                    <i class="bi bi-box-seam"></i><span>Produk</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.transaksi') }}">
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
            <h1>Transaksi</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Transaksi</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Transaksi</h5>

                    <!-- Tabel dengan baris berstrip -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Kode Transaksi</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Status Pembayaran</th>
                                <th scope="col">Status Produk</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi as $data)
                                <tr>
                                    <th scope="row">{{ $data->kode_transaksi }}</th>
                                    <td>{{ number_format($data->total_harga, 0, ',', '.') }}</td>
                                    <td>{{ ucfirst($data->status_pembayaran) }}</td>
                                    <td>{{ ucfirst($data->status_produk) }}</td>
                                    <td class="icon-action">

                                        <a href="#" class="melihat icon-view" title="Lihat"
                                            data-bs-toggle="modal" data-bs-target="#viewModal"
                                            data-kode="{{ $data->kode_transaksi }}"
                                            data-status-produk="{{ $data->status_produk }}"
                                            data-pesan="{{ $data->pesan }}">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>

                                        <!-- Edit Icon -->
                                        <a href="#" class="mengedit icon-edit" title="Edit"
                                            data-bs-toggle="modal" data-bs-target="#editModal"
                                            data-kode="{{ $data->kode_transaksi }}"
                                            data-status="{{ $data->status_pembayaran }}"
                                            data-status-produk="{{ $data->status_produk }}"
                                            data-pesan="{{ $data->pesan }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <a href="javascript:void(0);"
                                            onclick="confirmDelete('{{ $data->kode_transaksi }}')"
                                            class="menghapus icon-delete" title="Hapus">
                                            <i class="bi bi-trash3-fill"></i>
                                        </a>

                                        <a href="#" class="icon-receipt" title="Bukti Pembayaran"
                                            data-bs-toggle="modal" data-bs-target="#receiptModal"
                                            data-bukti="{{ asset('storage/' . $data->bukti_pembayaran) }}">
                                            <i class="bi bi-credit-card-fill"></i>
                                        </a>
                                        
                                        <a href="javascript:void(0);" class="icon-validasi" title="Selesai" onclick="confirmComplete()">
                                            <i class="bi bi-check-circle-fill"></i>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Riwayat Transaksi</h5>
                    <p>Daftar ini mencakup transaksi yang sudah selesai diproses oleh pengguna, membantu dalam memantau dan mengelola data transaksi dengan lebih efisien.</p>
            
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th><b>Kode</b></th>
                                <th>Nama</th>
                                <th>Produk</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($riwayatTransaksi as $item)
                                <tr>
                                    <td>{{ $item->kode_transaksi }}</td>
                                    <td>{{ $item->nama_pengguna }}</td>
                                    <td>{{ $item->nama_produk }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td>{{ number_format($item->harga_produk, 0, ',', '.') }}</td>
                                    <td>{{ number_format($item->total_harga, 0, ',', '.') }}</td>
                                    <td>{{ $item->created_at->format('Y/m/d') }}</td> <!-- Format tanggal -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                </div>
            </div>
        </section>


        <div class="modal fade" id="receiptModal" tabindex="-1" aria-labelledby="receiptModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="receiptModalLabel">Bukti Pembayaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img id="receiptImage" src="" alt="Bukti Pembayaran" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewModalLabel">Detail Transaksi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Jumlah</th>
                                    <th>Harga Produk</th>
                                    <th>Total Harga</th>
                                    <th>Status Pembayaran</th>
                                    <th>Status Produk</th> <!-- Tambahkan kolom Status Produk -->
                                    <th>Pesan</th> <!-- Tambahkan kolom Pesan -->
                                </tr>
                            </thead>
                            <tbody id="transactionDetails">
                                <!-- Data transaksi akan dimasukkan di sini -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Transaksi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm" method="POST"
                            action="{{ route('admin.transaksi.updateStatusTransaksi') }}">
                            @csrf
                            <input type="hidden" name="kode_transaksi" id="editKodeTransaksi">

                            <div class="mb-3">
                                <label for="editStatusPembayaran" class="form-label">Status Pembayaran</label>
                                <select class="form-select" id="editStatusPembayaran" name="status_pembayaran"
                                    required>
                                    <option value="lunas">Lunas</option>
                                    <option value="belum lunas">Belum Lunas</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="editStatusProduk" class="form-label">Status Produk</label>
                                <select class="form-select" id="editStatusProduk" name="status_layanan" required>
                                    <option value="diproses">Diproses</option>
                                    <option value="ditolak">Ditolak</option>
                                    <option value="sudah siap">Sudah Siap</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="editPesan" class="form-label">Pesan</label>
                                <textarea class="form-control" id="editPesan" name="pesan" rows="3"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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


    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmComplete() {
            // Menggunakan SweetAlert2 untuk konfirmasi
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan memindahkan data ini ke riwayat!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, selesaikan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Mengirimkan permintaan AJAX ke server
                    fetch('/admin/transaksi/selesaikan', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Token CSRF untuk keamanan
                        },
                        body: JSON.stringify({})
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Menggunakan SweetAlert2 untuk notifikasi sukses
                            Swal.fire(
                                'Sukses!',
                                'Transaksi berhasil dipindahkan ke riwayat.',
                                'success'
                            ).then(() => {
                                location.reload(); // Reload halaman untuk memperbarui tampilan
                            });
                        } else {
                            Swal.fire(
                                'Terjadi kesalahan!',
                                data.message,
                                'error'
                            );
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire(
                            'Terjadi kesalahan!',
                            'Kesalahan saat memproses permintaan.',
                            'error'
                        );
                    });
                }
            });
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editModal = document.getElementById('editModal');
            editModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget; // Button that triggered the modal
                const kodeTransaksi = button.getAttribute('data-kode');
                const statusPembayaran = button.getAttribute('data-status');
                const statusProduk = button.getAttribute('data-status-produk');
                const pesan = button.getAttribute('data-pesan');

                const modalKodeTransaksi = editModal.querySelector('#editKodeTransaksi');
                const modalStatusPembayaran = editModal.querySelector('#editStatusPembayaran');
                const modalStatusProduk = editModal.querySelector('#editStatusProduk');
                const modalPesan = editModal.querySelector('#editPesan');

                modalKodeTransaksi.value = kodeTransaksi;
                modalStatusPembayaran.value = statusPembayaran;
                modalStatusProduk.value = statusProduk;
                modalPesan.value = pesan;
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var receiptModal = document.getElementById('receiptModal');
            receiptModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var bukti = button.getAttribute('data-bukti');

                // Update the receipt image src
                var receiptImage = document.getElementById('receiptImage');
                receiptImage.src = bukti;
            });
        });
    </script>


    <script>
        function confirmDelete(kodeTransaksi) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data transaksi dengan kode " + kodeTransaksi + " akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform AJAX DELETE request
                    $.ajax({
                        url: '/admin/transaksi/hapus/' + kodeTransaksi,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire(
                                'Terhapus!',
                                'Data transaksi telah dihapus.',
                                'success'
                            ).then(() => {
                                location.reload(); // Reload the page to update the table
                            });
                        },
                        error: function(xhr) {
                            Swal.fire(
                                'Error!',
                                'Terjadi kesalahan saat menghapus data.',
                                'error'
                            );
                        }
                    });
                }
            });
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var viewModal = document.getElementById('viewModal');

            viewModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var kodeTransaksi = button.getAttribute('data-kode');

                // Kosongkan konten tabel setiap kali modal dibuka
                var transactionDetails = document.getElementById('transactionDetails');
                transactionDetails.innerHTML = '';

                // Fetch all transactions with the same kode_transaksi
                fetch(`/admin/transaksi/${kodeTransaksi}`)
                    .then(response => response.json())
                    .then(data => {
                        // Iterasi dan tampilkan setiap transaksi beserta status_produk dan pesan
                        data.forEach(transaction => {
                            var row = document.createElement('tr');

                            row.innerHTML = `
                                <td>${transaction.nama_produk}</td>
                                <td>${transaction.jumlah}</td>
                                <td>${transaction.harga_produk.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' })}</td>
                                <td>${transaction.total_harga.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' })}</td>
                                <td>${transaction.status_pembayaran.charAt(0).toUpperCase() + transaction.status_pembayaran.slice(1)}</td>
                                <td>${transaction.status_produk ? transaction.status_produk.charAt(0).toUpperCase() + transaction.status_produk.slice(1) : '-'}</td> <!-- Tampilkan Status Produk -->
                                <td>${transaction.pesan ? transaction.pesan : '-'}</td> <!-- Tampilkan Pesan -->
                            `;
                            transactionDetails.appendChild(row);
                        });
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qQ8bTO9GdzLzQ/R0C6It3Ma+SaYXfQuakZR4DyglHMSjcV4FVn60dRxvg6ED9kp2" crossorigin="anonymous">
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
