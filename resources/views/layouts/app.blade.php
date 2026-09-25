<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EventFlow') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased text-gray-900 bg-gray-100">
    <div class="min-h-screen">

        <header class="bg-white border-b border-gray-200">
            <div class="flex items-center justify-between h-16 px-6 mx-auto max-w-7xl">
                <a href="{{ route('dashboard') }}" class="text-xl font-bold">
                    EventFlow
                </a>

                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-600">
                        {{ Auth::user()->name }}
                    </span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button
                            type="submit"
                            class="text-sm font-medium text-gray-600 hover:text-gray-900"
                        >
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <div class="flex mx-auto max-w-7xl">

            <aside class="w-56 bg-white border-r border-gray-200 shrink-0">
                <nav class="p-4 space-y-1">

                    <a
                        href="{{ route('dashboard') }}"
                        class="block px-3 py-2 text-sm font-medium rounded-lg hover:bg-gray-100"
                    >
                        Dashboard
                    </a>

                    <a
                        href="{{ route('events.index') }}"
                        class="block px-3 py-2 text-sm font-medium rounded-lg hover:bg-gray-100"
                    >
                        Events
                    </a>

                </nav>
            </aside>

            <main class="flex-1 min-w-0 p-6">
                {{ $slot }}
            </main>

        </div>

    </div>
</body>
</html>