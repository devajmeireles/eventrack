@props([
    'href' => null,
    'type' => null,
    'text' => null,

    'color' => 'primary',
    'size'  => 'md',

    'xs' => null,
    'sm' => null,
    'md' => null,
    'lg' => null,
    'xl' => null,

    'red'    => null,
    'yellow' => null,
    'green'  => null,
    'blue'   => null,
    'gray'   => null,
])

@php
    $color = $color ?? 'primary';
    $size  = $size ?? 'md';

    if ($red)    $color = 'red';
    if ($yellow) $color = 'yellow';
    if ($green)  $color = 'green';
    if ($blue)   $color = 'blue';
    if ($gray)   $color = 'gray';

    if ($xs) $size = 'xs';
    if ($sm) $size = 'sm';
    if ($md) $size = 'md';
    if ($lg) $size = 'lg';
    if ($xl) $size = 'xl';
@endphp

@if (!$href)
    <button @if ($type) type="{{ $type }}" @endif
            {{ $attributes->class([
                'rounded  font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 transition',
                'px-2 py-1 text-xs'     => $size === 'xs',
                'px-2.5 py-1.5 text-xs' => $size === 'sm',
                'px-3 py-2 text-xs'     => $size === 'md',
                'px-3.5 py-2.5 text-md' => $size === 'lg',
                'px-5 py-4 text-md'     => $size === 'xl',
                'bg-indigo-600 hover:bg-indigo-500 focus-visible:outline-indigo-600' => $color === 'primary',
                'bg-red-600 hover:bg-red-500 focus-visible:outline-red-600'          => $color === 'red',
                'bg-yellow-600 hover:bg-yellow-500 focus-visible:outline-yellow-600' => $color === 'yellow',
                'bg-green-600 hover:bg-green-500 focus-visible:outline-green-600'    => $color === 'green',
                'bg-blue-600 hover:bg-blue-500 focus-visible:outline-blue-600'       => $color === 'blue',
                'bg-gray-600 hover:bg-gray-500 focus-visible:outline-gray-600'       => $color === 'gray',
            ]) }}>
        {{ $text ?? $slot }}
    </button>
@else
    <a href="{{ $href }}"
            {{ $attributes->class([
                'rounded  font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 transition',
                'px-2 py-1 text-xs'     => $size === 'xs',
                'px-2.5 py-1.5 text-xs' => $size === 'sm',
                'px-3 py-2 text-xs'     => $size === 'md',
                'px-3.5 py-2.5 text-md' => $size === 'lg',
                'px-5 py-4 text-md'     => $size === 'xl',
                'bg-indigo-600 hover:bg-indigo-500 focus-visible:outline-indigo-600' => $color === 'primary',
                'bg-red-600 hover:bg-red-500 focus-visible:outline-red-600'          => $color === 'red',
                'bg-yellow-600 hover:bg-yellow-500 focus-visible:outline-yellow-600' => $color === 'yellow',
                'bg-green-600 hover:bg-green-500 focus-visible:outline-green-600'    => $color === 'green',
                'bg-blue-600 hover:bg-blue-500 focus-visible:outline-blue-600'       => $color === 'blue',
                'bg-gray-600 hover:bg-gray-500 focus-visible:outline-gray-600'       => $color === 'gray',
            ]) }}>
        {{ $text ?? $slot }}
    </a>
@endif
