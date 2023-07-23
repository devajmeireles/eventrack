@props([
    'type'        => 'text',
    'id'          => uniqid(),
    'label'       => null,
    'name'        => null,
    'placeholder' => null,
    'icon'        => null,
])

@php
    $computed  = $attributes->whereStartsWith('wire:model')->first();
    $error     = $errors->has($computed);
    $icon      = $error ? 'exclamation-circle' : $icon;
    $iconColor = $error ? 'text-red-500' : 'text-gray-500';
@endphp

<div>
    @if ($label)
        <x-input.label :$label :$error/>
    @endif
    <div class="relative mt-2 rounded-md shadow-sm">
        <input id="{{ $id }}" type="{{ $type }}"
               @if ($name) name="{{ $name }}" @endif
               @if ($placeholder) placeholder="{{ $placeholder }}" @endif
                {{ $attributes->class([
                     'appearance-none w-full rounded-md text-gray-800 sm:text-sm border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-300 transition',
                     'text-red-600 ring-1 ring-inset ring-red-300 placeholder:text-red-300 focus:ring-2 focus:ring-inset focus:ring-red-500' => $error,
                ]) }}
        >
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
            @if ($icon)
                @svg('heroicon-s-' . $icon, 'h-5 w-5 ' . $iconColor)
            @endif
        </div>
    </div>
    @error ($computed)
    <x-input.error>{{ $message }}</x-input.error>
    @enderror
</div>
