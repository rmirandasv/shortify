<x-layouts.app>
    <div class="h-full flex justify-between items-center">
        <div class="w-3/6 h-full flex justify-center">
            <img src="{{ asset('images/404.jpg') }}" alt="404" class="w-full h-full lg:rounded-br-md border-b border-white">
        </div>
        <div class="w-3/6 px-4 flex justify-center">
            <div class="flex flex-col">
                <div class="flex flex-col mb-8">
                  <h1 class="text-9xl font-bold text-gray-50">404</h1>
                  <h2 class="text-4xl font-bold text-gray-50">Page not found</h2>
                </div>
                @auth
                    <a href="{{ route('dashboard') }}" class="text-gray-50 hover:text-white">Go back to dashboard</a>
                @else
                    <a href="{{ route('home') }}" class="text-gray-50 hover:text-white">Go back to home</a>
                @endauth
            </div>
        </div>
    </div>
</x-layouts.app>
