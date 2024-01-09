
<div>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @else
        <div class="form-group">
            <label for="">email</label>
            <input wire:model.live="email" class="form-control" type="email" name="" id="">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="">opmerkingen</label>
            <textarea wire:model.live="remarks" class="form-control" name="" id="" cols="30" rows="10"></textarea>
            @error('remarks') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button wire:click="sendEmail" class="btn btn-success">Verzenden</button>
        <h3>Voorbeeld:</h3>
        <p>email: {{$email}}</p>
        <p><i> {!! $remarks !!} </i></p>
    @endif
</div>
