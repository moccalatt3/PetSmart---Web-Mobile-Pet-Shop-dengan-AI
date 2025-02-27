<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Login - PetSmart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;600;700;800&display=swap" rel="stylesheet">
    <!-- Link Google Font -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
            font-family: 'Nunito', sans-serif;
        }

        .container {
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
        }

        .logo-container img {
            width: 95px;
            height: auto;
            margin-right: 0px;
            margin-bottom: -20px;
        }

        .form-container {
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin: 35px;
        }

        .pet-smart-title {
            font-size: 25px;
            font-weight: 700;
            margin-bottom: -5px;
        }

        .btn-gradient {
            background: linear-gradient(90deg, #47B5B1, #1B6B66);
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            transition: background 0.3s ease-in-out;
            width: 100%;
            border-radius: 5px;
        }

        .btn-gradient:hover {
            background: linear-gradient(90deg, #1B6B66, #47B5B1);
            color: white;
        }

        .form-label {
            display: flex;
            align-items: center;
            margin-right: 10px;
        }

        .input-group {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .input-group input {
            flex: 1;
        }

        .text-center a {
            color: #0d5674;
            /* Ganti dengan warna yang diinginkan */
            text-decoration: none;
            /* Menghilangkan garis bawah */
        }

        .text-center a:hover {
            text-decoration: underline;
            /* Tambahkan garis bawah saat hover */
        }

        h2.text-center {
            font-size: 30px;
            /* Ukuran font untuk teks Login */
            font-weight: 500;
            /* Tebal font untuk teks Login */
            background: linear-gradient(45deg, #4b9fc0, #327995);
            /* Gradasi warna */
            -webkit-background-clip: text;
            /* Menggunakan clipping untuk teks di Safari */
            -webkit-text-fill-color: transparent;
            /* Membuat warna teks transparan */
            background-clip: text;
            /* Menggunakan clipping untuk teks */
            text-fill-color: transparent;
            /* Membuat warna teks transparan */
            padding: 3px;
            font-weight: 700
        }

        .text-small {
            font-size: 14px;
            color: #343a40;
            margin-bottom: 20px;
            margin-top: -20px;
        }

        .input-group {
            position: relative;
        }

        .input-group-text {
            background-color: #f0f0f0;
            /* Ganti dengan warna latar belakang yang diinginkan */
            border: 1px solid #ccc;
            /* Warna border */
            border-radius: 5px;
            /* Memberikan sudut yang lebih halus */
            cursor: pointer;
            /* Menunjukkan bisa diklik */
            padding: 8px 10px;
            /* Padding untuk ruang di dalam */
            display: flex;
            /* Memungkinkan elemen dalam untuk disejajarkan dengan baik */
            align-items: center;
            /* Memusatkan ikon di tengah */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo-container">
            <img src="{{ asset('img/Logo_Pet.png') }}" alt="PetSmart Logo"> <!-- Ganti dengan path logo Anda -->
            <h1 class="pet-smart-title"></h1> <!-- Menambahkan kelas pet-smart-title untuk kontrol CSS -->
        </div>

        <div class="form-container">
            <h2 class="text-center mb-4">Login to Your Account</h2>
            <p class="text-small">Enter your email & password to login</p>
            <form method="POST" action="{{ route('login.process') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" required>
                        <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                            <img id="eyeIcon" src="{{ asset('Kitter/assets/images/eyes2.png') }}" alt="Toggle Password" style="width: 20px;">
                        </span>
                    </div>
                </div>
                <button type="submit" class="btn btn-gradient w-100">Login</button>
            </form>
            <div class="text-center mt-3">
                <a href="{{ url('/register') }}">Don't have an account? Register</a>
            </div>
        </div>            
        
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const togglePassword = document.getElementById("togglePassword");
            const passwordInput = document.getElementById("password");
            const eyeIcon = document.getElementById("eyeIcon");

            togglePassword.addEventListener("click", function() {
                const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
                passwordInput.setAttribute("type", type);
                eyeIcon.src = type === "password" ? "{{ asset('Kitter/assets/images/eyes2.png') }}" :
                    "{{ asset('Kitter/assets/images/eyes.png') }}";
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            @if ($errors->any())
                document.getElementById('email').value = '{{ old('email') }}';
                document.getElementById('password').value = '';

                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: '{{ $errors->first() }}',
                    showConfirmButton: true
                });
            @endif

            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 1500
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: '{{ session('error') }}',
                    showConfirmButton: false,
                    timer: 1500
                });
            @endif
        });
    </script>
</body>

</html>
