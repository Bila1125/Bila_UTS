@extends('layouts.app')

@section('title', 'Daftar Guru')

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpush

@section('content')
<div class="container">
    <br>
    <h4>Daftar Guru</h4>
    <a href="{{ route('guru.create') }}" class="btn btn-primary mb-3">Tambah Guru</a>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-sm" id="tabel-guru">
        <thead class="table-light">
            <tr>
                <th style="text-align: center">NIP</th>
                <th>Nama</th>
                <th>No HP</th>
                <th>Mata Pelajaran</th>
                <th>Alamat</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($guru as $item)
            <tr>
                <td class="text-center">{{ $item->nip }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->no_hp }}</td>
                <td>{{ $item->mapel }}</td>
                <td>{{ $item->alamat }}</td>
                <td class="text-center">
                    <a href="{{ route('guru.edit', $item->nip) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('guru.destroy', $item->nip) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Yakin ingin menghapus guru ini?')">
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
        $('#tabel-guru').DataTable({
            columnDefs: [
                { orderable: false, targets: 5 }
            ]
        });
    });
</script>
@endpush
