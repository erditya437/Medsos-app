@extends('layouts.create')

@section('title', 'Buat Postingan')

@section('content')
<link rel="stylesheet" href="{{ asset('css/create.css') }}">

<h2>Buat Postingan</h2>

<div class="tag-list">
    @php
    $tags = ['sekolah','kreator','astronomi','edukasi','bisnis','programing','pribadi','romance','gaya','film','netflix','trending'];
    @endphp

    @foreach($tags as $tag)
    <div class="tag-item" onclick="toggleTag(this, '{{ $tag }}')">#{{ $tag }}</div>
    @endforeach
</div>

<div class="form-container">
    <form method="POST" action="/post/store" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="tag" id="tagInput" required>
        <textarea name="caption" placeholder="Tulis caption..."></textarea><br>
        <input type="file" name="media" accept="image/*,video/*" required><br>
        <button type="submit">Posting</button>
    </form>
</div>

<script>
    let selectedTags = [];

    function toggleTag(element, tag) {
        const index = selectedTags.indexOf(tag);
        if (index !== -1) {
            selectedTags.splice(index, 1);
            element.classList.remove('active');
        } else {
            if (selectedTags.length >= 5) {
                alert('Maksimal 5 tag saja!');
                return;
            }
            selectedTags.push(tag);
            element.classList.add('active');
        }

        document.getElementById('tagInput').value = selectedTags.join(',');
    }
</script>
@endsection
