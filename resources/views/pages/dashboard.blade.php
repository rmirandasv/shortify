<?php

use function Laravel\Folio\{name};
use function Laravel\Folio\{middleware};

name('dashboard');
middleware(['auth']);

?>

<x-layouts.app>
  <h1 class="text-2xl font-bold">Dashboard</h1>
</x-layouts.app>