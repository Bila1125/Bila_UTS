@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Santri</h1>
    <a href="{{ route('santri.create') }}" class="btn btn-primary mb-3">Tambah Santri</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Prodi Pesantri</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($santri as $item)
            <tr>
                <td>{{ $item->santri_id }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->tanggal_lahir }}</td>
                <td>{{ $item->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->no_hp }}</td>
                <td>{{ $item->prodi_pesantri }}</td>
                <td>
                    <a href="{{ route('santri.edit', $item->santri_id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('santri.destroy', $item->santri_id) }}" method="POST" style="display:inline-block;">
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
