<nav class="px-4 lg:px-8 py-3 flex items-center justify-between">
    <span class="text-2xl font-bold">{{ config('app.name') }}</span>
    <div class="flex items-center space-x-3">
        <span class="text-sm font-bold text-white">{{ auth()->user()->name }}</span>
    </div>
</nav>