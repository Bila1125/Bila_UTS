@extends('layouts.app')
@section('title', 'Daftar Soal Kuis')

@section('content')
<div class="container">
    <h2>Daftar Soal Kuis</h2>
    <a href="{{ route('quiz_soal.create') }}" class="btn btn-primary mb-3">Tambah Soal</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Pertanyaan</th>
                <th>Opsi A</th>
                <th>Opsi B</th>
                <th>Opsi C</th>
                <th>Opsi D</th>
                <th>Jawaban Benar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($soals as $soal)
            <tr>
                <td>{{ $soal->pertanyaan }}</td>
                <td>{{ $soal->opsi_a }}</td>
                <td>{{ $soal->opsi_b }}</td>
                <td>{{ $soal->opsi_c }}</td>
                <td>{{ $soal->opsi_d }}</td>
                <td>{{ $soal->jawaban_benar }}</td>
                <td>
                    <a href="{{ route('quiz_soal.edit', $soal->soal_id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('quiz_soal.destroy', $soal->soal_id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus soal ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
