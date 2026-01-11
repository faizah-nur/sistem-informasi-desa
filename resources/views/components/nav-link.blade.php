@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 rounded-md  px-3 py-2 text-sm font-medium bg-accent text-white'
            : 'inline-flex items-center px-1 pt-1 rounded-md  px-3 py-2 text-sm font-medium text-white hover:bg-white hover:text-accent';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
