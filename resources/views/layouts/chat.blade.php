<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Chat')</title>
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>
<body>

@include('partials.navbar')

<div class="chat-layout">
    <div class="sidebar">
        @yield('sidebar')
    </div>
    <div class="main-chat">
        @yield('content')
    </div>
</div>

</body>
</html>