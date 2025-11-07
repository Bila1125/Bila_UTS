@extends('layouts.app')
@section('title', 'Buat Forum Baru')

@section('content')
<div class="container">
    <br>
    <h4 class="mb-3">Buat Forum Baru</h4>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('forum.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Konten</label>
                    <textarea name="content" class="form-control" rows="5" required>{{ old('content') }}</textarea>
                    @error('content')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('forum.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
