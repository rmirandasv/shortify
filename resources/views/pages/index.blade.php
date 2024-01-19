<x-layouts.app>
    <nav class="py-3 px-4 lg:px-10 flex justify-between bg-transparent">
        <span class="text-2xl font-bold">{{ config('app.name') }}</span>
        <div class="flex items-center space-x-4">
            @auth
                <a wire:navigate href="{{ route('dashboard') }}" class="text-gray-100 hover:text-white">Dashboard</a>
            @endauth
            @guest
                <a wire:navigate href="{{ route('login') }}" class="text-gray-100 hover:text-white">Login</a>
                <a wire:navigate href="{{ route('register') }}" class="text-gray-100 hover:text-white">Register</a>
            @endguest
        </div>
    </nav>
    <div class="h-full flex flex-col items-center">
        <div class="mt-56 flex flex-col max-w-7xl mx-auto">
            <h1 class="text-4xl font-bold text-white">
                Shortify is an open source URL shortener.
            </h1>
            <livewire:components.create-shortlink-public-form />
        </div>
    </div>
</x-layouts.app>
