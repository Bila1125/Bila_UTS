@extends('layouts.app')

@section('title', 'Hubungi Kami')

@section('content')
<div class="container py-5" style="max-width: 800px;">
    <h2 class="text-center fw-bold mb-4" style="color:#1a365d;">📨 Hubungi Tim Fincare</h2>
    <p class="text-center text-muted mb-5">
        Kami siap membantu Anda merencanakan keuangan, investasi, dan masa depan finansial dengan bijak.
        Silakan isi formulir di bawah ini untuk mengirim pesan kepada tim kami.
    </p>

    <div class="card shadow-lg border-0" style="border-radius: 25px; background-color:#f8fafc;">
        <div class="card-body p-5">
            <form>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Lengkap</label>
                    <input type="text" class="form-control" placeholder="Masukkan nama Anda">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Alamat Email</label>
                    <input type="email" class="form-control" placeholder="Masukkan alamat email Anda">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Subjek Pesan</label>
                    <input type="text" class="form-control" placeholder="Tuliskan topik pesan Anda">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Pesan</label>
                    <textarea class="form-control" rows="5" placeholder="Tuliskan pesan atau pertanyaan Anda..."></textarea>
                </div>

                <button type="submit" class="btn w-100 fw-semibold" 
                    style="background-color:#198754; color:white; border-radius:12px;">
                    💌 Kirim Pesan
                </button>
            </form>
        </div>
    </div>

    <div class="text-center mt-5 text-muted">
        <p class="small">Atau hubungi kami langsung melalui email di 
            <a href="mailto:cs@fincare.id" style="color:#0f5132; text-decoration:none;">cs@fincare.id</a>
        </p>
    </div>
</div>
@endsection
