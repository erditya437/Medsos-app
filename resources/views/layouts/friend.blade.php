<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Daftar Teman')</title>
    <link rel="stylesheet" href="{{ asset('css/friend.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>
<body>

@include('partials.navbar')

<div class="friend-layout">
    @yield('content')
</div>

</body>
</html>