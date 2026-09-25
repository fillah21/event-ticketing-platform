<x-app-layout>
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
            <p class="text-sm text-gray-600">
                Total Events
            </p>

            <p class="mt-2 text-2xl font-semibold text-gray-900">
                0
            </p>
        </div>

        <div class="p-5 bg-white border border-gray-200 shadow-sm rounded-xl">
            <p class="text-sm text-gray-600">
                Published Events
            </p>

            <p class="mt-2 text-2xl font-semibold text-gray-900">
                0
            </p>
        </div>

        <div class="p-5 bg-white border border-gray-200 shadow-sm rounded-xl">
            <p class="text-sm text-gray-600">
                Total Tickets Sold
            </p>

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
</div>

</x-app-layout>
