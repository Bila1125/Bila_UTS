@extends('layouts.app')

@section('title', 'Edit Jadwal Guru')

@section('content')
<div class="container">
    <br>
    <h4>Edit Jadwal Guru</h4>
    <form action="{{ route('jadwal-guru.update', $jadwal->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Hari</label>
            <input type="text" name="hari" class="form-control" value="{{ $jadwal->hari }}" required>
        </div>
        <div class="mb-3">
            <label>Jam</label>
            <input type="text" name="jam" class="form-control" value="{{ $jadwal->jam }}" required>
        </div>
        <div class="mb-3">
            <label>Kelas</label>
            <input type="text" name="kelas" class="form-control" value="{{ $jadwal->kelas }}" required>
        </div>
        <div class="mb-3">
            <label>Mata Pelajaran</label>
            <input type="text" name="mata_pelajaran" class="form-control" value="{{ $jadwal->mata_pelajaran }}" required>
        </div>
        <div class="mb-3">
            <label>Guru</label>
            <select name="nip" class="form-control" required>
                @foreach($guru as $g)
                  <option value="{{ $g->nip }}" {{ $jadwal->nip == $g->nip ? 'selected' : '' }}>{{ $g->nama }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('jadwal-guru.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
