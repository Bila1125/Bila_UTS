@extends('layouts.app')
@section('title', 'Aktivitas Interaktif')

@section('content')
<div class="container">
    <h1 class="mb-3">Aktivitas Interaktif</h1>
    <a href="{{ route('aktivitas_interaktif.create') }}" class="btn btn-primary mb-3">Tambah Aktivitas</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($aktivitas as $item)
            <tr>
                <td>{{ $item->aktivitas_id }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->kategori }}</td>
                <td>
                    <a href="{{ route('aktivitas_interaktif.edit', $item->aktivitas_id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('aktivitas_interaktif.destroy', $item->aktivitas_id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin mau hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
