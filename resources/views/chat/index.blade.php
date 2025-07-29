@extends('layouts.chat')

@section('title', 'Chat dengan ' . $friend->name)

@section('content')
<h2>Chat dengan {{ $friend->name }}</h2>

<div class="chat-box" style="max-height: 400px; overflow-y: auto;">
    @forelse($chats as $chat)
        <div class="chat-message {{ $chat->from_user_id == auth()->id() ? 'me' : 'you' }}">
             <p>{!! $chat->message !!}</p>
            @if($chat->media)
                @if($chat->media_type == 'image')
                    <img src="{{ asset('storage/'.$chat->media) }}" width="150">
                @elseif($chat->media_type == 'video')
                    <video width="200" controls>
                        <source src="{{ asset('storage/'.$chat->media) }}">
                    </video>
                @endif
            @endif
            <small>{{ $chat->created_at->diffForHumans() }}</small>
        </div>
    @empty
        <p>Belum ada chat.</p>
    @endforelse
</div>

<form action="{{ route('chat.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="to_user_id" value="{{ $friend->id }}">
    <textarea name="message" placeholder="Tulis pesan..." style="width: 100%; margin-bottom: 10px;"></textarea>
    <input type="file" name="media"><br><br>
    <button type="submit">Kirim</button>
</form>
@endsection
