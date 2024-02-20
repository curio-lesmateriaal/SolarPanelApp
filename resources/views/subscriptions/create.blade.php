<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nieuwe subscription aanmaken
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('subscriptions.store')}}" method="POST">
                        @csrf
                        @error('name') <p class="text-red-500">{{ $message }}</p> @enderror
                        <div class="mb-4">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="w-full border-2 rounded-lg">
                        </div>
                        @error('email') <p class="text-red-500">{{ $message }}</p> @enderror
                        <div class="mb-4">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="w-full border-2 rounded-lg">
                        </div>
                        @error('address') <p class="text-red-500">{{ $message }}</p> @enderror
                        <div class="mb-4">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="w-full border-2 rounded-lg">
                        </div>
                        @error('zip') <p class="text-red-500">{{ $message }}</p> @enderror
                        <div class="mb-4">
                            <label for="zip">Zip</label>
                            <input type="text" name="zip" id="zip" class="w-full border-2 rounded-lg">
                        </div>
                        @error('city') <p class="text-red-500">{{ $message }}</p> @enderror
                        <div class="mb-4">
                            <label for="city">City</label>
                            <input type="text" name="city" id="city" class="w-full border-2 rounded-lg">
                        </div>
                        @error('phone') <p class="text-red-500">{{ $message }}</p> @enderror
                        <div class="mb-4">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="w-full border-2 rounded-lg">
                        </div>
                        @error('solar_panel_system_id') <p class="text-red-500">{{ $message }}</p> @enderror
                        <div class="mb-4">
                            <label for="solar_panel_system_id">Solar panel system</label>
                            <select name="solar_panel_system_id" id="solar_panel_system_id" class="w-full border-2 rounded-lg">
                                @foreach($solarPanelSystems as $solarPanelSystem)
                                    <option value="{{$solarPanelSystem->id}}">{{$solarPanelSystem->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class=" text-black border-2 px-4 py-3 rounded font-medium w-full">Create subscription</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
