<idv class="flex flex-col">
    <div class="flex flex-col overflow-x-auto">
        <table class="table-auto w-full rounded-t-md border bg-white">
            <thead class="bg-gray-300 rounded-t-md">
                <tr>
                    <th class="text-left px-1 lg:px-4 py-1 text-gray-800 text-base">IP</th>
                    <th class="text-left px-1 lg:px-4 py-1 text-gray-800 text-base">Platform</th>
                    <th class="text-left px-1 lg:px-4 py-1 text-gray-800 text-base">Browser</th>
                    <th class="text-left px-1 lg:px-4 py-1 text-gray-800 text-base">Device Family</th>
                    <th class="text-left px-1 lg:px-4 py-1 text-gray-800 text-base">Device</th>
                    <th class="text-left px-1 lg:px-4 py-1 text-gray-800 text-base">Device type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($visits as $visit)
                    <tr>
                        <td class="px-1 lg:px-4 py-2 text-sm text-gray-600">{{ $visit->ip }}</td>
                        <td class="px-1 lg:px-4 py-2 text-sm text-gray-600">{{ $visit->platform }}</td>
                        <td class="px-1 lg:px-4 py-2 text-sm text-gray-600">{{ $visit->browser }}</td>
                        <td class="px-1 lg:px-4 py-2 text-sm text-gray-600">{{ $visit->device_family }}</td>
                        <td class="px-1 lg:px-4 py-2 text-sm text-gray-600">{{ $visit->device }}</td>
                        <td class="px-1 lg:px-4 py-2 text-sm text-gray-600">{{ $visit->device_type }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="flex justify-end bg-white rounded-b-md">
        {{ $visits->links() }}
    </div>
</idv>
