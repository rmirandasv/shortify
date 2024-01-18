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
        <nav class="py-3 px-4 lg:px-10 flex justify-between bg-transparent">
            <span class="text-2xl font-bold">{{ config('app.name') }}</span>
            <div class="flex items-center space-x-4">
                <a href="" class="text-gray-100 hover:text-white">Login</a>
                <a href="" class="text-gray-100 hover:text-white">Register</a>
            </div>
        </nav>
        <div class="h-full flex flex-col items-center">
            <div class="mt-56 flex flex-col max-w-7xl mx-auto">
                <h1 class="text-4xl font-bold text-white">
                    Shortify is an open source URL shortener.
                </h1>
                <livewire:components.create-shortlink-public-form />
            </div>
            <footer class="mt-auto py-3 px-4 lg:px-10 flex justify-between bg-transparent absolute bottom-5">
                <span class="text-gray-50">Made with ❤️ by <a href="" class="text-gray-50 hover:text-white">Ronald Miranda</a></span>
            </footer>
        </div>
    </div>
</body>

</html>
