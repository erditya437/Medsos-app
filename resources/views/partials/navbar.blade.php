<div class="top-bar">
    <div class="logo">
   
</div>

    <div class="top-search-bar">
        @php
$user = Auth::user();
@endphp

        <form action="{{ route('friends.search') }}" method="GET" style="display:flex;gap:5px;">
            <input type="text" name="q" placeholder="Cari teman..." style="padding:8px; border-radius:6px; border:1px solid #ccc;">
            <button type="submit" style="padding:8px 12px; border-radius:6px; background:#2563eb; color:white; border:none; cursor:pointer;">🔍</button>
        </form>
    </div>
    <div class="profile-header">
        <img src="{{ $user->profile_photo ? asset('storage/'.$user->profile_photo) : 'https://via.placeholder.com/100' }}" alt="Profile Photo">
        <p>{{ $user->name }}</p>
    </div>

    
</div>



<nav>
    <div class="logo-container">
        <img src="{{ asset('logo.jpg') }}" alt="Logo">
        <span>Orbitalk</span>
    </div>

    <ul>
        <li><a href="/home">Home</a></li>
        <li><a href="/post/create">Buat Postingan</a></li>
        <li><a href="/notifikasi">Notifikasi</a></li>

        <li class="dropdown">
           <button class="dropdown-toggle">
                Menu <span class="arrow">▼</span>
            </button>

            <div class="dropdown-content">
                <a href="/story">Story</a>
                <a href="/friends">Teman</a>
                <a href="/chat">Chat</a>
                <a href="/profile">Profile</a>
            </div>
        </li>

        <li><a href="/logout" class="logout">Logout</a></li>
    </ul>
</nav>


<script>
document.addEventListener('DOMContentLoaded', function() {
    const dropdown = document.querySelector('.dropdown');
    const toggleBtn = document.querySelector('.dropdown-toggle');

    toggleBtn.addEventListener('click', function(e) {
        e.preventDefault();
        dropdown.classList.toggle('open');
    });
});
</script>
