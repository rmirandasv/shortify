<div>
    @if (!$shortLink)
        <form class="mt-10 flex flex-col" wire:submit="submit" x-data="{ url: null }">
            <label for="url" class="text-xl font-bold text-white">Enter your URL</label>
            <div class="flex items-center">
                <input type="text" name="url" id="url" x-model="url" wire:model="url"
                    class="mt-2 px-4 py-2 w-full rounded-md bg-gray-100 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-transparent" />

                <button type="submit" x-bind:disabled="!url"
                    class="ml-2 px-4 py-2 rounded-md bg-gray-700 text-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-transparent disabled:opacity-50 disabled:cursor-not-allowed">
                    Shorten
                </button>
            </div>
            @error('url')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </form>
    @endif
    @if ($shortLink)
        <div class="mt-10 flex flex-col p-4 bg-gradient-to-br from-gray-600 to-gray-900 border-t-4 border-orange-500 rounded-md shadow"
            x-data="{ shortLink: null }">
            <div class="flex items-center space-x-4">
                <label for="url" class="text-xl font-bold text-white">Your short link was created!</label>
                <span class="text-green-500 text-sm" x-show="shortLink">Copied!</span>
            </div>
            <div class="flex items-end">
                <input type="text" name="url" id="url" value="{{ $shortLink->shortLink }}"
                    class="mt-2 px-4 py-2 w-full rounded-md text-white bg-gradient-to-r from-gray-600 to-gray-900 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-transparent" />
                <button type="button"
                    class="ml-2 px-4 py-2 flex items-center space-x-1 rounded-md bg-gray-900 text-white hover:bg-black focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-transparent"
                    x-on:click="shortLink = $event.target.previousElementSibling.value; $event.target.previousElementSibling.select(); document.execCommand('copy'); $event.target.previousElementSibling.value = shortLink">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                    </svg>
                    <span>Copy</span>
                </button>
            </div>
            <div class="mt-4 flex flex-col lg:flex-row lg:items-center lg:justify-between space-y-2 lg:space-y-0">
                <a href="{{ $shortLink->shortLink }}" target="_blank"
                    class="flex items-center space-x-1 text-orange-500 font-bold hover:text-orange-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                    </svg>
                    <span class="underline">{{ $shortLink->shortLink }}</span>
                </a>
                <button type="button"
                    class="px-4 py-2 rounded-md bg-gray-900 text-white hover:bg-black focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-transparent"
                    wire:click="resetForm">
                    Create another
                </button>
            </div>
            <div class="mt-8 flex flex-col mb-3">
                <p class="text-gray-200 text-base text-center">
                    <a href="" class="text-orange-500 font-bold hover:text-orange-600 hover:underline">
                        Register
                    </a> or <a href="" class="text-orange-500 font-bold hover:text-orange-600 hover:underline">
                        login
                    </a> to save your short links and keep track of the stats.
                </p>
            </div>
        </div>
    @endif
</div>
