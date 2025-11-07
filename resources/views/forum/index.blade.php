@extends('layouts.app')
@section('title', 'Forum')

@section('content')
<div class="container">
    <br>
    <h4 class="mb-3">Daftar Forum</h4>

    <a href="{{ route('forum.create') }}" class="btn btn-primary mb-3">+ Buat Forum</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Konten</th>
                        <th>Pengguna</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($forums as $forum)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $forum->title }}</td>
                            <td>{{ Str::limit($forum->content, 50) }}</td>
                            <td>{{ $forum->user->name ?? 'Anonim' }}</td>
                            <td>{{ $forum->created_at->format('d M Y H:i') }}</td>
                            <td>
                                <a href="{{ route('forum.edit', $forum->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('forum.destroy', $forum->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus forum ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada forum</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
