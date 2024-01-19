<x-layouts.app>
  <div class="flex flex-col">
    <x-navigation-menu />
    <div class="my-8 max-w-5xl w-full mx-auto sm:px-6 lg:px-6">
      {{ $slot }}
    </div>
  </div>
</x-layouts.app>