@props(['active'])

@php
$classes = ($active ?? false)
        ? 'block w-full cursor-pointer border-l-4 border-blue-500 bg-blue-50 py-2 ps-3 pe-4 text-start text-base font-medium text-blue-700 transition duration-150 ease-in-out focus:border-blue-700 focus:bg-blue-100 focus:outline-none focus:text-blue-800'
        : 'block w-full cursor-pointer border-l-4 border-transparent py-2 ps-3 pe-4 text-start text-base font-medium text-gray-600 transition duration-150 ease-in-out hover:border-gray-300 hover:bg-gray-50 hover:text-gray-800 focus:border-gray-300 focus:bg-gray-50 focus:outline-none focus:text-gray-800';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }} 
</a>
