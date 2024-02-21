<?php

use function Laravel\Folio\name;
use function Laravel\Folio\middleware;

name('password.reset');
middleware('guest');

?>
<x-layouts.app>
  <div class="h-screen flex flex-col items-center justify-center">
    <div class="w-full max-w-md mx-auto px-4 lg:px-0">
      <div class="flex justify-center mb-8">
        <a wire:navigate href="/" class="text-4xl font-bold text-white font-mono">{{ config('app.name') }}</a>
      </div>
      <livewire:components.auth.reset-forgotten-password :token="$token" />
    </div>
  </div>
</x-layouts.app>

