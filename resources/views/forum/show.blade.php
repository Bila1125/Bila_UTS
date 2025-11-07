@extends('layouts.app')
@section('title', 'Detail Forum')

@section('content')
<div class="container">
    <br>
    <h4 class="mb-3">{{ $forum->title }}</h4>
    <p>{{ $forum->content }}</p>
    <small class="text-muted">Oleh: {{ $forum->user->name ?? 'Anonim' }} | {{ $forum->created_at->format('d M Y H:i') }}</small>

    <hr>
    <h5>Balasan</h5>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @foreach($forum->replies as $reply)
        <div class="card mb-2">
            <div class="card-body">
                <p>{{ $reply->reply }}</p>
                <small class="text-muted">Oleh: {{ $reply->user->name ?? 'Anonim' }} | {{ $reply->created_at->format('d M Y H:i') }}</small>
                <form action="{{ route('forum.reply.destroy', $reply->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus balasan ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    @endforeach

    <hr>
    <h5>Tambah Balasan</h5>
    <form action="{{ route('forum.reply.store', $forum->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="reply" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>

    <br>
    <a href="{{ route('forum.index') }}" class="btn btn-secondary">Kembali ke Forum</a>
</div>
@endsection
