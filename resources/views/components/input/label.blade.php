@props(['label', 'error' => false, 'for' => null])

<label @if ($for) for="{{ $for }}" @endif
        {{ $attributes->class([
            'block text-sm font-medium leading-6',
            'text-gray-900' => !$error,
            'text-red-600'  => $error,
        ]) }}>
    {{ $label ?? $slot }}
</label>
