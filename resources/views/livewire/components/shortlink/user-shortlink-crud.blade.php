<div class="w-full flex flex-col" x-data="{ showForm: @entangle('showForm') }" wire:poll.60s>
    <div class="p-4 bg-white rounded-lg flex flex-col shadow-slate-700 shadow" x-cloak x-show="showForm"
        x-transition:enter="animate-fade-down animate-duration-200 animate-once animate-ease-in"
        x-transition:leave="animate-fade-down animate-duration-200 animate-once animate-ease-out animate-reverse">
        <h2 class="text-gray-800 font-bold">{{ $shortlink ? 'Edit short link' : 'Create short link' }}</h2>
        <form wire:submit.prevent="save" class="flex flex-col">
            <div class="flex flex-col lg:flex-row lg:flex-wrap lg:space-x-4 lg:items-end">
                <div class="mt-2 flex flex-col w-full">
                    <label for="url" class="text-gray-800 font-normal">URL</label>
                    <input wire:model="url" type="text" id="url" class="w-full py-2 px-4 bg-gray-50 text-gray-800 rounded-lg border border-gray-300" placeholder="Enter a URL" autocomplete="off">
                    @error('url') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mt-2 flex items-center space-x-4">
                <button type="button" wire:click="resetForm" class="text-indigo-500 hover:text-indigo-600">
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
            <input wire:model.live.debounce.200ms="search" type="text" id="search" class="w-full rounded-lg p-2 bg-gray-50 text-gray-800 shadow-slate-700 shadow focus:shadow-lg focus:outline-none" placeholder="Search for a short link" autocomplete="off">
        </div>
        <div class="w-full lg:w-1/3">
            <button x-on:click="showForm = true" x-bind:disabled="showForm" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-lg p-2 mt-4 lg:mt-0 disabled:opacity-50 disabled:cursor-not-allowed shadow hover:shadow-lg shadow-slate-700">
                Create
            </button>
        </div>
    </div>
    <div class="mt-4 flex flex-col overflow-x-auto rounded-md shadow-slate-700 shadow">
        <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
                <tr>
                    <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 table-cell">Short Link</th>
                    <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:pl-6 lg:table-cell">Long Link</th>
                    <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:pl-6 lg:table-cell">Visits</th>
                    <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:pl-6 lg:table-cell">Created At</th>
                    <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:pl-6 lg:table-cell">Updated At</th>
                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @if (count($shortlinks) === 0)
                    <tr>
                        <td class="border px-4 py-2 text-gray-800" colspan="5">No short links found.</td>
                    </tr>
                @endif
                @foreach($shortlinks as $shortlink)
                    <tr>
                        <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                            <div class="flex flex-col">
                                <div class="flex items-center space-x-2">
                                    <a href="{{ $shortlink->short_link }}" target="_blank" class="text-indigo-500 truncate hover:text-indigo-600 hover:underline text-sm">
                                        {{ $shortlink->short_link }}
                                    </a>
                                </div>
                                <span class="text-gray-600 text-sm truncate flex lg:hidden">{{ $shortlink->url }}</span>
                                <span title="{{ $shortlink->updated_at }}" class="text-gray-600 text-sm flex lg:hidden">{{ $shortlink->updated_at->diffForHumans() }}</span>
                            </div>
                        </td>
                        <td class="px-3 py-4 text-gray-600 text-sm hidden lg:table-cell" title="{{ $shortlink->url }}">
                            {{ Str::limit($shortlink->url, 30) }}
                        </td>
                        <td class="px-3 py-4 text-gray-600 text-sm truncate hidden lg:table-cell">
                            <span class="inline-flex items-center rounded-md bg-gray-100 px-2 py-1 text-xs font-medium text-gray-700 ring-1 ring-inset ring-gray-500/10">
                                {{ $shortlink->visits_count }}
                            </span>
                        </td>
                        <td class="px-3 py-4 text-gray-600 text-sm hidden lg:table-cell">{{ $shortlink->created_at->diffForHumans() }}</td>
                        <td class="px-3 py-4 text-gray-600 text-sm hidden lg:table-cell">{{ $shortlink->updated_at->diffForHumans() }}</td>
                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                            <div class="flex space-x-2">
                                <a wire:navigate href="{{ route('dashboard.shortlink', ['ShortLink' => $shortlink]) }}" class="text-indigo-500 hover:text-indigo-600 font-bold">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0 0 20.25 18V6A2.25 2.25 0 0 0 18 3.75H6A2.25 2.25 0 0 0 3.75 6v12A2.25 2.25 0 0 0 6 20.25Z" />
                                    </svg>
                                </a>
                                <button wire:click="edit({{ $shortlink }})" class="text-indigo-500 hover:text-green-600 font-bold">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </button>
                                <button wire:click="delete({{ $shortlink }})" class="text-red-500 hover:text-red-600 font-bold" wire:confirm="Are you sure you want to delete this short link?">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $shortlinks->links() }}
    </div>
</div>
