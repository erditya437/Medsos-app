@extends('layouts.story')

@section('title', 'Story')

@section('content')
<div class="container">

    <h1>Buat Story</h1>
    <form action="{{ route('story.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <select name="media_type" required>
            <option value="text">Text</option>
            <option value="photo">Photo</option>
            <option value="video">Video</option>
        </select>

        <input type="text" name="caption" placeholder="Caption...">
        <input type="color" name="background_color" value="#000000">
        <input type="file" name="media">

        <button type="submit">Tambah Story</button>
    </form>

    <hr>

    <h1>Semua Story</h1>
    <div class="story-list">
        @foreach($stories as $userId => $userStories)
            @php $latest = $userStories->first(); $user = $latest->user; @endphp
           <div onclick="openStory({{ $userId }})" class="story-item {{ $userId == auth()->id() ? 'own-story' : '' }}">
                @if($latest->media_type === 'text')
                    <div class="text-circle" style="background:{{ $latest->background_color }}">
                        {{ Str::limit($latest->caption, 15) }}
                    </div>
                @else
                    <img src="{{ asset('storage/'.$latest->media) }}">
                @endif
                <div class="story-username">{{ $user->name }}</div>
            </div>
        @endforeach
    </div>

</div>

@include('story.story-modal')
@endsection

@section('scripts')
    @include('story.story-script')
@endsection
