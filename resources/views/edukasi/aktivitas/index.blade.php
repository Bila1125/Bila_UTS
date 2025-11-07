@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Aktivitas</h1>
    <a href="{{ route('aktivitas.create') }}" class="btn btn-primary mb-3">Tambah Aktivitas</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Tempat</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($aktivitas as $item)
            <tr>
                <td>{{ $item->aktivitas_id }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->jam }}</td>
                <td>{{ $item->tempat }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>
                    <a href="{{ route('aktivitas.edit', $item->aktivitas_id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('aktivitas.destroy', $item->aktivitas_id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
