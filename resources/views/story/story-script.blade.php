<script>
let stories = @json($stories);
let currentStory = null;
let currentIndex = 0;
let currentUserId = null;

function openStory(userId, index = 0) {
    let userStories = stories[userId];
    if (!userStories || userStories.length === 0) return alert('Tidak ada story');

    currentUserId = userId;
    currentIndex = index;
    let story = userStories[currentIndex];
    currentStory = story;

    document.getElementById('story-modal').style.display = 'flex';
    document.getElementById('story-user-photo').src = story.user.profile_photo ? '/storage/' + story.user.profile_photo : 'https://via.placeholder.com/40';
    document.getElementById('story-username').innerText = story.user.name;

    if (story.media_type === 'text') {
        document.getElementById('story-media').innerHTML = `<div style="background:${story.background_color};padding:50px;color:white;">${story.caption}</div>`;
    } else if (story.media_type === 'photo') {
        document.getElementById('story-media').innerHTML = `<img src="/storage/${story.media}" style="width:100%;">`;
    } else if (story.media_type === 'video') {
        document.getElementById('story-media').innerHTML = `<video controls src="/storage/${story.media}" style="width:100%;"></video>`;
    }

    if (story.user.id === {{ Auth::id() }}) {
        document.getElementById('delete-story-btn').style.display = 'block';
    } else {
        document.getElementById('delete-story-btn').style.display = 'none';
    }

    document.getElementById('story-caption').innerText = story.caption;

    // ✅ Waktu Story Ditambahkan
    const createdAt = new Date(story.created_at);
    const now = new Date();
    const diffMs = now - createdAt;
    const diffMinutes = Math.floor(diffMs / 60000);
    let timeText = '';
    if (diffMinutes < 1) {
        timeText = 'Baru saja';
    } else if (diffMinutes < 60) {
        timeText = diffMinutes + ' menit lalu';
    } else if (diffMinutes < 1440) {
        const diffHours = Math.floor(diffMinutes / 60);
        timeText = diffHours + ' jam lalu';
    } else {
        const diffDays = Math.floor(diffMinutes / 1440);
        timeText = diffDays + ' hari lalu';
    }
    document.getElementById('story-time').innerText = timeText;

    fetch(`/story-like/status/${story.id}`)
    .then(res => res.json())
    .then(res => {
        document.getElementById('story-like-btn').innerText = res.liked ? '❤️' : '🤍';
        document.getElementById('story-like-count').innerText = res.likes;
    });
}

function closeStory() {
    document.getElementById('story-modal').style.display = 'none';
    const mediaDiv = document.getElementById('story-media');
    const video = mediaDiv.querySelector('video');
    if (video) {
        video.pause();
        video.currentTime = 0;
    }
}

function toggleStoryLike() {
    if (!currentStory) return;
    fetch(`{{ route('story.like') }}`, {
        method: 'POST',
        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}','Content-Type': 'application/json'},
        body: JSON.stringify({ story_id: currentStory.id })
    }).then(res => res.json()).then(res => {
        document.getElementById('story-like-btn').innerText = res.liked ? '❤️' : '🤍';
        document.getElementById('story-like-count').innerText = res.like_count;
    });
}

function submitStoryComment() {
    let comment = document.getElementById('story-comment-text').value;
    if (!comment.trim()) return alert('Komentar kosong');
    fetch(`{{ route('story.comment') }}`, {
        method: 'POST',
        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}','Content-Type': 'application/json'},
        body: JSON.stringify({ story_id: currentStory.id, comment: comment })
    }).then(res => res.json()).then(() => {
        alert('Komentar berhasil!');
        document.getElementById('story-comment-text').value = '';
    });
}

function deleteStory() {
    if (!currentStory) return;
    if (!confirm('Yakin hapus story?')) return;
    fetch(`/story/${currentStory.id}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    }).then(res => res.json()).then(() => {
        alert('Story dihapus.');
        closeStory();
        location.reload();
    });
}

function nextStory() {
    let userStories = stories[currentUserId];
    if (currentIndex + 1 < userStories.length) {
        openStory(currentUserId, currentIndex + 1);
    } else {
        alert('Tidak ada story berikutnya.');
    }
}

function prevStory() {
    if (currentIndex - 1 >= 0) {
        openStory(currentUserId, currentIndex - 1);
    } else {
        alert('Tidak ada story sebelumnya.');
    }
}
</script>
