<idv class="flex flex-col">
    <div class="flex flex-col overflow-x-auto rounded-md shadow-slate-700 shadow">
        <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
                <tr>
                    <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 table-cell">IP</th>
                    <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:pl-6 table-cell">Platform</th>
                    <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:pl-6 table-cell">Browser</th>
                    <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:pl-6 table-cell">Device Family</th>
                    <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:pl-6 table-cell">Device</th>
                    <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:pl-6 table-cell">Device type</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @if ($visits->isEmpty())
                    <tr>
                        <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6" colspan="6">No visits found</td>
                    </tr>
                @endif
                @foreach ($visits as $visit)
                    <tr>
                        <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $visit->ip }}</td>
                        <td class="px-3 py-4 text-gray-600 text-sm">{{ $visit->platform }}</td>
                        <td class="px-3 py-4 text-gray-600 text-sm">{{ $visit->browser }}</td>
                        <td class="px-3 py-4 text-gray-600 text-sm">{{ $visit->device_family }}</td>
                        <td class="px-3 py-4 text-gray-600 text-sm">{{ $visit->device }}</td>
                        <td class="px-3 py-4 text-gray-600 text-sm">{{ $visit->device_type }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $visits->links() }}
    </div>
</idv>
