
<style>
#story-modal {
    display:none;
    position:fixed;
    top:0;
    left:0;
    width:100vw;
    height:100vh;
    background:rgba(0,0,0,0);
    backdrop-filter:blur(5px);
     z-index: 9999; /* lebih tinggi dari navbar */
    align-items:center;
    justify-content:center;
}

#story-content {
    background: rgba(255, 255, 255, 0.24);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    padding: 20px;
    border-radius: 12px;
    max-width: 450px;
    width: 90%;
    max-height: 90vh;
    overflow-y: auto;
    position: relative;
    box-shadow: 0 8px 20px rgba(99, 99, 99, 0);
    animation: popupFade 0.3s ease;
}

@keyframes popupFade {
    from { transform: scale(0.95); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
}

#story-content button.close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    background: #ffffffff;
    color: white;
    border: none;
    border-radius: 50%;
    width: 35px; height: 35px;
    font-size: 18px;
    cursor: pointer;
}

#story-content button.close-btn:hover {
    background: #ffffffff;
}

.story-user-info {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 15px;
}

.story-user-info img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
}

#story-media {
    margin: 15px 0;
    text-align: center;
}

#story-media img,
#story-media video {
    width: 100%;
    max-height: 300px;
    object-fit: contain;
    border-radius: 10px;
}

#story-caption {
    margin-bottom: 10px;
    font-weight: 500;
    text-align: center;
}

.story-like-section button {
    all: unset; /* reset semua gaya default */
    cursor: pointer;
    font-size: 22px;
    color: #2563eb;
    transition: transform 0.2s;
}

.story-like-section button:hover {
    transform: scale(1.2);
    color: #1d4ed8;
}


#story-comment-text {
    width: 100%;
    padding: 10px;
    border-radius: 8px;
    border: 1px solid #e2e8f0;
    margin-bottom: 10px;
    resize: vertical;
}

#story-comment-text:focus {
    outline: none;
    border-color: #2563eb;
    box-shadow: 0 0 0 2px rgba(37,99,235,0.3);
}

.send-comment-btn {
    background: #7ad9ffff;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 8px;
    width: 100%;
    cursor: pointer;
    transition: 0.2s;
}

.send-comment-btn:hover {
    background: #1d4ed8;
}

/* Delete Button */
.delete-btn {
    
    color: gray;
    border: none;
    padding: 8px 15px;
    border-radius: 8px;
    font-size: 14px;
    cursor: pointer;
    margin-bottom: 10px;
    display: block;
    margin-left: auto;
    margin-right: auto;
    transition: background 0.3s;
}
.delete-btn:hover {
    background-color: #b32323ff;
    color:white;
}

/* Next/Prev Buttons */
.story-navigation {
    display: flex;
    justify-content: space-between;
    margin: 15px 0;
}
.story-navigation button {
    background-color: #4a90e2;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    font-size: 14px;
    cursor: pointer;
    transition: background 0.3s;
}
.story-navigation button:hover {
    background-color: #357abd;
}

/* Optional: smooth hover effect for close button */
.close-btn {
    background: transparent;
    border: none;
    font-size: 18px;
    cursor: pointer;
    margin-left: auto;
    display: block;
    transition: transform 0.2s;
}
.close-btn:hover {
    transform: scale(1.2);
}

</style>

<div id="story-modal">
    <div id="story-content">
        <div id="story-time" style="margin-bottom:10px;font-size:12px;color:gray;text-align:center;"></div>
        <button class="close-btn" onclick="closeStory()">❌</button>
        <button id="delete-story-btn" class="delete-btn" style="display:none;" onclick="deleteStory()">🗑️ Hapus</button>

        <div class="story-user-info">
            <img id="story-user-photo" src="">
            <strong id="story-username"></strong>
        </div>

        <div id="story-media"></div>
        <p id="story-caption"></p>

        <div class="story-like-section">
            <button id="story-like-btn" onclick="toggleStoryLike()">🤍</button> 
            <span id="story-like-count">0</span> suka
        </div>
        <div class="story-navigation">
    <button onclick="prevStory()">⬅️ Prev</button>
    <button onclick="nextStory()">Next ➡️</button>
</div>



        <textarea id="story-comment-text" placeholder="Tulis komentar..."></textarea>
        <button class="send-comment-btn" onclick="submitStoryComment()">Kirim Komentar</button>
    </div>
</div>
