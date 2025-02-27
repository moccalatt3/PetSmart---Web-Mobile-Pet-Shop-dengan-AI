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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

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
                <a class="nav-link collapsed" href="{{ route('admin.produk') }}">
                    <i class="bi bi-box-seam"></i></i><span>Produk</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.transaksi') }}">
                    <i class="bi bi-wallet"></i><span>Transaksi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.layanan') }}">
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
            <h1>Layanan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Layanan</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Layanan</h5>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Kode Layanan</th>
                                    <th scope="col">Jenis Layanan</th>
                                    <th scope="col">Paket</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Pembayaran</th>
                                    <th scope="col">Status Layanan</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                    <tr data-kode-layanan="{{ $service->kode_layanan }}">
                                        <td>{{ $service->kode_layanan }}</td>
                                        <td>{{ $service->jenis_layanan }}</td>
                                        <td>{{ $service->paket_layanan }}</td>
                                        <td>Rp {{ number_format($service->harga_layanan, 0, ',', '.') }}</td>
                                        <td>{{ $service->status_pembayaran }}</td>
                                        <td>{{ $service->status_layanan }}</td>
                                        <td class="icon-action">
                                            <a href="#" class="melihat icon-view" title="Lihat"
                                                data-bs-toggle="modal" data-bs-target="#viewModal">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>

                                            <a href="#" class="mengedit icon-edit" title="Edit"
                                                data-bs-toggle="modal" data-bs-target="#editModal"
                                                data-kode-layanan="{{ $service->kode_layanan }}"
                                                data-status-pembayaran="{{ $service->status_pembayaran }}"
                                                data-status-layanan="{{ $service->status_layanan }}"
                                                data-pesan="{{ $service->pesan }}">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            <a href="#" class="icon-delete"
                                                data-kode-layanan="{{ $service->kode_layanan }}" title="Hapus">
                                                <i class="bi bi-trash-fill"></i>
                                            </a>

                                            <a href="#" class="icon-receipt" title="Bukti Pembayaran"
                                                data-bs-toggle="modal" data-bs-target="#receiptModal"
                                                data-bukti="{{ asset('storage/' . $service->bukti_pembayaran) }}">
                                                <i class="bi bi-credit-card-fill"></i>
                                            </a>

                                            <a href="#" class="icon-validasi" title="Selesai" onclick="confirmComplete('{{ $service->kode_layanan }}')">
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
                        <h5 class="card-title">Riwayat Layanan</h5>
                        <p>Daftar ini mencakup layanan yang sudah selesai diproses oleh pengguna, membantu dalam memantau dan mengelola data transaksi dengan lebih efisien.</p>

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th><b>Kode</b></th>
                                    <th>Nama</th>
                                    <th>Hewan</th>
                                    <th>Layanan</th>
                                    <th>Harga</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($riwayatLayanan as $riwayat)
                                    <tr>
                                        <td>{{ $riwayat->kode_layanan }}</td>
                                        <td>{{ $riwayat->nama_pelanggan }}</td>
                                        <td>{{ $riwayat->jenis_hewan }}</td>
                                        <td>{{ $riwayat->jenis_layanan }}</td>
                                        <td>Rp {{ number_format($riwayat->harga_layanan, 0, ',', '.') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($riwayat->tanggal_layanan)->format('d-m-Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal Bukti Pembayaran -->
        <div class="modal fade" id="receiptModal" tabindex="-1" aria-labelledby="receiptModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="receiptModalLabel">Bukti Pembayaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex justify-content-center align-items-center">
                        <img id="receiptImage" src="" alt="Bukti Pembayaran" class="img-fluid" style="max-width: 70%; height: auto;" />
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var receiptModal = document.getElementById('receiptModal');
                receiptModal.addEventListener('show.bs.modal', function (event) {
                    var button = event.relatedTarget; // Tombol yang memicu modal
                    var kodeLayanan = button.closest('tr').getAttribute('data-kode-layanan'); // Ambil kode layanan dari data-kode-layanan
                    
                    // Ambil bukti pembayaran dari server
                    fetch(`/admin/bukti-pembayaran/${kodeLayanan}`)
                        .then(response => response.json())
                        .then(data => {
                            var receiptImage = document.getElementById('receiptImage');
                            if (data.success) {
                                receiptImage.src = data.bukti_pembayaran; // Set URL gambar
                            } else {
                                receiptImage.src = ''; // Kosongkan jika tidak ada
                                alert(data.message); // Tampilkan pesan jika layanan tidak ditemukan
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                });
            });
        </script>

        <!-- Modal untuk melihat detail layanan -->
        <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewModalLabel">Detail Layanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modal-body" style="max-height: 400px; overflow-y: auto;">
                        <!-- Data layanan akan ditambahkan di sini -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Status Layanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm">
                            @csrf <!-- Token CSRF untuk keamanan -->
                            <input type="hidden" id="edit-kode-layanan" name="kode_layanan">
                            <!-- Input tersembunyi untuk kode layanan -->

                            <div class="mb-3">
                                <label for="edit-status-pembayaran" class="form-label">Status Pembayaran</label>
                                <select class="form-select" id="edit-status-pembayaran" name="status_pembayaran">
                                    <option value="belum lunas">Belum Lunas</option>
                                    <option value="lunas">Lunas</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="edit-status-layanan" class="form-label">Status Layanan</label>
                                <select class="form-select" id="edit-status-layanan" name="status_layanan">
                                    <option value="ditolak">Ditolak</option>
                                    <option value="diproses">Diproses</option>
                                    <option value="sudah siap">Sudah Siap</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="edit-pesan" class="form-label">Pesan</label>
                                <textarea class="form-control" id="edit-pesan" name ="pesan" rows="3"></textarea>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmComplete(kodeLayanan) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan menyelesaikan layanan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, selesaikan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch('/admin/layanan/selesaikan', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ kode_layanan: kodeLayanan })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire(
                                'Sukses!',
                                'Layanan berhasil diselesaikan dan dipindahkan ke riwayat.',
                                'success'
                            ).then(() => {
                                location.reload();
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
            var receiptModal = document.getElementById('receiptModal');
            receiptModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget; // Tombol yang memicu modal
                var bukti = button.getAttribute('data-bukti'); // Ambil URL gambar dari data-bukti
    
                // Update src gambar di modal
                var receiptImage = document.getElementById('receiptImage');
                receiptImage.src = bukti ? bukti : ''; // Set URL gambar
            });
        });
    </script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.icon-delete').forEach(icon => {
                icon.addEventListener('click', function(event) {
                    event.preventDefault(); // Mencegah default action dari <a>
                    const kodeLayanan = this.getAttribute('data-kode-layanan');
    
                    // Menggunakan SweetAlert2 untuk konfirmasi
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Data dengan kode " + kodeLayanan + " akan dihapus!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Kirim request penghapusan data jika dikonfirmasi
                            fetch(`/admin/layanan/${kodeLayanan}`, {
                                    method: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire(
                                            'Terhapus!',
                                            'Data berhasil dihapus.',
                                            'success'
                                        );
    
                                        // Menghapus baris tabel tanpa reload
                                        const row = document.querySelector(`tr[data-kode-layanan="${kodeLayanan}"]`);
                                        if (row) {
                                            row.remove();
                                        }
                                    } else {
                                        Swal.fire(
                                            'Gagal!',
                                            'Data gagal dihapus.',
                                            'error'
                                        );
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                    Swal.fire(
                                        'Error!',
                                        'Terjadi kesalahan saat menghapus data.',
                                        'error'
                                    );
                                });
                        }
                    });
                });
            });
        });
    </script>
    
    <script>
        $(document).ready(function() {
            // Set CSRF token untuk semua permintaan AJAX
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            $('.melihat').on('click', function() {
                var kodeLayanan = $(this).closest('tr').find('td:eq(0)').text();
    
                $.ajax({
                    url: '/layanan/detail/' + kodeLayanan,
                    method: 'GET',
                    success: function(data) {
                        $('#modal-body').empty();
    
                        if (data.length > 0) {
                            data.forEach(function(item) {
                                $('#modal-body').append(`
                                    <div class="service-item">
                                        <p><strong>Kode Layanan:</strong> ${item.kode_layanan}</p>
                                        <p><strong>Nama Pelanggan:</strong> ${item.nama_pelanggan}</p>
                                        <p><strong>Nomor Kontak:</strong> ${item.nomor_kontak}</p>
                                        <p><strong>Jenis Layanan:</strong> ${item.jenis_layanan}</p>
                                        <p><strong>Jenis Hewan:</strong> ${item.jenis_hewan}</p>
                                        <p><strong>Paket Layanan:</strong> ${item.paket_layanan}</p>
                                        <p><strong>Tanggal Layanan:</strong> ${item.tanggal_layanan}</p>
                                        <p><strong>Catatan Tambahan:</strong> ${item.catatan_tambahan}</p>
                                        <p><strong>Status Pembayaran:</strong> ${item.status_pembayaran}</p>
                                        <p><strong>Status Layanan:</strong> ${item.status_layanan}</p>
                                        <p><strong>Harga Layanan:</strong> Rp ${new Intl.NumberFormat('id-ID').format(item.harga_layanan)}</p>
                                        <p><strong>Bukti Pembayaran:</strong> ${item.bukti_pembayaran}</p>
                                        <p><strong>Pesan:</strong> ${item.pesan}</p>
                                        <hr>
                                    </div>
                                `);
                            });
    
                            $('#viewModal').modal('show');
                        } else {
                            alert('Data tidak ditemukan.');
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat mengambil data layanan.');
                    }
                });
            });
    
            $('.mengedit').on('click', function() {
                var kodeLayanan = $(this).data('kode-layanan');
                var statusPembayaran = $(this).data('status-pembayaran');
                var statusLayanan = $(this).data('status-layanan');
                var pesan = $(this).data('pesan');
    
                $('#edit-kode-layanan').val(kodeLayanan);
                $('#edit-status-pembayaran').val(statusPembayaran);
                $('#edit-status-layanan').val(statusLayanan);
                $('#edit-pesan').val(pesan);
    
                $('#editModal').modal('show');
            });
    
            $('#editForm').on('submit', function(e) {
                e.preventDefault();
    
                $.ajax({
                    url: '/admin/transaksi/updateStatus',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.success) {
                            alert(response.message);
                            location.reload();
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(xhr) {
                        alert('Terjadi kesalahan: ' + xhr.responseJSON.message);
                    }
                });
            });
        });
    </script>
    
    <!-- Vendor JS Files -->
    <script src="{{ asset('tema/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('tema/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('tema/assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('tema/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('tema/assets/vendor/quill/quill.js') }}"></script>
    <script src="{{ asset('tema/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('tema/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('tema/assets/vendor/php-email-form/validate.js') }}"></script>
    
    <!-- Template Main JS File -->
    <script src="{{ asset('tema/assets/js/main.js') }}"></script>
    

</body>

</html>
