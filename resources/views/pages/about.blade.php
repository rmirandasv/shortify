<?php

use function Laravel\Folio\name;

name('about');

?>

<x-layouts.app>
  <div class="flex flex-col">
    <h1 class="text-4xl font-bold text-center mt-10 text-white">
      About {{ config('app.name') }}
    </h1>
    <div class="mx-auto max-w-7xl overflow-hidden px-6 py-20 sm:py-24 lg:px-8">
      <p class="text-center text-gray-300">
        Shortify is an open source URL shortener created by <a target="_blank" href="https://ronaldmiranda.dev" class="font-medium text-gray-300 hover:text-white">Ronald Miranda</a>.
      </p>
      <p class="text-center text-gray-300 mt-4">
        The source code is available on <a target="_blank" target="_blank" href="https://github.com/rmirandasv/shortify" class="font-medium text-gray-300 hover:text-white">Github</a>.
      </p>
      <div class="mt-10 p-4 bg-gray-700 rounded-lg">
        <p class="text-center text-gray-300">
          Shortify is built with Tailwind CSS, Alpine.js, Laravel and Livewire (TALL stack).
        </p>
      </div>
      <a wire:navigate href="{{ route('home') }}" class="block text-center text-gray-300 hover:text-white mt-10">Go back to home</a>
    </div>
  </div>
</x-layouts.app>
