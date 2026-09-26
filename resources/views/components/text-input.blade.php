@props(['disabled' => false])

@php
    $hasError = $errors->has($attributes->get('name'));

    $classes = $hasError
        ? 'block w-full rounded-lg border border-red-500 bg-white px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-red-500 focus:ring-2 focus:ring-red-500'
        : 'block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500';
@endphp

<input
    @disabled($disabled)
    {{ $attributes->merge(['class' => $classes]) }}
>