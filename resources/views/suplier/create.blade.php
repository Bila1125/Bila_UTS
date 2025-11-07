@extends('layouts.app')

@section('title', 'Tambah Suplier')

@section('content')
<div class="container">
    <br>
    <h4>Tambah Suplier</h4>
    <form action="{{ route('suplier.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Suplier</label>
            <input type="text" class="form-control" name="nama" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" name="alamat"></textarea>
        </div>

        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="text" class="form-control" name="telepon">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('suplier.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
