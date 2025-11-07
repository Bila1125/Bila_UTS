@extends('layouts.app')
@section('title', 'Forum Replies')

@section('content')
<div class="container">
    <h3>Daftar Forum Replies</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Forum</th>
                <th>User</th>
                <th>Reply</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($replies as $reply)
            <tr>
                <td>{{ $reply->id }}</td>
                <td>{{ $reply->forum->title ?? '-' }}</td>
                <td>{{ $reply->user->name ?? 'Anonim' }}</td>
                <td>{{ $reply->reply }}</td>
                <td>{{ $reply->created_at->format('d M Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $replies->links() }}
</div>
@endsection
