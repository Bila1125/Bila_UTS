@extends('layouts.app')

@section('title', 'Edit Guru')

@section('content')
<div class="container">
    <br>
    <h4>Edit Guru</h4>
    <form action="{{ route('guru.update', $guru->nip) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>NIP</label>
            <input type="text" name="nip" class="form-control" value="{{ $guru->nip }}" readonly>
        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $guru->nama }}" required>
        </div>
        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control" value="{{ $guru->no_hp }}" required>
        </div>
        <div class="mb-3">
            <label>Mata Pelajaran</label>
            <input type="text" name="mapel" class="form-control" value="{{ $guru->mapel }}" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ $guru->alamat }}" required>
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('guru.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
