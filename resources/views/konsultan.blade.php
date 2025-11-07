@extends('layouts.app')

@section('title', 'Konsultan Keuangan Profesional')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="color: #003366;">💼 Konsultan Keuangan Profesional</h2>
        <p class="text-muted">Atur masa depan finansial Anda dengan strategi yang tepat, cerdas, dan berkelanjutan bersama tim konsultan kami.</p>
    </div>

    <div class="card shadow-lg border-0 mx-auto" style="max-width: 700px; border-radius: 20px;">
        <div class="card-body p-4">
            <h5 class="text-center mb-4" style="color: #004c40;"> Formulir Konsultasi</h5>

            <form>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Lengkap</label>
                    <input type="text" class="form-control" placeholder="Masukkan nama Anda">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" class="form-control" placeholder="Masukkan email Anda">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Topik Konsultasi</label>
                    <select class="form-select">
                        <option selected disabled>Pilih topik...</option>
                        <option>Investasi & Portofolio</option>
                        <option>Perencanaan Keuangan Pribadi</option>
                        <option>Manajemen Hutang & Anggaran</option>
                        <option>Pensiun & Dana Darurat</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Pesan atau Pertanyaan</label>
                    <textarea class="form-control" rows="4" placeholder="Tulis pertanyaan atau kebutuhan konsultasi Anda di sini..."></textarea>
                </div>

                <button class="btn w-100" style="background-color: #007b83; color: white; font-weight: 600; border-radius: 10px;">
                    💬 Kirim Konsultasi
                </button>
            </form>
        </div>
    </div>

    <div class="text-center mt-5">
        <p class="text-muted mb-1">📧 Email kami di: <strong>support@fincare.id</strong></p>
        <p class="text-muted">Kami siap membantu Anda mencapai tujuan finansial terbaik Anda. 💚</p>
    </div>
</div>
@endsection
