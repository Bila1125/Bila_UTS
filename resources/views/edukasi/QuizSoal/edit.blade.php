@extends('layouts.app')
@section('title', 'Edit Soal')

@section('content')
<div class="container">
    <h2>Edit Soal</h2>
    <form action="{{ route('quiz_soal.update', $soal->soal_id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Pertanyaan</label>
            <textarea name="pertanyaan" class="form-control" required>{{ $soal->pertanyaan }}</textarea>
        </div>
        <div class="mb-3"><label>Opsi A</label><input type="text" name="opsi_a" class="form-control" value="{{ $soal->opsi_a }}" required></div>
        <div class="mb-3"><label>Opsi B</label><input type="text" name="opsi_b" class="form-control" value="{{ $soal->opsi_b }}" required></div>
        <div class="mb-3"><label>Opsi C</label><input type="text" name="opsi_c" class="form-control" value="{{ $soal->opsi_c }}" required></div>
        <div class="mb-3"><label>Opsi D</label><input type="text" name="opsi_d" class="form-control" value="{{ $soal->opsi_d }}" required></div>
        <div class="mb-3">
            <label>Jawaban Benar</label>
            <select name="jawaban_benar" class="form-control" required>
                <option value="A" {{ $soal->jawaban_benar == 'A' ? 'selected' : '' }}>A</option>
                <option value="B" {{ $soal->jawaban_benar == 'B' ? 'selected' : '' }}>B</option>
                <option value="C" {{ $soal->jawaban_benar == 'C' ? 'selected' : '' }}>C</option>
                <option value="D" {{ $soal->jawaban_benar == 'D' ? 'selected' : '' }}>D</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('quiz_soal.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
