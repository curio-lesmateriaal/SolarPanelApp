<div>
    <h1>{{ $title }}</h1>
    <button wire:click="changeTitle">Klik hier!!!</button>
    <ul>
        @foreach($systems as $system)
            <li>{{$system->name}}</li>
        @endforeach
    </ul>
</div>
