<x-layouts.app>
    <nav class="py-3 px-4 lg:px-10 flex justify-between bg-transparent">
        <span class="text-2xl font-bold">{{ config('app.name') }}</span>
        <div class="flex items-center space-x-4">
            @auth
                <a wire:navigate href="{{ route('dashboard') }}" class="text-gray-100 hover:text-white">Dashboard</a>
            @endauth
            @guest
                <a wire:navigate href="{{ route('login') }}" class="text-gray-100 hover:text-white">Login</a>
                <a wire:navigate href="{{ route('register') }}" class="text-gray-100 hover:text-white">Register</a>
            @endguest
        </div>
    </nav>
    <div class="h-full flex flex-col items-center justify-center">
        <div class="flex flex-col w-full pt-36">
            <div class="flex flex-col max-w-7xl mx-auto px-4">
                <h1 class="text-4xl font-bold text-white text-center lg:text-start text-balance mb-4">
                    Shortify is an open source URL shortener.
                </h1>
                <livewire:components.create-shortlink-public-form />
            </div>
        </div>
        <div class="mt-16 w-full relative pt-6 flex flex-col">
            <div class="flex flex-col items-center px-4 lg:px-0">
                <span class="text-xl font-bold text-blue-300 text-center lg:text-start text-balance">
                    Fastest way to shorten your links.
                </span>
                <span class="text-4xl font-bold text-white text-center lg:text-start text-balance">
                    Open source, no ads, no tracking.
                </span>
                <p class="mt-4 text-gray-300 text-center lg:text-start text-balance">
                    Shortify is an open source URL shortener. It's free, no ads, no tracking. You can use it for free,
                    forever.
                </p>
            </div>
            <div class="mt-8 relative bottom-0 hidden lg:flex justify-center">
                <img width="1575" height="910" src="{{ asset('images/screenshoot.png') }}" alt="Shortify features"
                    class="rounded-xl h-[910px] w-auto object-cover">
            </div>
            <div class="lg:absolute bottom-24 z-10 flex justify-center right-0 left-0 mb-4">
                <div class="mx-auto mt-16 max-w-7xl px-6 sm:mt-20 md:mt-24 lg:px-8">
                    <dl
                        class="mx-auto grid max-w-2xl grid-cols-1 gap-x-6 gap-y-10 text-base leading-7 text-gray-300 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:gap-x-8 lg:gap-y-16">
                        <div class="relative pl-9">
                            <dt class="inline font-semibold text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 absolute left-1 top-1 text-indigo-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                </svg>
                                Privacy first.
                            </dt>
                            <dd class="inline">
                                Your data is yours. We don't track you. We don't sell your data. We don't use cookies.
                                We don't use Google Analytics. We don't use any third party tracking software.
                            </dd>
                        </div>
                        <div class="relative pl-9">
                            <dt class="inline font-semibold text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="absolute left-1 top-1 h-5 w-5 text-indigo-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" />
                                </svg>
                                Open source.
                            </dt>
                            <dd class="inline">
                                Shortify is an open source project. You can find the source code on GitHub.
                            </dd>
                        </div>
                        <div class="relative pl-9">
                            <dt class="inline font-semibold text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="absolute left-1 top-1 h-5 w-5 text-indigo-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                                </svg>
                                Cached links.
                            </dt>
                            <dd class="inline">
                                We cache your links so they load faster.
                            </dd>
                        </div>
                        <div class="relative pl-9">
                            <dt class="inline font-semibold text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="absolute left-1 top-1 h-5 w-5 text-indigo-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                                </svg>
                                Stats.
                            </dt>
                            <dd class="inline">
                                You can see how many times your link was clicked. (Only if you are logged in)
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
            <div class="absolute bottom-0 h-56 w-full bg-gradient-to-t from-gray-900"></div>
        </div>
    </div>
</x-layouts.app>
