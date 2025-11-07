@extends('layouts.app')

@section('title', 'Tambah Jadwal Guru')

@section('content')
<div class="container">
    <br>
    <h4>Tambah Jadwal Guru</h4>
    <form action="{{ route('jadwal-guru.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Hari</label>
            <input type="text" name="hari" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jam</label>
            <input type="text" name="jam" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kelas</label>
            <input type="text" name="kelas" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Mata Pelajaran</label>
            <input type="text" name="mata_pelajaran" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Guru</label>
            <select name="nip" class="form-control" required>
                <option value="">-- Pilih Guru --</option>
                @foreach($guru as $g)
                  <option value="{{ $g->nip }}">{{ $g->nama }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('jadwal-guru.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
