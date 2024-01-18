<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    @vite('resources/css/app.css')
</head>

<body class="antialiased">
    <div class="min-h-screen flex flex-col bg-gradient-to-br from-gray-400 via-gray-600 to-gray-800">
        {{ $slot }}
    </div>
    <footer class="flex justify-center">
        <div class="mt-auto py-3 px-4 lg:px-10 flex justify-center items-center bg-transparent absolute bottom-5">
            <span class="text-gray-50">Made with ❤️ by <a href="" class="text-gray-50 hover:text-white">Ronald Miranda</a></span>
        </div>
    </footer>
</body>

</html>
