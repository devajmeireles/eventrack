@props(['items' => null])

@php
    /** @var Illuminate\Pagination\LengthAwarePaginator $items */
@endphp

<div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
    <table class="min-w-full divide-y divide-gray-300">
        {{ $slot }}
    </table>
    @if ($items->hasPages())
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
            {{ $items->links() }}
        </div>
    @endif
</div>