<?php

use function Laravel\Folio\{name};

name('login');

?>

<x-layouts.app>
  <div class="h-screen flex flex-col items-center justify-center">
    <div class="w-full max-w-md mx-auto">
      <div class="flex justify-center mb-8">
        <a wire:navigate href="/" class="text-4xl font-bold text-white">{{ config('app.name') }}</a>
      </div>
      <livewire:components.auth.login-form />
    </div>
  </div>
</x-layouts.app>
