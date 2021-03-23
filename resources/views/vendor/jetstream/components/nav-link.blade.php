@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center font-semibold px-1 pt-1 border-b-2 border-green-200 text-base font-medium leading-5 text-green-300 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-base font-medium leading-5 text-gray-200 hover:text-green-400 hover:border-purple-200 focus:outline-none focus:text-purple-500 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
