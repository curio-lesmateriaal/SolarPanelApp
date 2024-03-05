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

                    <div id="weather-data">
                        <h3 class="text-2xl">Weer in Breda</h3>
                        <p id="weather-icon"></p>
                        <p id="weather-description"></p>
                        <p id="temperature"></p>
                        <p><b>Verwachte opbrengst vandaag: <span id="totalKwh"> </span>kwh</b></p>
                    </div>
                    {{--
                        light 1, medium 1.5, premium 2
                        1 paneel 0.25kwh per dag max // medium 0.375kwh per dag max // premium 0.5kwh per dag max

                        drizzle: 30% van max
                        rain: 20% van max
                        snow: 10% van max
                        partial cloudy: 75% van max
                        clear sky: 100% van max

                        tussen 0 en 5 graden: +10%
                        tussen 5 en 10 graden: +20%
                        tussen 10 en 15 graden: +30%
                        tussen 15 en 20 graden: +40%
                        > 20 graden: +50%


                    --}}
                    <script>
                        function calculateKwh(weatherType, temperature) {
                            let totalKwh;

                            const typeSystem = '{{ $subscription->solarPanelSystem->name }}';
                            const amountOfActivePanels = '{{ $subscription->activePanels() }}';

                            let maxKwh;
                            if (typeSystem === 'Light') {
                                maxKwh = 0.25;
                            } else if (typeSystem === 'Normal') {
                                maxKwh = 0.375;
                            } else {
                                maxKwh = 0.5;
                            }

                            let weatherModifier;
                            switch(weatherType) {
                                case 'Drizzle':
                                    weatherModifier = 0.3;
                                    break;
                                case 'Rain':
                                    weatherModifier = 0.2;
                                    break;
                                case 'Snow':
                                    weatherModifier = 0.1;
                                    break;
                                case 'PartialCloudy':
                                    weatherModifier = 0.75;
                                    break;
                                case 'ClearSky':
                                    weatherModifier = 1;
                                    break;
                            }

                            let temperatureModifier;

                            switch(temperature) {
                                case temperature < 5:
                                    temperatureModifier = 1.1;
                                    break;
                                case temperature < 10:
                                    temperatureModifier = 1.2;
                                    break;
                                case temperature < 15:
                                    temperatureModifier = 1.3;
                                    break;
                                case temperature < 20:
                                    temperatureModifier = 1.4;
                                    break;
                                default:
                                    temperatureModifier = 1.5;
                                    break;
                            }

                            totalKwh = maxKwh * weatherModifier * temperatureModifier * amountOfActivePanels;
                            return totalKwh;
                        }


                        fetch('https://api.weatherbit.io/v2.0/current?key=51f40c27805341f88c3cb2cecad48045&city=Breda&country=NL')
                            .then(response => response.json())
                            .then(data => {
                                document.getElementById('weather-icon').innerHTML = `<img src="https://www.weatherbit.io/static/img/icons/${data.data[0].weather.icon}.png" alt="Weer icoon">`;
                                document.getElementById('weather-description').innerText = data.data[0].weather.description;
                                document.getElementById('temperature').innerText = data.data[0].temp + '°C';
                                document.getElementById('totalKwh').innerText = calculateKwh(data.data[0].weather.description, data.data[0].temp);
                            });
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
