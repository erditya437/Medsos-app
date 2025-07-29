@extends('layouts.notifikasi')

@section('title', 'Notifikasi')

@section('content')
<div class="container">
    <h2>📢 Notifikasi</h2>

    @if(count($notifications) == 0)
        <p style="text-align:center;">Tidak ada notifikasi.</p>
    @endif

    @foreach($notifications as $notif)
        <div class="notification-item">
            <img src="{{ $notif->from->profile_photo ? asset('storage/'.$notif->from->profile_photo) : 'https://via.placeholder.com/50' }}" alt="foto">

            <div class="notification-text">
                <strong>{{ $notif->from->name }}</strong>

                <p>
                    @switch($notif->type)
    @case('follow_request')
        mengirim permintaan pertemanan.
        @break

    @case('like_post')
        menyukai postingan kamu
        @if($notif->post)
            <br>
            <a href="{{ route('home', ['scroll_to' => $notif->post_id]) }}#post-{{ $notif->post_id }}" style="color:blue;">
                <small>"{{ $notif->post->caption }}"</small>
            </a>
        @endif
        @break

    @case('comment_post')
        mengomentari postingan kamu: {!! $notif->message !!}
        @if($notif->post)
            <br>
            <a href="{{ route('home', ['scroll_to' => $notif->post_id]) }}#post-{{ $notif->post_id }}" style="color:blue;">
                <small>"{{ $notif->post->caption }}"</small>
            </a>
        @endif
        @break

    @case('reply_comment')
        membalas komentar kamu: {!! $notif->message !!}
        @if($notif->post)
            <br>
            <a href="{{ route('home', ['scroll_to' => $notif->post_id]) }}#post-{{ $notif->post_id }}" style="color:blue;">
                <small>"{{ $notif->post->caption }}"</small>
            </a>
        @endif
        @break

    @case('like_comment')
        menyukai komentar kamu
        @if($notif->post)
            <br>
            <a href="{{ route('home', ['scroll_to' => $notif->post_id]) }}#post-{{ $notif->post_id }}" style="color:blue;">
                <small>"{{ $notif->post->caption }}"</small>
            </a>
        @endif
        @break

    @case('chat')
        mengirim pesan ke kamu.
        <a href="{{ route('chat.index', $notif->from->id) }}" style="color:blue;">Lihat Chat</a>
        @break

    @case('share_post')
        membagikan sebuah postingan kepada kamu:
        <a href="{{ route('home', ['scroll_to' => $notif->post_id]) }}#post-{{ $notif->post_id }}" style="color:blue;">Lihat Postingan</a>
        @break

        @case('like_story')
    menyukai story kamu.
    @if($notif->story)
        <br>
        <a href="{{ route('home', ['open_story' => $notif->story_id]) }}#story-{{ $notif->story_id }}" style="color:blue;">
            <small>"{{ $notif->story->caption }}"</small>
        </a>
    @endif
@break

@case('comment_story')
    mengomentari story kamu: {!! $notif->message !!}
    @if($notif->story)
        <br>
        <a href="{{ route('home', ['open_story' => $notif->story_id]) }}#story-{{ $notif->story_id }}" style="color:blue;">
            <small>"{{ $notif->story->caption }}"</small>
        </a>
    @endif
@break


    @default
        {!! $notif->message !!}
@endswitch

                </p>

                <small>{{ $notif->created_at->diffForHumans() }}</small>
            </div>

            @if($notif->type === 'follow_request')
            <div class="notifikasi-buttons">
    <form method="POST" action="{{ route('follow.accept', $notif->from->id) }}">
        @csrf
        <button class="btn-terima">Terima</button>
    </form>
    <form method="POST" action="{{ route('follow.reject', $notif->from->id) }}">
        @csrf
        <button class="btn-tolak">Tolak</button>
    </form>
</div>

            @endif
        </div>
    @endforeach
</div>
@endsection
