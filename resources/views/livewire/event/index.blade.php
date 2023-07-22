<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-table :items="$events">
            <x-table.thread>
                <x-table.tr>
                    <x-table.th column="name" :$sort :$direction label="Name"/>
                    <x-table.th column="created_at" :$sort :$direction label="Created"/>
                </x-table.tr>
            </x-table.thread>
            <x-table.tbody>
                @php /** @var \App\Models\Event $event */ @endphp
                @foreach ($events as $event)
                    <x-table.tr>
                        <x-table.td>
                            {{ $event->name }}
                        </x-table.td>
                        <x-table.td>
                            {{ $event->created_at->format('d/m/Y H:i:s') }}
                        </x-table.td>
                    </x-table.tr>
                @endforeach
            </x-table.tbody>
        </x-table>
    </div>
</div>
