<x-layouts.app>
    <div class="h-full flex flex-col lg:flex-row justify-between items-center">
        <div class="w-full lg:w-3/6 h-full flex justify-center">
            <img src="{{ asset('images/404.jpg') }}" alt="404" class="w-full h-full lg:rounded-br-md border-b border-white">
        </div>
        <div class="w-full lg:w-3/6 mt-10 lg:mt-0 px-4 flex justify-center">
            <div class="flex flex-col">
                <div class="flex flex-col mb-8">
                  <h1 class="text-9xl font-bold text-gray-50 text-center">404</h1>
                  <h2 class="text-4xl font-bold text-gray-50 text-center">Page not found</h2>
                </div>
                <a href="{{ route('home') }}" class="text-gray-50 hover:text-white text-center">Go back to home</a>
            </div>
        </div>
    </div>
</x-layouts.app>
