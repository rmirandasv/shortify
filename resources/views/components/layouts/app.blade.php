<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="min-h-screen">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <meta name="title" content="{{ config('app.name') }}">
    <meta name="description" content="Free and open source URL shortener">
    <meta name="author" content="Ronald Miranda">
    <meta name="image" content="{{ asset('images/screenshoot.png') }}">
    <meta property="og:title" content="{{ config('app.name') }}">
    <meta property="og:description" content="Free and open source URL shortener">
    <meta property="og:image" content="{{ asset('images/screenshoot.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ config('app.name') }}">
    <meta name="twitter:description" content="Free and open source URL shortener">
    <meta name="twitter:image" content="{{ asset('images/screenshoot.png') }}">
    <meta name="twitter:site" content="@r_miranda9">
    <meta name="twitter:creator" content="@r_miranda9">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body class="antialiased bg-gradient-to-br from-gray-400 via-gray-600 to-gray-800 flex flex-col h-full">
    <main class="h-full flex flex-col">
        {{ $slot }}
    </main>
    @stack('scripts')
    <x-footer />
</body>

</html>
