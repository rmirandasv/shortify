<?php

use function Laravel\Folio\name;

name('home');

?>

<x-layouts.app>
    <nav class="py-3 px-4 lg:px-10 flex justify-between bg-transparent" x-data="{ open: false }">
        <span class="text-2xl font-bold font-mono">{{ config('app.name') }}</span>
        <div class="hidden lg:flex items-center space-x-4">
            <a wire:navigate href="{{ route('about') }}" class="px-4 text-gray-100 hover:text-white uppercase">About</a>
            @auth
                <a wire:navigate href="{{ route('dashboard') }}" class="text-gray-100 hover:text-white">Dashboard</a>
            @endauth
            @guest
                <a wire:navigate href="{{ route('login') }}"
                    class="text-white bg-black px-4 py-2 rounded-lg uppercase">Login</a>
                <a wire:navigate href="{{ route('register') }}"
                    class="px-4 py-2 bg-white text-black rounded-lg uppercase">Register</a>
            @endguest
            <a target="_blank" href="https://github.com/rmirandasv/shortify" class="text-gray-100 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40"
                    viewBox="0 0 30 30">
                    <path
                        d="M15,3C8.373,3,3,8.373,3,15c0,5.623,3.872,10.328,9.092,11.63C12.036,26.468,12,26.28,12,26.047v-2.051 c-0.487,0-1.303,0-1.508,0c-0.821,0-1.551-0.353-1.905-1.009c-0.393-0.729-0.461-1.844-1.435-2.526 c-0.289-0.227-0.069-0.486,0.264-0.451c0.615,0.174,1.125,0.596,1.605,1.222c0.478,0.627,0.703,0.769,1.596,0.769 c0.433,0,1.081-0.025,1.691-0.121c0.328-0.833,0.895-1.6,1.588-1.962c-3.996-0.411-5.903-2.399-5.903-5.098 c0-1.162,0.495-2.286,1.336-3.233C9.053,10.647,8.706,8.73,9.435,8c1.798,0,2.885,1.166,3.146,1.481C13.477,9.174,14.461,9,15.495,9 c1.036,0,2.024,0.174,2.922,0.483C18.675,9.17,19.763,8,21.565,8c0.732,0.731,0.381,2.656,0.102,3.594 c0.836,0.945,1.328,2.066,1.328,3.226c0,2.697-1.904,4.684-5.894,5.097C18.199,20.49,19,22.1,19,23.313v2.734 c0,0.104-0.023,0.179-0.035,0.268C23.641,24.676,27,20.236,27,15C27,8.373,21.627,3,15,3z">
                    </path>
                </svg>
            </a>
        </div>
        <div class="lg:hidden">
            <button class="text-white" x-on:click="open = !open">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z" />
                </svg>
            </button>
        </div>
        <div class="lg:hidden" x-show="open" x-on:click.away="open = false"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0">
            <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-90 z-50" x-on:click="open = false">
                <div class="flex flex-col items-center justify-center h-full space-y-4">
                    @auth
                        <a wire:navigate href="{{ route('dashboard') }}"
                            class="text-gray-100 hover:text-white">Dashboard</a>
                    @endauth
                    @guest
                        <a wire:navigate href="{{ route('login') }}"
                            class="text-white bg-gray-800 px-4 py-2 rounded-lg uppercase">Login</a>
                        <a wire:navigate href="{{ route('register') }}"
                            class="px-4 py-2 bg-white text-black rounded-lg uppercase">Register</a>
                    @endguest
                    <a wire:navigate href="{{ route('about') }}" class="text-gray-100 hover:text-white">About</a>
                    <hr class="py-4 w-3/4 border-gray-600">
                    <a target="_blank" href="https://github.com/rmirandasv/shortify" class="text-gray-100 hover:text-white flex items-center space-x-4">
                        <span class="text-gray-100">See on GitHub</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                            d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                            clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <div class="flex flex-col items-center justify-center">
        <div class="flex flex-col w-full">
            <div class="flex flex-col max-w-7xl mx-auto px-4">
                <h1
                    class="mt-14 text-4xl lg:text-5xl font-bold text-white text-center lg:text-start text-balance mb-10">
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
                <img src="{{ asset('images/screenshoot.png') }}" alt="Shortify features"
                    class="rounded-xl h-[910px] w-auto object-cover">
            </div>
            <div
                class="lg:absolute bottom-0 z-10 flex justify-center right-0 left-0 bg-gradient-to-t from-black to-gray-800 opacity-80">
                <div class="mx-auto max-w-7xl px-6 lg:px-8 py-10">
                    <dl
                        class="mx-auto grid max-w-2xl grid-cols-1 gap-x-6 gap-y-10 text-base leading-7 text-gray-300 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:gap-x-8 lg:gap-y-16">
                        <div class="relative pl-9 animated-box">
                            <dt class="inline font-semibold text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="h-5 w-5 absolute left-1 top-1 text-indigo-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                </svg>
                                Privacy first.
                            </dt>
                            <dd class="inline">
                                Your data is yours. We don't track you. We don't sell your data. We don't use cookies.
                                We don't use Google Analytics. We don't use any third party tracking software.
                            </dd>
                        </div>
                        <div class="relative pl-9 animated-box">
                            <dt class="inline font-semibold text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="absolute left-1 top-1 h-5 w-5 text-indigo-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" />
                                </svg>
                                Open source.
                            </dt>
                            <dd class="inline">
                                Shortify is an open source project. You can find the source code on GitHub.
                            </dd>
                        </div>
                        <div class="relative pl-9 animated-box">
                            <dt class="inline font-semibold text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="absolute left-1 top-1 h-5 w-5 text-indigo-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                                </svg>
                                Cached links.
                            </dt>
                            <dd class="inline">
                                We cache your links so they load faster.
                            </dd>
                        </div>
                        <div class="relative pl-9 animated-box">
                            <dt class="inline font-semibold text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="absolute left-1 top-1 h-5 w-5 text-indigo-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
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
            <div class="absolute bottom-0 h-2/4 w-full bg-gradient-to-t from-black opacity-75"></div>
        </div>
    </div>
    @push('scripts')
        <script>
            const elements = document.querySelectorAll('.animated-box');
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade', 'animate-once', 'animate-duration-500',
                            'animate-delay-150', 'animate-ease-in');
                    } else {
                        entry.target.classList.remove('animate-fade', 'animate-once', 'animate-duration-500',
                            'animate-delay-150', 'animate-ease-in');
                    }
                });
            });
            elements.forEach(element => {
                observer.observe(element);
            });
        </script>
    @endpush
</x-layouts.app>
