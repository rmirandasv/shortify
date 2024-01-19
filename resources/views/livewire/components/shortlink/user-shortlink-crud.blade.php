<div class="w-full flex flex-col" x-data="{ showForm: @entangle('showForm') }">
    <div class="p-4 bg-white rounded-md flex flex-col" x-show="showForm" x-transition>
        <h2 class="text-gray-800 font-bold">Create Short Link</h2>
        <form wire:submit.prevent="save" class="flex flex-col">
            <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-4 lg:items-end">
                <div class="mt-2 flex flex-col w-full">
                    <label for="url" class="text-gray-800 font-normal">URL</label>
                    <input wire:model="url" type="text" id="url" class="w-full py-2 px-4 bg-gray-50 text-gray-800 rounded-lg border border-gray-300" placeholder="Enter a URL">
                    @error('url') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mt-2 flex items-center space-x-4">
                <button type="button" x-on:click="showForm = false" class="text-indigo-500 hover:text-indigo-600">
                    Cancel
                </button>
                <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold rounded-lg p-2 mt-4 lg:mt-0">
                    Save
                </button>
            </div>
        </form>
    </div>
    <div class="mt-4 flex flex-col lg:flex-row lg:flex-wrap lg:space-x-4 lg:items-end">
        <div class="flex flex-col w-full lg:w-1/3">
            <label for="search" class="text-white font-bold">Search</label>
            <input wire:model="search" type="text" id="search" class="w-full rounded-lg p-2 bg-gray-50 text-white" placeholder="Search for a short link">
        </div>
        <div class="w-full lg:w-1/3">
            <button x-on:click="showForm = true" x-bind:disabled="showForm" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold rounded-lg p-2 mt-4 lg:mt-0 disabled:opacity-50 disabled:cursor-not-allowed">
                Create
            </button>
        </div>
    </div>
    <div class="mt-4 flex flex-col overflow-x-auto rounded-md">
        <table class="table-auto w-full rounded-md border bg-white">
            <thead class="bg-gray-300">
                <tr>
                    <th class="text-left px-4 py-1 text-gray-800 text-base">Short Link</th>
                    <th class="text-left px-4 py-1 text-gray-800 text-base">Long Link</th>
                    <th class="text-left px-4 py-1 text-gray-800 text-base">Created At</th>
                    <th class="text-left px-4 py-1 text-gray-800 text-base">Updated At</th>
                    <th class="text-left px-4 py-1 text-gray-800 text-base">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (count($shortlinks) === 0)
                    <tr>
                        <td class="border px-4 py-2 text-gray-800" colspan="5">No short links found.</td>
                    </tr>
                @endif
                @foreach($shortlinks as $shortlink)
                    <tr>
                        <td class="px-4 py-2">
                            <div class="flex items-center space-x-2">
                                <a href="{{ $shortlink->short_link }}" target="_blank" class="text-indigo-500 hover:text-indigo-600 hover:underline text-sm">
                                    {{ $shortlink->short_link }}
                                </a>
                            </div>
                        </td>
                        <td class="px-4 py-2 text-gray-600 text-sm truncate">
                            {{ $shortlink->url }}
                        </td>
                        <td class="px-4 py-2 text-gray-600 text-sm">{{ $shortlink->created_at->diffForHumans() }}</td>
                        <td class="px-4 py-2 text-gray-600 text-sm">{{ $shortlink->updated_at->diffForHumans() }}</td>
                        <td class="px-4 py-2 text-gray-800 flex space-x-2">
                            <button wire:click="edit({{ $shortlink->id }})" class="text-indigo-500 hover:text-green-600 font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </button>
                            <button wire:click="delete({{ $shortlink->id }})" class="text-red-500 hover:text-red-600 font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
