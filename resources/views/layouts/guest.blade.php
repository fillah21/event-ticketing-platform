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
        <div class="flex items-center justify-center min-h-screen px-4 py-8">
            <div class="w-[50%] max-w-lg">
                <div class="mb-6 text-center">
                    <a
                        href="/"
                        class="text-2xl font-bold text-blue-600 hover:text-blue-700"
                    >
                        EventFlow
                    </a>

                    <p class="mt-1 text-sm text-gray-600">
                        Event management & ticketing platform
                    </p>
                </div>

                <div class="p-6 bg-white border border-gray-200 shadow-sm rounded-xl">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
