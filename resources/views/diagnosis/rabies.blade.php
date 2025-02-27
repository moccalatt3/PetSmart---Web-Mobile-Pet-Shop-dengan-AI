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
                    <button class="action-btn" aria-label="favorites"
                        onclick="window.location.href='{{ route('rating') }}'">
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

    <div id="survey-content">
        <div class="body-survey">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-12 body-element">
                    <img src="{{ asset('Kitter/assets/images/rabies.png') }}" class="img-fluid" alt="Rabies Diagnosis">

                    <h1 class="head-intro">
                        Diagnosis Rabies
                    </h1>

                    <p class="text-description">
                        Diagnosis Rabies membantu kamu mengetahui kondisi kesehatan hewan peliharaanmu terkait rabies.
                        Yuk, ikuti tes ini untuk memastikan hewanmu dalam kondisi sehat!
                    </p>

                    <button type="button" class="tombol-mulai" onclick="showNewContent()">Mulai</button>
                </div>
            </div>
        </div>
    </div>

    <div id="check-content" style="display: none;">
        <div class="body-check">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-12 body-element">
                    <div class="quiestion-area pt-3">
                        <b>
                            <p class="text-left question-intro-description-dr">
                                Apabila hewan kamu memiliki gejala ini segera hubungi dokter hewan untuk penanganan
                                lebih lanjut.
                            </p>
                        </b>
                    </div>
                    <div class="answer-area">
                        <div class="custom-control custom-radio form-check">
                            <label for="agreemente" class="container-radio">
                                <input type="radio" name="agreement" id="agreemente"
                                    class="custom-control-input box-control-input" value="true">
                                <span class="checkmark">Ya, saya setuju</span>
                            </label>
                        </div>
                        <div class="custom-control custom-radio form-check">
                            <label for="agreement1" class="container-radio">
                                <form action="{{ route('diagnosis') }}" method="GET" id="redirectForm">
                                    <input type="radio" name="agreement" id="agreement1"
                                        class="custom-control-input box-control-input" value="false"
                                        onchange="document.getElementById('redirectForm').submit()">
                                    <span class="checkmark">Tidak, saya tidak setuju</span>
                                </form>
                            </label>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="survey-rabies" style="display: none;">
        <div class="body-survey-rabies">
            <div class="col-12 col-md-8 body-element">
                <div class="pagination p5 flex">
                    <ul id="pagination-indicator">
                        <!-- Pagination dots will be inserted dynamically -->
                    </ul>
                </div>
                <h6 class="sub-head">Pertanyaan</h6>
                <div class="question-area">
                    <h5 class="question-head-bold" id="question-text"></h5>
                    <small class="form-text text-muted"></small>

                    <!-- Radio Button Options -->
                    <div class="custom-control custom-radio">
                        <label for="question_0" class="container-radio">
                            <input type="radio" name="response" id="question_0"
                                class="custom-control-input box-control-input" value="tp">
                            <span class="checkmark-diag">Tidak Pernah</span>
                        </label>
                    </div>
                    <div class="custom-control custom-radio">
                        <label for="question_1" class="container-radio">
                            <input type="radio" name="response" id="question_1"
                                class="custom-control-input box-control-input" value="jr">
                            <span class="checkmark-diag">Jarang</span>
                        </label>
                    </div>
                    <div class="custom-control custom-radio">
                        <label for="question_2" class="container-radio">
                            <input type="radio" name="response" id="question_2"
                                class="custom-control-input box-control-input" value="kk">
                            <span class="checkmark-diag">Kadang-kadang</span>
                        </label>
                    </div>
                    <div class="custom-control custom-radio">
                        <label for="question_3" class="container-radio">
                            <input type="radio" name="response" id="question_3"
                                class="custom-control-input box-control-input" value="sg">
                            <span class="checkmark-diag">Sering</span>
                        </label>
                    </div>
                    <div class="custom-control custom-radio">
                        <label for="question_4" class="container-radio">
                            <input type="radio" name="response" id="question_4"
                                class="custom-control-input box-control-input" value="sl">
                            <span class="checkmark-diag">Selalu</span>
                        </label>
                    </div>
                </div>

                <h6 class="alert-isi" id="alert-message" style="color: red; display: none;">*Silakan pilih jawaban
                    sebelum melanjutkan</h6>

                <div class="row navigation-buttons">
                    <div class="col-4 text-left">
                        <button class="tombol-kembali" id="prev-btn" disabled>Kembali</button>
                    </div>
                    <div class="col-4">
                        <p class="text-center info-question" id="question-number">1 dari 11</p>
                    </div>
                    <div class="col-4 text-right">
                        <button class="tombol-lanjut" id="next-btn">Lanjut</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="hasil-diagnosis" style="display: none;">
        <div class="diagnosis-container">
            <h2 class="diagnosis-title">Hasil Diagnosis</h2>
            <p class="diagnosis-message" id="diagnosis-message"> <!-- Hasil diagnosis akan ditampilkan di sini -->
            </p>
            <button class="btn-back" onclick="goBackToHome()">Kembali ke Beranda</button>
        </div>
    </div>



    <script>
        // Event listener untuk tombol "Ya, saya setuju"
        document.getElementById('agreemente').addEventListener('click', function() {
            document.getElementById('check-content').style.display = 'none'; // Sembunyikan check-content
            document.getElementById('survey-rabies').style.display = 'block'; // Tampilkan survey-rabies
        });

        function showNewContent() {
            document.getElementById('survey-content').style.display = 'none';
            document.getElementById('check-content').style.display = 'block';
        }

        // Array pertanyaan
        const questions = [
            "Apakah hewan Anda menunjukkan perubahan perilaku yang tiba-tiba (misalnya, menjadi lebih agresif atau gelisah)?",
            "Apakah hewan Anda mengalami kesulitan menelan atau tampak ada sesuatu yang menghalangi tenggorokannya?",
            "Apakah hewan Anda menjadi lebih agresif terhadap orang lain atau hewan lain secara tiba-tiba?",
            "Apakah hewan Anda mengalami kejang atau tremor yang tidak biasa?",
            "Apakah hewan Anda menunjukkan tanda-tanda kelemahan atau kelumpuhan pada salah satu bagian tubuhnya?",
            "Apakah hewan Anda mulai berbusa di mulut tanpa alasan yang jelas?",
            "Apakah hewan Anda mengalami kelainan koordinasi atau kesulitan berjalan?",
            "Apakah hewan Anda tampak takut terhadap air atau enggan untuk minum (hidrofobia)?",
            "Apakah hewan Anda menunjukkan tanda-tanda kehilangan nafsu makan secara tiba-tiba?",
            "Apakah hewan Anda mengalami perubahan suara, seperti mengeluarkan suara yang tidak biasa atau berlebihan?",
            "Apakah hewan Anda mengalami kebingungan atau disorientasi, seperti tersesat atau tidak mengenali lingkungannya?"
        ];

        let currentQuestion = 0;
        const totalQuestions = questions.length;

        // Array untuk menyimpan jawaban pengguna
        let responses = new Array(totalQuestions).fill(null);

        // Bobot untuk setiap jawaban
        const responseWeights = {
            'tp': 0, // Tidak Pernah
            'jr': 1, // Jarang
            'kk': 2, // Kadang-kadang
            'sg': 3, // Sering
            'sl': 4 // Selalu
        };

        // Inisialisasi pagination
        document.addEventListener("DOMContentLoaded", function() {
            updateQuestionDisplay();
            generatePaginationDots();
        });

        // Fungsi untuk memperbarui tampilan pertanyaan
        function updateQuestionDisplay() {
            document.getElementById('question-text').innerText = questions[currentQuestion];
            document.getElementById('question-number').innerText = `${currentQuestion + 1} dari ${totalQuestions}`;

            // Reset semua radio button
            resetRadioButtons();

            // Jika sudah ada jawaban yang dipilih, aktifkan kembali radio button tersebut
            if (responses[currentQuestion] !== null) {
                document.querySelector(`input[name="response"][value="${responses[currentQuestion]}"]`).checked = true;
            }

            // Perbarui status pagination
            document.querySelectorAll('#pagination-indicator a').forEach((dot, index) => {
                if (index === currentQuestion) {
                    dot.classList.add('is-active');
                } else {
                    dot.classList.remove('is-active');
                }
            });

            // Aktifkan atau nonaktifkan tombol
            document.getElementById('prev-btn').disabled = currentQuestion === 0;
            document.getElementById('next-btn').innerText = currentQuestion === totalQuestions - 1 ? "Selesai" : "Lanjut";
        }

        // Fungsi untuk mereset radio button
        function resetRadioButtons() {
            document.querySelectorAll('input[name="response"]').forEach(radio => {
                radio.checked = false;
            });
        }

        // Fungsi untuk pindah ke pertanyaan berikutnya
        document.getElementById('next-btn').addEventListener('click', function() {
            const selectedValue = document.querySelector('input[name="response"]:checked');
            const alertMessage = document.getElementById('alert-message'); // Mendapatkan elemen alert

            if (selectedValue) {
                // Simpan jawaban pengguna di array responses
                responses[currentQuestion] = selectedValue.value;

                // Sembunyikan pesan alert jika ada
                alertMessage.style.display = 'none';

                if (currentQuestion < totalQuestions - 1) {
                    currentQuestion++;
                    updateQuestionDisplay();
                } else {
                    showResult(); // Tampilkan hasil jika sudah pertanyaan terakhir
                }
            } else {
                // Tampilkan pesan alert jika tidak ada jawaban yang dipilih
                alertMessage.style.display = 'block';
                alertMessage.innerText = "*Silakan pilih jawaban sebelum melanjutkan.";
            }
        });

        // Fungsi untuk kembali ke pertanyaan sebelumnya
        document.getElementById('prev-btn').addEventListener('click', function() {
            if (currentQuestion > 0) {
                currentQuestion--;
                updateQuestionDisplay();
            }
        });

        // Fungsi untuk membuat pagination dots
        function generatePaginationDots() {
            const pagination = document.getElementById('pagination-indicator');
            for (let i = 0; i < totalQuestions; i++) {
                const dot = document.createElement('a');
                dot.href = "#";
                pagination.appendChild(dot);
            }
        }

        // Fungsi untuk menghitung risiko rabies
        function calculateRabiesRisk() {
            let totalScore = 0;

            // Jumlahkan bobot dari semua jawaban yang dipilih
            responses.forEach(responseValue => {
                if (responseValue !== null) {
                    totalScore += responseWeights[responseValue];
                }
            });

            return totalScore;
        }

        function showResult() {
            let totalScore = calculateRabiesRisk();
            let diagnosisMessage = "";

            // Tentukan tingkat risiko berdasarkan total skor
            if (totalScore <= 4) {
                diagnosisMessage = "Hewan Anda tidak menunjukkan tanda-tanda rabies (Risiko rendah).";
            } else if (totalScore <= 9) {
                diagnosisMessage = "Hewan Anda mungkin menunjukkan gejala rabies (Risiko sedang).";
            } else {
                diagnosisMessage = "Hewan Anda mungkin terkena rabies (Risiko tinggi). Segera periksa ke dokter hewan.";
            }

            // Tampilkan hasil di div "hasil-diagnosis"
            document.getElementById('survey-rabies').style.display = 'none'; // Sembunyikan survey
            document.getElementById('hasil-diagnosis').style.display = 'block'; // Tampilkan hasil diagnosis
            document.getElementById('diagnosis-message').innerText = diagnosisMessage; // Isi pesan diagnosis
        }

        function goBackToHome() {
            // Logika untuk kembali ke halaman beranda
            window.location.href = '/beranda'; // Ganti dengan rute beranda yang sesuai
        }
    </script>

    <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
        <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
    </a>

    {{-- <script src="{{ asset('Kitter/assets/js/script.js') }}" defer></script> --}}

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
