<div>
    {{$description}}
    <form action="{{route('subscriptions.store')}}" method="POST">
        @csrf
        @error('name') <p class="text-red-500">{{ $message }}</p> @enderror
        <div class="mb-4">
            <label for="name">Name</label>
            <input wire:click="click" type="text" name="name" id="name" class="w-full border-2 rounded-lg">
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
            <input type="text" maxlength="14" name="phone" id="phone" class="w-full border-2 rounded-lg">
        </div>
        @error('solar_panel_system_id') <p class="text-red-500">{{ $message }}</p> @enderror
        <div class="mb-4">
            <label for="solar_panel_system_id">Solar panel system</label>
            <select wire:change="changeSystem(event.target.value)" name="solar_panel_system_id" id="solar_panel_system_id" class="w-full border-2 rounded-lg">
                    <option disabled selected value="">Maak een keuze</option>
                @foreach($solarPanelSystems as $solarPanelSystem)
                    <option value="{{$solarPanelSystem->id}}">{{$solarPanelSystem->name}}</option>
                @endforeach
            </select>
        </div>

        @if($panelCount > 1)
            <div class="mb-4">

                <label for="panelCount">Panel {{$panelInput }}</label>
                <input wire:model="panelInput" wire:keyup="checkMaxPanels" class="w-full border-2 rounded-lg" type="number" max="{{$panelCount}}" min="0" name="panelCount" id="">
                <p class="text-red-500">{{$warning}}</p>
            </div>
        @endif

        <button type="submit" class=" text-black border-2 px-4 py-3 rounded font-medium w-full">Create subscription</button>
    </form>
</div>
