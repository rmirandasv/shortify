<x-layouts.app>
    <div class="h-full flex flex-col lg:flex-row lg:justify-between items-center">
        <div class="w-full lg:w-3/6 h-full flex justify-center">
            <img src="{{ asset('images/500.jpg') }}" alt="404" class="w-full h-full lg:rounded-br-md border-b border-white">
        </div>
        <div class="mt-10 lg:mt-0 w-full lg:w-3/6 px-4 flex justify-center">
            <div class="flex flex-col">
                <div class="flex flex-col mb-8">
                  <h1 class="text-9xl font-bold text-gray-50 text-center">500</h1>
                  <h2 class="text-4xl font-bold text-gray-50 text-center">Oops! Something went wrong.</h2>
                  <p class="text-gray-50 text-center">We are working on it and we'll get it fixed as soon as we can.</p>
                </div>
                <a href="{{ route('home') }}" class="text-gray-50 hover:text-white text-center">Go back to home</a>
            </div>
        </div>
    </div>
</x-layouts.app>
