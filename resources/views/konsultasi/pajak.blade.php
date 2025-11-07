@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Layanan Konsultasi Pajak</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('konsultasi.pajak.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Pertanyaan</label>
            <textarea name="pertanyaan" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim Pertanyaan</button>
    </form>
</div>
@endsection
