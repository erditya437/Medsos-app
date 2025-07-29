@extends('layouts.profile')

@section('title', $user->name)

@section('content')
<div class="cover-photo">
    <img src="{{ $user->cover_photo ? asset('storage/'.$user->cover_photo) : 'https://via.placeholder.com/800x200' }}">
</div>

<div class="profile-section">
    <div class="profile-photo">
        <img src="{{ $user->profile_photo ? asset('storage/'.$user->profile_photo) : 'https://via.placeholder.com/100' }}">
    </div>
    <div class="profile-info">
        <h2>{{ $user->name }}</h2>
        <p>{{ $user->bio }}</p>
        <div class="follow-stats">
            <span>Post: <b>{{ $posts->count() }}</b></span>|
            <span style="cursor:pointer;" onclick="showFollowers({{ $user->id }})">Pengikut: <span id="followers-count">0</span></span> |
            <span style="cursor:pointer;" onclick="showFollowing({{ $user->id }})">Mengikuti: <span id="following-count">0</span></span> 
           
        </div>

        @if(Auth::id() === $user->id)
            <button onclick="openEditProfile()">✏️ Edit Profil</button>
        @else
            <button id="follow-btn" onclick="toggleFollow({{ $user->id }})">Follow</button>
        @endif
    </div>
</div>

<!-- Edit Profile Modal -->
<div id="edit-profile-modal" class="modal" >
    <div class="modal-content">
        <span onclick="closeEditProfile()" style="float:right;cursor:pointer;">❌</span>
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="name" value="{{ $user->name }}" required><br>
            <textarea name="bio">{{ $user->bio }}</textarea><br>
            <label>Foto Profil</label><input type="file" name="profile_photo"><br>
            <label>Foto Sampul</label><input type="file" name="cover_photo"><br>
            <button type="submit">Simpan</button>
        </form>
    </div>
</div>

<!-- Modal Pengikut -->
<div id="followers-modal" class="modal">
    <div class="modal-content">
        <span onclick="closeFollowers()" style="float:right;cursor:pointer;">❌</span>
        <h3>Pengikut</h3>
        <div id="followers-list"></div>
    </div>
</div>

<!-- Modal Mengikuti -->
<div id="following-modal" class="modal">
    <div class="modal-content">
        <span onclick="closeFollowing()" style="float:right;cursor:pointer;">❌</span>
        <h3>Mengikuti</h3>
        <div id="following-list"></div>
    </div>
</div>

<!-- Postingan -->
<div class="main-content">
    <div class="postingan-wrapper">
       @forelse($posts as $post)
        <div class="postingan-item">
          <a href="/home#post-{{ $post->id }}">{{ $post->caption }}</a>
            @if($post->media)
              @if($post->media_type == 'photo')
                <img src="{{ asset('storage/'.$post->media) }}">
              @elseif($post->media_type == 'video')
                <video controls>
                    <source src="{{ asset('storage/'.$post->media) }}">
                </video>
              @endif
            @endif
            <form method="POST" action="{{ route('post.delete', $post->id) }}" onsubmit="return confirm('Hapus postingan ini?')">
                @csrf
                @method('DELETE')
                <button type="submit">❌ Hapus</button>
            </form>
        </div>
        @empty
            <p>Kamu belum membuat postingan.</p>
        @endforelse
    </div>
</div>


</div>

@endsection

@section('scripts')
<script>
function openEditProfile() {
    document.getElementById('edit-profile-modal').classList.add('show');
}
function closeEditProfile() {
    document.getElementById('edit-profile-modal').classList.remove('show');
}


function showFollowers(userId) {
    document.getElementById('followers-modal').classList.add('show');
    fetch(`/followers/${userId}`).then(res => res.json()).then(data => {
        const authId = {{ Auth::id() }};
        document.getElementById('followers-list').innerHTML = data.map(f => `
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:10px;">
                <div style="display:flex;align-items:center;gap:10px;">
                    <img src="${f.profile_photo}" style="width:40px;height:40px;border-radius:50%;">
                    <span>${f.name}</span>
                </div>
                ${f.id !== authId ? `<a href="/profile/${f.id}" style="padding:5px 10px;background:#2563eb;color:white;border-radius:6px;text-decoration:none;">Lihat Profil</a>` : ''}
            </div>
        `).join('');
    });
}

function closeFollowers() {
    document.getElementById('followers-modal').classList.remove('show');
}

function showFollowing(userId) {
    document.getElementById('following-modal').classList.add('show');
    fetch(`/following/${userId}`).then(res => res.json()).then(data => {
        const authId = {{ Auth::id() }};
        document.getElementById('following-list').innerHTML = data.map(f => `
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:10px;">
                <div style="display:flex;align-items:center;gap:10px;">
                    <img src="${f.profile_photo}" style="width:40px;height:40px;border-radius:50%;">
                    <span>${f.name}</span>
                </div>
                ${f.id !== authId ? `<a href="/profile/${f.id}" style="padding:5px 10px;background:#2563eb;color:white;border-radius:6px;text-decoration:none;">Lihat Profil</a>` : ''}
            </div>
        `).join('');
    });
}

function closeFollowing() {
    document.getElementById('following-modal').classList.remove('show');
}

function toggleFollow(userId) {
    fetch('/follow-toggle', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ user_id: userId })
    }).then(res => res.json())
      .then(data => {
        document.getElementById('follow-btn').innerText = data.following ? 'Unfollow' : 'Follow';
        loadCounts(userId);
    });
}

function loadCounts(userId) {
    fetch(`/follow-count/${userId}`)
    .then(res => res.json())
    .then(({followers, following}) => {
        document.getElementById('followers-count').innerText = followers;
        document.getElementById('following-count').innerText = following;
    });
}

loadCounts({{ $user->id }});
</script>
@endsection
