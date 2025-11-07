@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Santri</h1>
    <form action="{{ route('santri.update', $santri->santri_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $santri->nama }}" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" value="{{ $santri->tanggal_lahir }}">
        </div>
        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="L" {{ $santri->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                <option value="P" {{ $santri->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control">{{ $santri->alamat }}</textarea>
        </div>
        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control" value="{{ $santri->no_hp }}">
        </div>
        <div class="mb-3">
            <label>Prodi Pesantri</label>
            <input type="text" name="prodi_pesantri" class="form-control" value="{{ $santri->prodi_pesantri }}">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('santri.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
