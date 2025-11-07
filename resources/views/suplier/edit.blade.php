@extends('layouts.app')

@section('title', 'Edit Suplier')

@section('content')
<div class="container">
    <br>
    <h4>Edit Suplier</h4>
    <form action="{{ route('suplier.update', $suplier->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Suplier</label>
            <input type="text" class="form-control" name="nama" value="{{ $suplier->nama }}" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" name="alamat">{{ $suplier->alamat }}</textarea>
        </div>

        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="text" class="form-control" name="telepon" value="{{ $suplier->telepon }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('suplier.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
