@extends('layouts.app')

@section('title', 'Daftar Siswa')

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpush

@section('content')
<div class="container">
    <br>
    <h4>Daftar Siswa</h4>
    <a href="{{ route('siswa.create') }}" class="btn btn-primary mb-3">Tambah Siswa</a>

    <table class="table table-bordered table-sm" id="tabel-siswa">
        <thead class="table-light">
            <tr>
                <th style="text-align: center">NIM</th>
                <th>Nama</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswa as $item)
            <tr>
                <td class="text-center">{{ $item->nim }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->no_hp }}</td>
                <td>{{ $item->alamat }}</td>
                <td class="text-center">
                    <a href="{{ route('siswa.edit', $item->nim) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('siswa.destroy', $item->nim) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Yakin ingin menghapus siswa ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
        $('#tabel-siswa').DataTable({
            columnDefs: [
                { orderable: false, targets: 4 } // Kolom Aksi tidak bisa diurutkan
            ]
        });
    });
</script>
@endpush
