<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    <x-card symbol="heroicon-s-user" :value="123" title="AJ" :percentage="5.2" down/>
                    <x-card symbol="heroicon-s-users" :value="456" title="AJ" :percentage="5.2" down/>
                    <x-card symbol="heroicon-s-banknotes" :value="123" title="AJ" :percentage="10.5" up/>
                </dl>
            </div>
        </div>
    </div>
</x-app-layout>
