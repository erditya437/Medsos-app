<!-- resources/views/friends/search.blade.php -->
@extends('layouts.friend')

@section('title', 'Cari Teman')

@section('content')
<h1 class="search-container">Hasil Pencarian: "{{ $query }}"</h1>

@if($friends->count() == 0)
    <p class="search-container">Tidak ditemukan teman.</p>
@endif

@foreach($friends as $friend)
    <div class="friend-card">
        <img src="{{ $friend->profile_photo ? asset('storage/'.$friend->profile_photo) : 'https://via.placeholder.com/50' }}">
        <div class="friend-info">
            <strong>{{ $friend->name }}</strong>
            <a href="{{ route('profile.show', $friend->id) }}">Lihat Profil</a>
        </div>
    </div>
@endforeach

@endsection
