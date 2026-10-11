<x-app-layout>
    @if (session('success'))
        <div class="px-4 py-3 mb-6 text-sm text-green-700 border border-green-200 rounded-lg bg-green-50">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="space-y-6">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900">
                Dashboard
            </h1>

        <p class="mt-1 text-sm text-gray-600">
            Welcome back, {{ Auth::user()->name }}.
        </p>
    </div>

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <div class="p-5 bg-white border border-gray-200 shadow-sm rounded-xl">
            <p class="text-sm text-gray-600">Total Events</p>

            <p class="mt-2 text-2xl font-semibold text-gray-900">
                {{ $events->count() }}
            </p>
        </div>

        <div class="p-5 bg-white border border-gray-200 shadow-sm rounded-xl">
            <p class="text-sm text-gray-600">Published Events</p>

            <p class="mt-2 text-2xl font-semibold text-gray-900">
                0
            </p>
        </div>

        <div class="p-5 bg-white border border-gray-200 shadow-sm rounded-xl">
            <p class="text-sm text-gray-600">Total Tickets Sold</p>

            <p class="mt-2 text-2xl font-semibold text-gray-900">
                0
            </p>
        </div>
    </div>

    <div class="p-6 bg-white border border-gray-200 shadow-sm rounded-xl">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-lg font-semibold text-gray-900">
                    Manage your events
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    Create and manage events from your organizer dashboard.
                </p>
            </div>

            <a
                href="{{ route('events.create') }}"
                class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold text-white transition bg-gray-800 rounded-lg cursor-pointer hover:bg-gray-700"
            >
                Create Event
            </a>
        </div>
    </div>

    <div class="overflow-hidden bg-white border border-gray-200 shadow-sm rounded-xl">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900">
                Your Events
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                Events available to your account.
            </p>
        </div>

        @if ($events->isEmpty())
            <div class="px-6 py-8 text-sm text-center text-gray-500">
                No events found. Create your first event to get started.
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="text-gray-600 bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 font-medium">Event</th>
                            <th class="px-6 py-3 font-medium">Organization</th>
                            <th class="px-6 py-3 font-medium">Starts At</th>
                            <th class="px-6 py-3 font-medium">Ends At</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        @foreach ($events as $event)
                            <tr>
                                <td class="px-6 py-4 font-medium text-gray-900">
                                    {{ $event->name }}
                                </td>

                                <td class="px-6 py-4 text-gray-600">
                                    {{ $event->organization->name }}
                                </td>

                                <td class="px-6 py-4 text-gray-600">
                                    {{ \Carbon\Carbon::parse($event->starts_at)->format('d M Y, H:i') }}
                                </td>

                                <td class="px-6 py-4 text-gray-600">
                                    {{ \Carbon\Carbon::parse($event->ends_at)->format('d M Y, H:i') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>

</x-app-layout>
