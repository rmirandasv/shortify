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
