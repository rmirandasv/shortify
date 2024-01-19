<?php

use function Laravel\Folio\{name};
use function Laravel\Folio\{middleware};

name('dashboard');
middleware(['auth']);

?>

<x-layouts.user>
  <div class="flex flex-col">
    <h1 class="text-3xl font-bold text-white mb-8">My short links</h1>
    <livewire:components.shortlink.user-shortlink-crud />
  </div>
</x-layouts.user>
