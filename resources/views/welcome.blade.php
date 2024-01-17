<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    @vite('resources/css/app.css')
</head>

<body class="antialiased">
    <div class="min-h-screen flex flex-col bg-gradient-to-br from-gray-100 via-gray-300 to-gray-400">
        <nav class="py-3 px-4 lg:px-10 flex justify-between bg-transparent">
            <span class="text-2xl font-bold">{{ config('app.name') }}</span>
            <div class="flex items-center space-x-4">
                <a href="" class="text-gray-700 hover:text-gray-900">Login</a>
                <a href="" class="text-gray-700 hover:text-gray-900">Register</a>
            </div>
        </nav>
        <div class="h-full flex flex-col items-center">
            <div class="mt-56 flex flex-col max-w-7xl mx-auto">
                <h1 class="text-4xl font-bold text-black">
                    Shortify is an open source URL shortener.
                </h1>
                <form class="mt-10 flex flex-col" method="POST">
                    <label for="url" class="text-xl font-bold text-black">Enter your URL</label>
                    <div class="flex items-center">
                        <input type="text" name="url" id="url"
                            class="mt-2 px-4 py-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-transparent" />
                        <button
                            type="submit"
                            disabled
                            class="ml-2 px-4 py-2 rounded-md bg-gray-700 text-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-transparent disabled:opacity-50 disabled:cursor-not-allowed">
                            Shorten
                        </button>
                    </div>
                </form>

            </div>
            <footer class="mt-auto py-3 px-4 lg:px-10 flex justify-between bg-transparent absolute bottom-5">
                <span class="text-gray-700">Made with ❤️ by <a href="" class="text-gray-700 hover:text-gray-900">Ronald Miranda</a></span>
            </footer>
        </div>
    </div>
    <script>
        const input = document.getElementById('url');
        input.addEventListener('input', (e) => {
            const button = document.querySelector('button[type="submit"]');
            button.disabled = !e.target.value;
        });
    </script>
</body>

</html>
