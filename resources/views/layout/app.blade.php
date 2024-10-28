<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>konseran.Journal</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.min.css') }}">
    <style>
        /* Menyesuaikan tinggi navbar */
        .navbar {
            min-height: 100px; /* Ubah sesuai tinggi yang diinginkan */
            padding: 15px 10px; /* Sesuaikan padding agar lebih pas */
        }
        /* Menyesuaikan ukuran font pada navbar-brand */
        .navbar-brand {
            font-size: 1.8rem; /* Ukuran font yang diinginkan, bisa diubah */
            font-weight: bold; /* Menambahkan ketebalan font */
        }
        /* Menyesuaikan font */
        .navbar-nav {
            padding: 10px;
        }
        /* Menyesuaikan ukuran gambar login dan search */
        .navbar-login-icon img,
        .navbar-search-icon img {
            width: 30px; /* Sesuaikan ukuran gambar */
            height: 30px; /* Sesuaikan ukuran gambar */
        }
        /* Mengatur posisi icon login dan search agar sejajar */
        .navbar-icons {
            display: flex;
            align-items: center; /* Menjaga ikon tetap sejajar secara vertikal */
            gap: 10px; /* Memberikan jarak antara ikon */
        }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-black bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/welcome') }}">Konseran.Journal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/journals') }}">Jurnal</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/events') }}">E-Tiket</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/form') }}">Kritik dan Saran</a>
                    </li>
                </ul>
                <!-- Bagian ikon search dan login -->
                <ul class="navbar-nav ms-auto navbar-icons">
                    <li class="nav-item navbar-search-icon">
                        <a class="nav-link" href="{{ url('/search') }}">
                            <img src="{{ asset('assets/search.jpg') }}" alt="Search Icon"> <!-- Ganti gambar search -->
                        </a>
                    </li>
                    <li class="nav-item navbar-login-icon">
                        <a class="nav-link" href="{{ url('/login') }}">
                            <img src="{{ asset('assets/login.jpg') }}" alt="Login Icon"> <!-- Ganti gambar login -->
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    @yield('content')

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
