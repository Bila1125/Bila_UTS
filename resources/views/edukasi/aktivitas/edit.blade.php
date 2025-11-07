@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Aktivitas</h1>
    <form action="{{ route('aktivitas.update', $aktivitas->aktivitas_id) }}" method="POST">
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
            <label>Jam</label>
            <input type="time" name="jam" class="form-control" value="{{ $aktivitas->jam }}">
        </div>
        <div class="mb-3">
            <label>Tempat</label>
            <input type="text" name="tempat" class="form-control" value="{{ $aktivitas->tempat }}">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('aktivitas.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
