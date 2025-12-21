@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 rounded-md  px-3 py-2 text-sm font-medium bg-green-700/50 text-white'
            : 'inline-flex items-center px-1 pt-1 rounded-md  px-3 py-2 text-sm font-medium text-gray-50 hover:bg-lime-500/30';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
