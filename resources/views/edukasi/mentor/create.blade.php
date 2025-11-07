@extends('layouts.app')
@section('title', 'Tambah Mentor')

@section('content')
<div class="container">
    <br>
    <h4 class="mb-3">Tambah Mentor</h4>

    <form method="POST" action="{{ route('mentor.store') }}">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control">
        </div>
        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control">
        </div>
        <div class="mb-3">
            <label>Bidang Keahlian</label>
            <input type="text" name="bidang_keahlian" class="form-control">
        </div>
        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('mentor.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
