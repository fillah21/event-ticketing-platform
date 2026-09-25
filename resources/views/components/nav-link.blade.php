@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex w-full cursor-pointer items-center rounded-lg bg-blue-50 px-3 py-2 text-sm font-medium text-blue-700 transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500'
            : 'inline-flex w-full cursor-pointer items-center rounded-lg px-3 py-2 text-sm font-medium text-gray-700 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }} 
</a>
