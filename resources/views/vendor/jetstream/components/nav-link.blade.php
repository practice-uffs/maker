@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-green-300 text-sm font-medium leading-5 text-ccuffs-primary hover:text-ccuffs-primary focus:outline-none focus:border-green-400 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-ccuffs-primary hover:text-ccuffs-primary hover:border-gray-300 focus:outline-none focus:border-gray-400 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
