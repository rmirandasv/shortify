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
        <div class="mt-10 flex flex-col p-4 bg-gradient-to-b from-gray-700 to-gray-900 rounded shadow"
            x-data="{ shortLink: null }">
            <label for="url" class="text-xl font-bold text-white">Your short link</label>
            <div class="flex items-center">
                <input type="text" name="url" id="url" value="{{ $shortLink->shortLink }}"
                    class="mt-2 px-4 py-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-transparent" />
                <button type="button"
                    class="ml-2 px-4 py-2 rounded-md bg-gray-700 text-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-transparent"
                    x-on:click="shortLink = $event.target.previousElementSibling.value; $event.target.previousElementSibling.select(); document.execCommand('copy'); $event.target.previousElementSibling.value = shortLink">
                    Copy
                </button>

            </div>
            <span class="ml-2 text-green-500 text-sm" x-show="shortLink">Copied!</span>
            <p class="ml-2 text-gray-400 text-sm">
                You can register to save your short links and keep track of visits and other stats.
            </p>
            <a href=""
                class="ml-2 px-4 py-2 rounded-md bg-gray-700 text-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-transparent">
                Register
            </a>
        </div>
    @endif
</div>
