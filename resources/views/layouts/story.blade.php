<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - MedsosApp</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/story.css') }}">
</head>
<body>

    @include('partials.navbar')

    <div class="story-page">
        @yield('content')
    </div>

    @yield('scripts')

</body>
</html>
