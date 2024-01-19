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
    <div class="mt-4 flex flex-col overflow-x-auto bg-white p-4 rounded-md">
        <table class="table-auto w-full rounded-md border">
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
                        <td class="border px-4 py-2 text-gray-800">{{ $shortlink->short_link }}</td>
                        <td class="border px-4 py-2 text-gray-800">{{ $shortlink->long_link }}</td>
                        <td class="border px-4 py-2 text-gray-800">{{ $shortlink->created_at }}</td>
                        <td class="border px-4 py-2 text-gray-800">{{ $shortlink->updated_at }}</td>
                        <td class="border px-4 py-2 text-gray-800">
                            <button wire:click="edit({{ $shortlink->id }})" class="bg-indigo-500 hover:bg-green-600 text-white font-bold rounded-lg p-2">
                                Edit
                            </button>
                            <button wire:click="delete({{ $shortlink->id }})" class="bg-red-500 hover:bg-red-600 text-white font-bold rounded-lg p-2">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
