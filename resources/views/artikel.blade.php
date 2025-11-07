@extends('layouts.app')

@section('title', 'Artikel Keuangan & Investasi')

@section('content')
<style>
    /* 🟩 Latar luar warna hijau soft */
    body {
        background-color: #136f63;
        margin: 0;
        padding: 0;
    }

    /* ⬜ Container utama dengan gambar di dalam & efek transparan */
    .container.py-5 {
        background: 
            linear-gradient(rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.8)), 
            url("{{ asset('img/uang.jpg') }}");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        border-radius: 30px;
        padding: 60px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
        backdrop-filter: blur(6px);
    }

    /* 🪞 Kartu transparan lembut */
    .card {
        background: rgba(255, 255, 255, 0.65) !important;
        backdrop-filter: blur(5px);
        transition: all 0.3s ease;
        border-radius: 25px !important;
    }

    .card:hover {
        background: rgba(255, 255, 255, 0.85) !important;
        transform: translateY(-5px);
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.15);
    }

    /* 🎨 Judul dan teks */
    h2 {
        color: #0d4032 !important;
        text-shadow: 0 2px 5px rgba(255, 255, 255, 0.5);
    }

    p.text-muted {
        color: #29584a !important;
    }
</style>

<div class="container py-5" style="max-width: 1100px;">
    <h2 class="text-center mb-4 fw-bold"> Artikel Keuangan & Investasi</h2>
    <p class="text-center text-muted mb-5">
        Temukan inspirasi dan wawasan finansial yang menenangkan — bantu kamu mengelola uang, investasi, dan impian masa depan dengan bijak.
    </p>

    <div class="row g-4">
        <!-- Artikel 1 -->
        <div class="col-md-4">
            <div class="card shadow-lg border-0 h-100">
                <div class="card-body text-center p-4">
                    <div class="fs-2 mb-3">📈</div>
                    <h5 class="fw-semibold" style="color:#0f5132;">Strategi Investasi Jangka Panjang</h5>
                    <p class="text-muted small mt-3">
                        Bangun portofolio investasi yang stabil dan aman — biar uangmu tumbuh tanpa stres.
                    </p>
                </div>
            </div>
        </div>

        <!-- Artikel 2 -->
        <div class="col-md-4">
            <div class="card shadow-lg border-0 h-100">
                <div class="card-body text-center p-4">
                    <div class="fs-2 mb-3">💰</div>
                    <h5 class="fw-semibold" style="color:#0f5132;">Mengatur Anggaran Bulanan</h5>
                    <p class="text-muted small mt-3">
                        Atur keuangan dengan tenang — catat, rencanakan, dan nikmati hasilnya setiap bulan.
                    </p>
                </div>
            </div>
        </div>

        <!-- Artikel 3 -->
        <div class="col-md-4">
            <div class="card shadow-lg border-0 h-100">
                <div class="card-body text-center p-4">
                    <div class="fs-2 mb-3">🏦</div>
                    <h5 class="fw-semibold" style="color:#0f5132;">Tips Produk Keuangan Cerdas</h5>
                    <p class="text-muted small mt-3">
                        Pilih produk keuangan sesuai gaya hidupmu — dari reksa dana hingga asuransi.
                    </p>
                </div>
            </div>
        </div>

        <!-- Artikel 4 -->
        <div class="col-md-4">
            <div class="card shadow-lg border-0 h-100">
                <div class="card-body text-center p-4">
                    <div class="fs-2 mb-3">🌿</div>
                    <h5 class="fw-semibold" style="color:#0f5132;">Finansial Seimbang</h5>
                    <p class="text-muted small mt-3">
                        Keseimbangan antara pengeluaran, tabungan, dan kebahagiaan adalah kunci hidup damai.
                    </p>
                </div>
            </div>
        </div>

        <!-- Artikel 5 -->
        <div class="col-md-4">
            <div class="card shadow-lg border-0 h-100">
                <div class="card-body text-center p-4">
                    <div class="fs-2 mb-3">🪴</div>
                    <h5 class="fw-semibold" style="color:#0f5132;">Menabung Tanpa Tertekan</h5>
                    <p class="text-muted small mt-3">
                        Nikmati proses menabung — mulai dari kecil, tapi konsisten hingga terasa ringan.
                    </p>
                </div>
            </div>
        </div>

        <!-- Artikel 6 -->
        <div class="col-md-4">
            <div class="card shadow-lg border-0 h-100">
                <div class="card-body text-center p-4">
                    <div class="fs-2 mb-3">🌤️</div>
                    <h5 class="fw-semibold" style="color:#0f5132;">Mindset Keuangan Positif</h5>
                    <p class="text-muted small mt-3">
                        Ubah cara pandang terhadap uang, dan rasakan energi positif dalam setiap keputusan finansial.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
