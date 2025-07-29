@extends('layouts.friend')

@section('title', 'Daftar Teman')

@section('content')
<h2>👥 Daftar Teman</h2>

@if($followers->isEmpty())
    <p style="text-align:center;color:#666;">Belum ada teman.</p>
@else
    <div class="friend-grid">
        @foreach($followers as $follow)
            <div class="friend-card">
                <img src="{{ $follow->follower->profile_photo ? asset('storage/'.$follow->follower->profile_photo) : 'https://via.placeholder.com/80' }}" alt="foto teman">

                <div class="friend-name">
                     <small>{{ '@'.$follow->follower->username ?? '' }}</small>
                    <strong>{{ $follow->follower->name }}</strong><br>
                   
                </div>

                <div class="friend-actions">
                    <a href="{{ route('chat.index', $follow->follower->id) }}">
                        <button class="chat-btn">💬 Chat</button>
                    </a>
                    <a href="{{ route('profile.show', $follow->follower->id) }}">
                        <button class="profile-btn">🙍‍♂️ Profil</button>
                    </a>
                    <form action="{{ route('friends.destroy', $follow->follower->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="delete-btn">❌ Hapus</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection
