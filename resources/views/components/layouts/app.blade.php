<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body class="antialiased bg-gradient-to-br from-gray-400 via-gray-600 to-gray-800">
    <div class="min-h-screen flex flex-col">
        {{ $slot }}
    </div>
    <footer class="mt-10 flex justify-center py-3">
        <div class="mt-auto px-4 lg:px-10 flex justify-center items-center bg-transparent">
            <span class="text-gray-50">Made with ❤️ by <a href="" class="text-gray-50 hover:text-white">Ronald Miranda</a></span>
        </div>
    </footer>
</body>

</html>
