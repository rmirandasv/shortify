<div>
    @if (!$shortLink)
        <form class="mt-10 flex flex-col" wire:submit="submit" x-data="{ url: null }">
            <label for="url" class="text-xl font-bold text-black">Enter your URL</label>
            <div class="flex items-center">
                <input type="text" name="url" id="url" x-model="url" wire:model="url"
                    class="mt-2 px-4 py-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-transparent" />

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
            <div class="flex items-center">
                <input type="text" name="url" id="url" value="{{ $shortLink->shortLink }}"
                    class="mt-2 px-4 py-2 w-full rounded-md text-white bg-gradient-to-r from-gray-600 to-gray-900 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-transparent" />
                <button type="button"
                    class="ml-2 px-4 py-2 rounded-md bg-gray-700 text-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-transparent"
                    x-on:click="shortLink = $event.target.previousElementSibling.value; $event.target.previousElementSibling.select(); document.execCommand('copy'); $event.target.previousElementSibling.value = shortLink">
                    Copy
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
