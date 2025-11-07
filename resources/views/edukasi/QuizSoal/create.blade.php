@extends('layouts.app')
@section('title', 'Tambah Soal')

@section('content')
<div class="container">
    <h2>Tambah Soal</h2>
    <form action="{{ route('quiz_soal.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Pertanyaan</label>
            <textarea name="pertanyaan" class="form-control" required></textarea>
        </div>
        <div class="mb-3"><label>Opsi A</label><input type="text" name="opsi_a" class="form-control" required></div>
        <div class="mb-3"><label>Opsi B</label><input type="text" name="opsi_b" class="form-control" required></div>
        <div class="mb-3"><label>Opsi C</label><input type="text" name="opsi_c" class="form-control" required></div>
        <div class="mb-3"><label>Opsi D</label><input type="text" name="opsi_d" class="form-control" required></div>
        <div class="mb-3">
            <label>Jawaban Benar</label>
            <select name="jawaban_benar" class="form-control" required>
                <option value="">-- Pilih Jawaban --</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('quiz_soal.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
