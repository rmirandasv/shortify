<nav class="px-4 lg:px-8 py-3 flex items-center justify-between">
    <a wire:navigate href="{{ route('home') }}" class="text-2xl font-bold font-mono">{{ config('app.name') }}</a>
    <div class="flex items-center space-x-3">
        <span class="text-sm font-bold text-white">{{ auth()->user()->name }}</span>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="text-sm font-bold text-white hover:underline">Logout</button>
        </form>
    </div>
</nav>