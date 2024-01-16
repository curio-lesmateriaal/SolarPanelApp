<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Abonnement van {{ $subscription->customer->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="customer-data">
                        <p>Naam: {{ $subscription->customer->name }}</p>
                        <p>Adres: {{ $subscription->customer->address }}</p>
                        <p>Postcode: {{ $subscription->customer->zip }}</p>
                        <p>Stad: {{ $subscription->customer->city }}</p>
                        <p>Telefoonnummer: {{ $subscription->customer->phone }}</p>
                        <p>Email: {{ $subscription->customer->email }}</p>
                        <p>Systeem: {{ $subscription->solarPanelSystem->name }}</p>
                    </div>
                    <h3 class="text-2xl">Zonne panelen</h3>
                    @livewire('panel-switcher', ['subscription' => $subscription])

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
