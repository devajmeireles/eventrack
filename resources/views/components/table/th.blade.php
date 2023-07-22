@props(['label' => null, 'column' => null, 'sort' => null, 'direction' => null])

<th scope="col" {{ $attributes->merge(['class' => 'py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6']) }}>
    <a href="#" class="group inline-flex cursor-pointer"
       @if ($sort && $column && $direction) wire:click.prevent="sort('{{ $column }}', '{{ $sort === $column ? ($direction === 'asc' ? 'desc' : 'asc') : 'desc' }}')" @endif>

        {{ $label ?? $slot }}
        <span class="ml-2 flex-none rounded">

            @if ($sort === $column && $direction === 'asc')
                <x-heroicon-s-chevron-up class="inline-block w-4 h-4 ml-1 text-gray-500"/>
            @elseif ($sort === $column && $direction === 'desc')
                <x-heroicon-s-chevron-down class="inline-block w-4 h-4 ml-1 text-gray-500"/>
            @endif

            @if ($sort !== $column)
                <x-heroicon-s-chevron-down class="inline-block w-4 h-4 ml-1 text-gray-500"/>
            @endif
        </span>
    </a>
</th>
