<?php

use function Laravel\Folio\name;

name('register');

?>

<x-layouts.app>
  <div class="h-full lg:h-screen flex flex-col items-center justify-center py-10 lg:py-0">
    <div class="w-full max-w-md mx-auto px-4 lg:px-0">
      <div class="flex justify-center mb-8">
        <a wire:navigate href="/" class="text-4xl font-bold text-white font-mono">{{ config('app.name') }}</a>
      </div>
      <livewire:components.auth.register-form />
    </div>
  </div>
</x-layouts.app>