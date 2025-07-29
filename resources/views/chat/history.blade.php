@extends('layouts.chat')

@section('title', 'Riwayat Chat')

@section('content')
<h2>Riwayat Chat</h2>
@if($friends->isEmpty())
    <p>Tidak ada teman untuk chat.</p>
@else
    @foreach($friends as $friend)
        <div class="friend-item">
            <img src="{{ $friend->profile_photo ? asset('storage/'.$friend->profile_photo) : 'https://via.placeholder.com/50' }}" width="50" style="border-radius:50%;">
            <strong>{{ $friend->name }}</strong><br>
            <a href="{{ route('chat.index', $friend->id) }}">Mulai Chat</a>
        </div>
    @endforeach
@endif
@endsection
