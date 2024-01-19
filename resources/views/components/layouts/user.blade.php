<x-layouts.app>
  <div class="flex flex-col">
    <x-navigation-menu />
    <div class="flex">
      <div class="hidden lg:flex w-4/12 p-4">
        Sidebar
      </div>
      {{ $slot }}
    </div>
  </div>
</x-layouts.app>