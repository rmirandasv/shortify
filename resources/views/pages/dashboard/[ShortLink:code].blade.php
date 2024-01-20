<?php

use Illuminate\View\View;
use App\Models\ShortLink;
use App\Models\ShortLinkVisit;
use function Laravel\Folio\name;
use function Laravel\Folio\middleware;
use function Laravel\Folio\render;

name('dashboard.shortlink');
middleware(['auth']);

render(function (View $view, ShortLink $shortLink) {
    if (auth()->user()->id !== $shortLink->user_id) {
        abort(403);
    }
});

?>

<x-layouts.user>
    <div class="flex flex-col px-4 lg:px-0">
        <div class="flex items-center space-x-3">
            <a wire:navigate href="{{ route('dashboard') }}" class="text-white hover:text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
            </a>
            <h1 class="text-3xl font-bold text-white">{{ $shortLink->shortLink }}</h1>
        </div>
        <span class="text-white mb-4">{{ $shortLink->url }}</span>
        <h2 class="text-xl font-bold text-white mb-4">
            Total visits: {{ $shortLink->visits->count() }}
        </h2>
        <livewire:components.shortlink.shortlink-stats :shortLink="$shortLink" />
    </div>
</x-layouts.user>