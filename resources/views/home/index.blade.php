@extends('layouts.home')

@section('title', 'Home')
@include('story.story-modal')
@include('story.story-script')


@section('content')
<div class="story-container">
    @foreach($stories as $userId => $userStories)
        @php $firstStory = $userStories->first(); @endphp
        <div class="story-thumbnail {{ $userId == auth()->id() ? 'own-story' : '' }}" onclick="openStory({{ $userId }})">
            <div class="story-photo">
                <img src="{{ $firstStory->user->profile_photo ? asset('storage/'.$firstStory->user->profile_photo) : 'https://via.placeholder.com/100' }}">
            </div>
            <p class="story-username">{{ $firstStory->user->name }}</p>
        </div>
    @endforeach
</div>




<h1 class="title-post">Postingan Terbaru</h1>
<div class="page-container" id="page-container">
<div id="posts-wrapper">
    @foreach($posts as $post)
    <div class="post-container" id="post-{{ $post->id }}" data-post-id="{{ $post->id }}">
        <div class="post-info">
           <a href="{{ route('profile.show', $post->user_id) }}">
            <img src="{{ $post->user->profile_photo ? asset('storage/'.$post->user->profile_photo) : 'https://via.placeholder.com/50' }}">
            </a>

            <div>
               <a href="{{ route('profile.show', $post->user_id) }}"><strong>{{ $post->user->name }}</strong></a>
                <div class="post-meta">
                    <small>{{ $post->created_at->diffForHumans() }}</small>
                </div>
                <p class="caption">
    {{ $post->caption }}
    @if($post->tag)
        @foreach(explode(',', $post->tag) as $tag)
            <span class="tag">#{{ trim($tag) }}</span>
        @endforeach
    @endif
</p>

            </div>
        </div>

        <div>
        @if($post->media_type === 'photo')
            <img src="{{ asset('storage/'.$post->media) }}" class="post-image">
        @else
            <video controls class="post-video">
                <source src="{{ asset('storage/'.$post->media) }}" type="video/mp4">
            </video>
        @endif
    </div>


      <div class="actions">
    <span id="like-btn-{{ $post->id }}" 
        onclick="toggleLike('post', '{{ $post->id }}')" 
        style="cursor:pointer;">🤍</span> 
    <span id="like-count-{{ $post->id }}">0</span> Like |
    <button type="button" onclick="openComment('{{ $post->id }}')">💬</button> |
     <button type="button" onclick="openShare('{{ $post->id }}')">🔗</button>
</div>

    </div>
    @endforeach
</div>

<div id="sidebar-comment" class="sidebar-comment">
    <div id="sidebar-post-info"></div>

    <div id="sidebar-scroll">
        <div id="sidebar-comments"></div>
    </div>

    <form id="comment-form" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="post_id" id="post_id">
    <input type="hidden" name="reply_to" id="reply_to" value="">
    <div class="comment-actions">
        <textarea id="comment-text" name="comment" placeholder="Tulis komentar..."></textarea>
        
        <!-- Label tombol file -->
        <label for="comment-media" class="btn-upload">📎</label>
        <input type="file" id="comment-media" name="media" accept="image/*,video/*" style="display:none;">
        
        <button type="submit" class="btn-submit">Kirim</button>
        <button type="button" onclick="closeComment()" class="btn-close">❌</button>
    </div>
</form>
</div>

<!-- Modal Share -->
<div id="share-modal" style="display:none; position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.6);align-items:center;justify-content:center;">
    <div style="background:white;padding:20px;border-radius:8px;width:300px;max-height:80vh;overflow-y:auto;">
        <h3>Bagikan ke Teman</h3>
        <form id="share-form" method="POST" action="{{ route('share.store') }}">
            @csrf
            <input type="hidden" name="post_id" id="share-post-id">

            @foreach($followers as $follow)
            <div style="display:flex;align-items:center;margin-bottom:8px;">
                <input type="checkbox" name="to_user_ids[]" value="{{ $follow->follower->id }}" style="margin-right:10px;">
                <span>{{ '@'.$follow->follower->name }}</span>
            </div>
            @endforeach

            <button type="submit" style="margin-top:10px;">✅ Kirim</button>
            <button type="button" onclick="closeShare()" style="margin-left:10px;">❌ Batal</button>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
function openComment(postId) {
    document.getElementById('sidebar-comment').style.display = 'block';
    loadCommentSidebar(postId);
}

function closeComment() {
    document.getElementById('sidebar-comment').style.display = 'none';
    document.getElementById('sidebar-post-info').innerHTML = '';
    document.getElementById('sidebar-comments').innerHTML = '';
    document.getElementById('comment-text').placeholder = 'Tulis komentar...';
    document.getElementById('reply_to').value = '';
}

function replyComment(username, commentId) {
    document.getElementById('reply_to').value = commentId;
    document.getElementById('comment-text').placeholder = `Membalas @${username}...`;
    document.getElementById('comment-text').focus();
}

function toggleReplies(element, id) {
    const target = document.getElementById(`replies-${id}`);
    if (target.style.display === 'none') {
        target.style.display = 'block';
        element.innerText = 'Sembunyikan balasan ↑';
    } else {
        target.style.display = 'none';
        element.innerText = element.dataset.originalText;
    }
}

function renderReplies(replies) {
    if (!replies.length) return '';

    let html = '<div style="margin-left:20px;">';
    replies.forEach(reply => {
        const mention = reply.parent ? `@${reply.parent.user.name} ` : '';

        html += `
       <div class="reply-item">
            <img src="${reply.user.profile_photo}" class="comment-user-photo">
            <strong>${reply.user.name}</strong>: ${mention}${reply.comment}
            ${reply.media_type === 'photo' 
                ? `<br><img src="/storage/${reply.media}" class="comment-media-photo">` 
                : ''}
            ${reply.media_type === 'video' 
                ? `<br><video controls class="comment-media-video"><source src="/storage/${reply.media}"></video>` 
                : ''}
            <small style="color:gray;">${reply.created_at}</small>
            <div style="font-size:12px;margin-top:3px;">
                <span id="like-btn-${reply.id}" onclick="toggleLike('comment', '${reply.id}')" style="cursor:pointer;">🤍</span>
                <span id="like-count-${reply.id}">0</span> Like |
                💬 <span onclick="replyComment('${reply.user.name}', '${reply.id}')" style="color:blue;cursor:pointer;">Balas</span>
            </div>
        `;

        if (reply.replies.length > 0) {
            html += `
                <div onclick="toggleReplies(this, '${reply.id}')" data-original-text="Lihat ${reply.replies.length} balasan ↓" style="color:blue;cursor:pointer;margin-left:35px;margin-top:5px;">
                    Lihat ${reply.replies.length} balasan ↓
                </div>
                <div id="replies-${reply.id}" style="display:none;">
                    ${renderReplies(reply.replies)}
                </div>
            `;
        }

        html += '</div>';
    });
    html += '</div>';
    return html;
}


function loadCommentSidebar(postId) {
    fetch(`/api/comments/${postId}`)
        .then(res => res.json())
        .then(({post, comments}) => {
            document.getElementById('sidebar-post-info').innerHTML = `
            <div class="sidebar-post-header">
                <img src="${post.user.profile_photo}" class="sidebar-post-photo">
                <div class="sidebar-post-details">
                    <strong class="sidebar-post-username">${post.user.name}</strong> 
                   ${post.tag ? `
    <div class="sidebar-post-tag">
        ${post.tag.split(',').map(tag => `<span>#${tag.trim()}</span>`).join(' ')}
    </div>
` : ''}

                    <p class="sidebar-post-caption">${post.caption ?? ''}</p>
                </div>
            </div>
        `;

            let html = '';
           comments.slice().reverse().forEach(comment => {
                html += `
    <div style="margin-top:15px;">
       <img src="${comment.user.profile_photo}" class="comment-user-photo">
        <strong>${comment.user.name}</strong>: ${comment.comment}
       ${comment.media_type === 'photo' ? `<br><img src="/storage/${comment.media}" class="comment-media-photo">` : ''}
       ${comment.media_type === 'video' ? `<br><video controls class="comment-media-video"><source src="/storage/${comment.media}"></video>` : ''}

        <small style="color:gray;">${comment.created_at}</small>
        <div style="font-size:12px;margin-top:5px;">
            <span id="like-btn-${comment.id}" onclick="toggleLike('comment', '${comment.id}')" style="cursor:pointer;">🤍</span>
            <span id="like-count-${comment.id}">0</span> Like |
            💬 <span onclick="replyComment('${comment.user.name}', '${comment.id}')" style="color:blue;cursor:pointer;">Balas</span>
        </div>
`;

                if (comment.replies.length > 0) {
                    html += `
                        <div onclick="toggleReplies(this, '${comment.id}')" data-original-text="Lihat ${comment.replies.length} balasan ↓" style="color:blue;cursor:pointer;margin-left:35px;margin-top:5px;">
                            Lihat ${comment.replies.length} balasan ↓
                        </div>
                        <div id="replies-${comment.id}" style="display:none;">
                            ${renderReplies(comment.replies)}
                        </div>
                    `;
                }
                html += '</div>';
            });

            
            document.getElementById('sidebar-comments').innerHTML = html;
            document.getElementById('post_id').value = postId;

            // Update status like tanpa nambahin tombol lagi
comments.forEach(comment => {
    fetchLikeStatus('comment', comment.id);
    if (comment.replies.length > 0) {
        comment.replies.forEach(reply => fetchLikeStatus('comment', reply.id));
    }
});
        });
}

document.getElementById('comment-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    fetch('/api/comments', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        },
        body: formData
    })
    .then(res => res.json())
    .then(() => {
        document.getElementById('comment-text').value = '';
        document.getElementById('comment-media').value = '';
        document.getElementById('reply_to').value = '';
        loadCommentSidebar(formData.get('post_id'));
    });
});
</script>

<script>
function toggleLike(type, id) {
    const payload = type === 'post' ? { post_id: id } : { comment_id: id };
    fetch('/api/like/toggle', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(payload)
    })
    .then(res => res.json())
    .then(() => fetchLikeStatus(type, id));  // selalu refresh status
}

function fetchLikeStatus(type, id) {
    const query = type === 'post' ? `post_id=${id}` : `comment_id=${id}`;
    fetch(`/api/like/status?${query}`)
    .then(res => res.json())
    .then(data => {
        const btn = document.getElementById(`like-btn-${id}`);
        const count = document.getElementById(`like-count-${id}`);
        if (btn && count) {
            btn.innerText = data.liked ? '❤️' : '🤍';
            count.innerText = data.count;
        }
    });
}

window.addEventListener('DOMContentLoaded', () => {
    @foreach($posts as $post)
        fetchLikeStatus('post', '{{ $post->id }}');
    @endforeach
});

function openComment(postId) {
    document.getElementById('sidebar-comment').style.display = 'flex';
    document.getElementById('page-container').classList.add('shifted');
    loadCommentSidebar(postId);
}

function closeComment() {
    document.getElementById('sidebar-comment').style.display = 'none';
    document.getElementById('page-container').classList.remove('shifted');
    document.getElementById('sidebar-post-info').innerHTML = '';
    document.getElementById('sidebar-comments').innerHTML = '';
    document.getElementById('comment-text').placeholder = 'Tulis komentar...';
    document.getElementById('reply_to').value = '';
}


</script>

<script>
    // Auto play/pause video saat scroll
const videos = document.querySelectorAll('.post-video');
const videoObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        const video = entry.target;
        if (entry.isIntersecting) {
            video.play();
        } else {
            video.pause();
        }
    });
}, { threshold: 0.6 });

videos.forEach(video => videoObserver.observe(video));

// Auto load komentar sesuai postingan yang terlihat saat sidebar aktif
const posts = document.querySelectorAll('.post-container');
const postObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const postId = entry.target.getAttribute('data-post-id');
            if (document.getElementById('sidebar-comment').style.display === 'flex') {
                loadCommentSidebar(postId);
                document.getElementById('post_id').value = postId;
            }
        }
    });
}, { threshold: 0.7 });

posts.forEach(post => postObserver.observe(post));

</script>

<script>
function openShare(postId) {
    document.getElementById('share-modal').style.display = 'flex';
    document.getElementById('share-post-id').value = postId;
}

function closeShare() {
    document.getElementById('share-modal').style.display = 'none';
    document.getElementById('share-post-id').value = '';
}
</script>


<script>
window.addEventListener('DOMContentLoaded', function() {
    const params = new URLSearchParams(window.location.search);
    const scrollId = params.get('scroll_to');
    if (scrollId) {
        const target = document.getElementById('post-' + scrollId);
        if (target) {
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }
});

</script>


@endsection
