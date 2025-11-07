@extends('layouts.app')
@section('title', 'Edit Aktivitas Interaktif')

@section('content')
<div class="container">
    <h1>Edit Aktivitas Interaktif</h1>
    <form action="{{ route('aktivitas_interaktif.update', $aktivitas->aktivitas_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $aktivitas->judul }}" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $aktivitas->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $aktivitas->tanggal }}">
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <input type="text" name="kategori" class="form-control" value="{{ $aktivitas->kategori }}">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('aktivitas_interaktif.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
