<!DOCTYPE html> 
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Konsultasi Keuangan Online')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-green: #2a7b68;   /* hijau laut */
            --dark-green: #1b4d3e;      /* hijau tua krusty */
            --soft-green: #e6f3ef;      /* hijau muda lembut */
            --white: #fff;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: var(--soft-green);
            font-family: 'Poppins', sans-serif;
        }

        .navbar {
            background: linear-gradient(to right, var(--primary-green), var(--dark-green));
        }
        .navbar-brand {
            font-weight: bold;
            color: white !important;
        }
        .nav-link {
            color: white !important;
            font-weight: 500;
        }
        .nav-link:hover {
            color: var(--soft-green) !important;
        }

        /* Dropdown styling */
        .dropdown-menu {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            border: none;
            padding: 10px;
        }
        .dropdown-item {
            border-radius: 8px;
            padding: 8px 15px;
            transition: background 0.2s ease;
        }
        .dropdown-item:hover {
            background-color: var(--soft-green);
            color: var(--dark-green);
        }

        .hero-section {
            background: 
                linear-gradient(to right, rgba(42,123,104,0.8), rgba(27,77,62,0.8)),
                url("{{ asset('img/gambar.jpg') }}") center/cover no-repeat;
            color: var(--white);
            padding: 100px 0;
            text-align: center;
            min-height: calc(100vh - 56px);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px;
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 15px;
            text-shadow: 2px 2px rgba(0,0,0,0.1);
        }

        .hero-section .lead {
            font-size: 1.2rem;
            margin-bottom: 25px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-section .btn {
            font-size: 1.1rem;
            padding: 12px 28px;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn-light {
            background-color: white;
            color: var(--dark-green);
            border: 2px solid white;
        }
        .btn-light:hover {
            background-color: transparent;
            color: white;
        }

        footer {
            background: var(--dark-green);
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: auto;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/dashboard') }}">𝓕𝓲𝓷𝓬𝓪𝓻𝓮</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Dropdown Layanan -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="layananDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Layanan 
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="layananDropdown">
                            <li><a class="dropdown-item" href="{{ url('/konsultasi-pajak') }}">Konsultasi Pajak</a></li>
                            <li><a class="dropdown-item" href="{{ url('/perencanaan-investasi') }}">Perencanaan Investasi</a></li>
                            <li><a class="dropdown-item" href="{{ url('/manajemen-keuangan') }}">Manajemen Keuangan</a></li>
                            <li><a class="dropdown-item" href="{{ url('/tabungan-anggaran') }}">Tabungan dan Anggaran</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/konsultan') }}">Konsultan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/artikel') }}">Artikel</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/hubungi') }}">Hubungi</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Beranda</a></li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">{{ Auth::user()->name }}</a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn btn-sm btn-light ms-2">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link text-white" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="{{ route('register') }}">Register</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid p-0">
        @yield('content')

        @if (!trim($__env->yieldContent('content')))
            <section class="hero-section">
                <div class="container">
                    <h1>Konsultasi Keuangan Online</h1>
                    <p class="lead">
                        Atur keuangan, investasi, dan masa depan finansial Anda bersama konsultan profesional, kapan saja dan di mana saja
                    </p>
                    <div class="mt-4">
                        @auth
                        @else
                            <a href="{{ route('login') }}" class="btn btn-light me-3">
                                <i class="bi bi-box-arrow-in-right me-2"></i> Login
                            </a>
                            <a href="{{ route('register') }}" class="btn btn-outline-light">
                                <i class="bi bi-person-plus me-2"></i> Daftar Sekarang
                            </a>
                        @endauth
                    </div>
                </div>
            </section>
        @endif
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} FinCare - Konsultasi Keuangan Online. Semua Hak Dilindungi.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</body>
</html>
