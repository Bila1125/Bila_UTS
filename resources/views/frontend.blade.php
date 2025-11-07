<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konsultasi Keuangan - Solusi Finansial </title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        :root {
            --primary-color: #2ecc71;   /* Hijau Krusty Krab (cerah & fresh) */
            --accent-color: #27ae60;    /* Hijau tua elegan */
            --light-bg: #e9f7ef;        /* Latar lembut */
            --dark-text: #064420;
            --light-text: #ffffff;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #d4f7d4, #a8e6a3, #bdf0bd);
            color: var(--dark-text);
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* ANIMASI EMOTICON MENGAMBANG */
        .floating-emojis {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
            pointer-events: none;
        }
        .floating-emojis span {
            position: absolute;
            display: block;
            font-size: 2rem;
            animation: float 10s linear infinite;
            opacity: 0.7;
        }
        @keyframes float {
            0% { transform: translateY(100vh) rotate(0deg); opacity: 0.3; }
            50% { opacity: 1; }
            100% { transform: translateY(-10vh) rotate(360deg); opacity: 0.3; }
        }
        .floating-emojis span:nth-child(1) { left: 10%; animation-duration: 12s; animation-delay: 0s; }
        .floating-emojis span:nth-child(2) { left: 25%; animation-duration: 15s; animation-delay: 2s; }
        .floating-emojis span:nth-child(3) { left: 40%; animation-duration: 10s; animation-delay: 4s; }
        .floating-emojis span:nth-child(4) { left: 60%; animation-duration: 13s; animation-delay: 6s; }
        .floating-emojis span:nth-child(5) { left: 75%; animation-duration: 11s; animation-delay: 3s; }
        .floating-emojis span:nth-child(6) { left: 90%; animation-duration: 14s; animation-delay: 5s; }

        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }

        /* HEADER / NAVBAR */
        .main-header {
            background: var(--light-text);
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .navbar {
            max-width: 1200px;
            margin: 0 auto;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--accent-color);
            letter-spacing: 1px;
            text-decoration: none;
        }
        .nav-links {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 25px;
            margin: 0;
            padding: 0;
        }
        .nav-links li { position: relative; }
        .nav-links a {
            color: var(--accent-color);
            font-weight: 500;
            text-decoration: none;
            padding: 8px 14px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .nav-links a:hover {
            background: var(--primary-color);
            color: var(--light-text);
        }

        /* Mobile */
        .mobile-menu-toggle {
            display: none;
            font-size: 1.8em;
            color: var(--accent-color);
            background: none;
            border: none;
            cursor: pointer;
        }
        @media(max-width: 768px) {
            .nav-links {
                display: none;
                flex-direction: column;
                width: 100%;
                background: var(--light-text);
                padding: 20px;
                border-top: 1px solid rgba(0,0,0,0.05);
            }
            .nav-links.active { display: flex; }
            .mobile-menu-toggle { display: block; }
        }

        /* Buttons */
        .btn {
            padding: 12px 25px;
            border-radius: 25px;
            border: none;
            font-weight: bold;
            transition: 0.3s;
            cursor: pointer;
        }
        .btn-primary { background: var(--accent-color); color: var(--light-text); }
        .btn-primary:hover { background: var(--primary-color); }
        .btn-secondary { background: var(--primary-color); color: var(--light-text); }
        .btn-secondary:hover { background: var(--accent-color); }

        .hero-section {
            position: relative;
            background: url("{{ asset('img/keuangan.jpg') }}") no-repeat center center/cover;
            color: var(--light-text);
            text-align: center;
            padding: 100px 20px;
            border-bottom-left-radius: 40px;
            border-bottom-right-radius: 40px;
        }

        .hero-section::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(39, 174, 96, 0.6); /* hijau transparan overlay */
            border-bottom-left-radius: 40px;
            border-bottom-right-radius: 40px;
        }
        .hero-section .container {
            position: relative;
            z-index: 1;
        }
        .hero-section h1 { font-size: 3em; margin-bottom: 0.5em; }
        .hero-section p { font-size: 1.2em; margin-bottom: 2em; }

        /* Services */
        .services-overview { padding: 80px 0; text-align: center; }
        .service-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit,minmax(300px,1fr));
            gap: 30px;
        }
        .service-card {
            background: var(--light-text);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            transition: transform 0.3s;
        }
        .service-card:hover { transform: translateY(-8px); }
        .service-card .icon { font-size: 3em; color: var(--accent-color); margin-bottom: 20px; }

        /* Why Choose Us */
        .why-choose-us { padding: 80px 0; background: #d9f7df; text-align: center; }
        .features-grid { display: grid; grid-template-columns: repeat(auto-fit,minmax(300px,1fr)); gap: 30px; }
        .feature-item {
            padding: 30px;
            border-radius: 20px;
            background: var(--light-text);
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .feature-item i { font-size: 2.5em; color: var(--accent-color); margin-bottom: 15px; }

        /* Call to Action */
        .call-to-action {
            background: var(--accent-color);
            color: var(--light-text);
            text-align: center;
            padding: 60px 20px;
            border-top-left-radius: 40px;
            border-top-right-radius: 40px;
        }

        /* Footer */
        .main-footer {
            background: var(--accent-color);
            color: var(--light-text);
            padding: 60px 0 20px;
        }
        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit,minmax(250px,1fr));
            gap: 30px;
        }
        .footer-col h4 { margin-bottom: 20px; }
        .footer-col ul { list-style: none; padding: 0; }
        .footer-col ul li { margin-bottom: 10px; }
        .footer-col a { color: var(--light-text); opacity: 0.8; }
        .footer-col a:hover { color: var(--primary-color); opacity: 1; }
        .social-icons a { color: var(--light-text); font-size: 1.4em; margin-right: 12px; }
        .footer-bottom { text-align: center; margin-top: 20px; font-size: 0.9em; opacity: 0.8; }

        /* SEMBUNYIKAN MENU BERANDA, TENTANG, ARTIKEL, HUBUNGI */
        .nav-links li:nth-child(1),
        .nav-links li:nth-child(2),
        .nav-links li:nth-child(3),
        .nav-links li:nth-child(4) {
            display: none !important;
        }
    </style>
</head>
<body>
    <!-- Emoticon Uang Mengambang -->
    <div class="floating-emojis">
        <span>💰</span>
        <span>💵</span>
        <span>💎</span>
        <span>💸</span>
        <span>🪙</span>
        <span>🏦</span>
    </div>

    <header class="main-header">
        <nav class="navbar">
            <a href="{{ url('/') }}" class="navbar-brand">🪙𝐹𝑖𝓃𝒸𝒶𝓇𝑒</a>
            <button class="mobile-menu-toggle"><i class="fas fa-bars"></i></button>
            <ul class="nav-links">
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li><a href="{{ url('/tentang-kami') }}">Tentang Kami</a></li>
                <li><a href="{{ url('/blog') }}">Artikel</a></li>
                <li><a href="{{ url('/kontak') }}">Hubungi Kami</a></li>
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endif
                @else
                    <li class="dropdown">
                        <a href="#">{{ Auth::user()->name }} <i class="fas fa-chevron-down"></i></a>
                        <div class="dropdown-menu">
                            <a href="{{ url('/dashboard') }}">Dashboard</a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">@csrf</form>
                        </div>
                    </li>
                @endguest
            </ul>
        </nav>
    </header>

    <main>
        <section class="hero-section">
            <div class="container">
                <h1>Konsultasi Keuangan</h1>
                <p>Atur keuanganmu dengan mudah, dan profesional bersama tim kami 💵</p>
                <a href="{{ url('/konsultasi') }}" class="btn btn-primary" style="text-decoration: none;">Mulai Konsultasi Gratis</a>
            </div>
        </section>

        <section class="services-overview">
            <div class="container">
                <h2>Layanan Kami</h2>
                <div class="service-cards">
                    <div class="service-card">
                        <i class="fas fa-piggy-bank icon"></i>
                        <h3>Tabungan & Anggaran</h3>
                        <p>Buat anggaran keuangan yang rapi agar tujuan finansial tercapai.</p>
                    </div>
                    <div class="service-card">
                        <i class="fas fa-chart-line icon"></i>
                        <h3>Investasi</h3>
                        <p>Konsultasi portofolio investasi yang aman dan menguntungkan.</p>
                    </div>
                    <div class="service-card">
                        <i class="fas fa-hand-holding-usd icon"></i>
                        <h3>Konsultasi Pajak</h3>
                        <p>Optimalkan kewajiban pajak tanpa ribet.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="why-choose-us">
            <div class="container">
                <h2>Kenapa Pilih Kami?</h2>
                <div class="features-grid">
                    <div class="feature-item">
                        <i class="fas fa-heart"></i>
                        <h3>Friendly</h3>
                        <p>Suasana konsultasi yang fun tapi tetap profesional 💚</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-user-shield"></i>
                        <h3>Keamanan Data</h3>
                        <p>Privasi dan kerahasiaanmu dijamin 100% 🔒</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-star"></i>
                        <h3>Berpengalaman</h3>
                        <p>Konsultan berlisensi dengan pengalaman panjang.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="call-to-action">
            <h2>Siap Mengatur Keuanganmu?</h2>
            <p>Yuk mulai sekarang dan rasakan perbedaan 💸</p>
            <a href="{{ url('/kontak') }}" class="btn btn-secondary" style="text-decoration: none;">Hubungi Kami</a>
        </section>
    </main>

    <footer class="main-footer">
        <div class="container footer-grid">
            <div class="footer-col">
                <h4>Konsultasi Keuangan</h4>
                <p>Teman setia perjalanan finansialmu 💚</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                </div>
            </div>
            <div class="footer-col">
                <h4>Link Cepat</h4>
                <ul>
                    <li><a href="{{ url('/') }}" style="text-decoration: none;">Beranda</a></li>
                    <li><a href="{{ url('/tentang-kami') }}" style="text-decoration: none;">Tentang Kami</a></li>
                    <li><a href="{{ url('/kontak') }}" style="text-decoration: none;">Kontak</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Kontak</h4>
                <p><i class="fas fa-envelope"></i> info@fincare.com</p>
            </div>
        </div>
        <div class="footer-bottom">&copy; {{ date('Y') }} Konsultasi Keuangan </div>
    </footer>

    <script>
        document.querySelector('.mobile-menu-toggle').addEventListener('click', () => {
            document.querySelector('.nav-links').classList.toggle('active');
        });
    </script>
</body>
</html>
