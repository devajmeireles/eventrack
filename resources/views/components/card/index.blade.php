@props([
    'value',
    'symbol',
    'percentage' => null,
    'title'      => null,
    'up'         => null,
    'down'       => null,
])

@php
    $icon  = $up ? 'arrow-up' : ($down ? 'arrow-down' : null);
    $color = $icon === 'arrow-up' ? 'green' : 'red';
@endphp

<div class="relative overflow-hidden rounded-lg bg-white px-4 pt-5 shadow sm:px-6 sm:pt-6">
    <dt>
        <div class="absolute rounded-md bg-indigo-500 p-3">
            @svg($symbol, "h-6 w-6 text-white")
        </div>
        @if ($title)
            <p class="ml-16 truncate text-sm font-medium text-gray-500">{{ $title }}</p>
        @endif
    </dt>
    <div class="hidden text-red-500 text-green-500"></div>
    <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
        <p class="text-2xl font-semibold text-gray-900">{{ $value }}</p>
        <span class="ml-2 flex items-baseline text-sm font-semibold">
            @if ($icon)
                @svg('heroicon-m-' . $icon, "h-5 w-5 flex-shrink-0 self-center text-$color-500")
            @endif
            @if ($percentage)
                <p class="text-{{ $color }}-500">{{ $percentage }} %</p>
            @endif
        </span>
    </dd>
</div>