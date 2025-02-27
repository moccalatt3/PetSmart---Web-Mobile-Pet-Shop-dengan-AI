<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - PetSmart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-k6RqeWeci5ZR/Lv4MR0sA0FfDOMZg2n0/D0A38QyR7p5Zo5r8GJtnbRbJ1fM5u5SMWc5jP1Bv1zqD4JOGs4W+A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye"
        viewBox="0 0 16 16">
        <path
            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
    </svg>
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
            color: #327995;
            text-decoration: none;
        }

        .text-center a:hover {
            text-decoration: underline;
        }

        .btn-gradient {
            background: linear-gradient(90deg, #E4402E, #A91111);
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
            background: linear-gradient(90deg, #A91111, #E4402E);
            cursor: pointer;
            color: white;
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
            font-weight: 700
        }


        .text-small {
            font-size: 14px;
            color: #343a40;
            margin-bottom: 20px;
            margin-top: -20px;
        }

        .text-alertpw {
            font-size: 14px;
            color: #A91111;
            margin-bottom: 15px;
            margin-top: -10px;
            text-align: left;
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
            <img src="{{ asset('img/Logo_Pet.png') }}" alt="PetSmart Logo">
            <h1 class="pet-smart-title"></h1>
        </div>
        <div class="form-container">
            <h2 class="text-center mb-4">Create an Account</h2>
            <p class="text-small">Enter your personal details to create account</p>
            <form method="POST" action="{{ url('/register') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" required>
                        <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                            <img src="{{ asset('Kitter/assets/images/eyes2.png') }}" id="eyeIcon"
                                alt="Toggle Password" style="width: 20px; height: 20px;">
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation" required>
                        <span class="input-group-text" id="toggleConfirmPassword" style="cursor: pointer;">
                            <img src="{{ asset('Kitter/assets/images/eyes2.png') }}" id="eyeConfirmIcon"
                                alt="Toggle Confirm Password" style="width: 20px; height: 20px;">
                        </span>
                    </div>
                </div>
                <p class="text-alertpw">the password must contain at least 8 characters</p>

                <button type="submit" class="btn btn-gradient">Register</button>
            </form>
            <div class="text-center mt-3">
                <a href="{{ url('/login') }}">Already have an account? Login</a>
            </div>
        </div>
    </div>

    <!-- SweetAlert untuk alert sukses atau error -->
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 1500
            });
        @endif

        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ $errors->first() }}',
                showConfirmButton: false,
                timer: 3000
            });
        @endif

        document.addEventListener("DOMContentLoaded", function() {
            const togglePassword = document.getElementById("togglePassword");
            const passwordInput = document.getElementById("password");
            const eyeIcon = document.getElementById("eyeIcon");

            togglePassword.addEventListener("click", function() {
                const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
                passwordInput.setAttribute("type", type);

                // Ganti gambar ikon
                eyeIcon.src = type === "password" ? "{{ asset('Kitter/assets/images/eyes2.png') }}" :
                    "{{ asset('Kitter/assets/images/eyes.png') }}"; // Pastikan eye-slash.png ada di direktori yang sama
            });

            const toggleConfirmPassword = document.getElementById("toggleConfirmPassword");
            const confirmPasswordInput = document.getElementById("password_confirmation");
            const eyeConfirmIcon = document.getElementById("eyeConfirmIcon");

            toggleConfirmPassword.addEventListener("click", function() {
                const type = confirmPasswordInput.getAttribute("type") === "password" ? "text" : "password";
                confirmPasswordInput.setAttribute("type", type);

                // Ganti gambar ikon
                eyeConfirmIcon.src = type === "password" ? "{{ asset('Kitter/assets/images/eyes2.png') }}" :
                    "{{ asset('Kitter/assets/images/eyes.png') }}"; // Pastikan eye-slash.png ada di direktori yang sama
            });
        });
    </script>
</body>

</html>
