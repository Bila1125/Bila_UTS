@extends('layouts.app')
@section('title', 'Edit Mentor')

@section('content')
<div class="container">
    <br>
    <h4 class="mb-3">Edit Mentor</h4>

    <form method="POST" action="{{ route('mentor.update', $mentor->mentor_id) }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ $mentor->nama }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" value="{{ $mentor->tanggal_lahir }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="L" {{ $mentor->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ $mentor->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control">{{ $mentor->alamat }}</textarea>
        </div>
        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" value="{{ $mentor->no_hp }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Bidang Keahlian</label>
            <input type="text" name="bidang_keahlian" value="{{ $mentor->bidang_keahlian }}" class="form-control">
        </div>
        <button class="btn btn-success">Update</button>
        <a href="{{ route('mentor.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
