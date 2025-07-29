<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Notifikasi')</title>
    <link rel="stylesheet" href="{{ asset('css/notifikasi.css') }}">
     <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>
<body>


 @include('partials.navbar')    

<div class="notifikasi-container">
    @yield('content')
</div>

</body>
</html>

