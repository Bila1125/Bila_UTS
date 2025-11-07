@extends('layouts.app')

@section('title', 'Tambah Guru')

@section('content')
<div class="container">
    <br>
    <h4>Tambah Guru</h4>
    <form action="{{ route('guru.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>NIP</label>
            <input type="text" name="nip" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Mata Pelajaran</label>
            <input type="text" name="mapel" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" required>
        </div>
        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('guru.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
