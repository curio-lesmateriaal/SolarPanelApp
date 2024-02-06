<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" flex justify-around overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white w-1/3 p-6 m-4 text-gray-900">
                    Aantal klanten
                    <div class="text-3xl font-bold">
                        {{$customerCount}}
                    </div>
                </div>
                <div class="m-4 bg-white w-1/3 p-6 text-gray-900">
                    Aantal actieve panelen
                    <div class="text-3xl font-bold">
                        {{$panelCount}}
                    </div>
                </div>
                <div class="m-4 bg-white w-1/3 p-6 text-gray-900">
                    Aantal Subscriptions
                    <div class="text-3xl font-bold">
                        {{$subscriptionCount}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
