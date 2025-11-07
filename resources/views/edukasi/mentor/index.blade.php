@extends('layouts.app')
@section('title', 'Mentor')

@section('content')
<div class="container">
    <br>
    <h4 class="mb-3">Data Mentor</h4>

    <a href="{{ route('mentor.create') }}" class="btn btn-primary mb-3">+ Tambah Mentor</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Tgl Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Bidang Keahlian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mentors as $mentor)
                <tr>
                    <td>{{ $mentor->nama }}</td>
                    <td>{{ $mentor->tanggal_lahir }}</td>
                    <td>{{ $mentor->jenis_kelamin }}</td>
                    <td>{{ $mentor->alamat }}</td>
                    <td>{{ $mentor->no_hp }}</td>
                    <td>{{ $mentor->bidang_keahlian }}</td>
                    <td>
                        <a href="{{ route('mentor.edit', $mentor->mentor_id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('mentor.destroy', $mentor->mentor_id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7">Belum ada data mentor</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
