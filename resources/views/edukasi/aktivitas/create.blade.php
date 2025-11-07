@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Aktivitas</h1>
    <form action="{{ route('aktivitas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control">
        </div>
        <div class="mb-3">
            <label>Jam</label>
            <input type="time" name="jam" class="form-control">
        </div>
        <div class="mb-3">
            <label>Tempat</label>
            <input type="text" name="tempat" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('aktivitas.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
