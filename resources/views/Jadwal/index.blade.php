@extends('layouts.app')

@section('title', 'Jadwal Guru')

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpush

@section('content')
<div class="container">
    <br>
    <h4>Jadwal Guru</h4>
    <a href="{{ route('jadwal-guru.create') }}" class="btn btn-primary mb-3">Tambah Jadwal</a>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-sm" id="tabel-jadwal">
        <thead class="table-light">
            <tr>
                <th>Hari</th>
                <th>Jam</th>
                <th>Kelas</th>
                <th>Mata Pelajaran</th>
                <th>Guru</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jadwal as $item)
            <tr>
                <td>{{ $item->hari }}</td>
                <td>{{ $item->jam }}</td>
                <td>{{ $item->kelas }}</td>
                <td>{{ $item->mata_pelajaran }}</td>
                <td>{{ $item->guru->nama }}</td>
                <td class="text-center">
                    <a href="{{ route('jadwal-guru.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('jadwal-guru.destroy', $item->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
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
        $('#tabel-jadwal').DataTable({
            columnDefs: [
                { orderable: false, targets: 5 }
            ]
        });
    });
</script>
@endpush
