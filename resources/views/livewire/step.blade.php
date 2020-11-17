<div>
    <div class="d-flex justify-content-center pb-2 px-4">
        <h2 class="pb-2" style="font-size: 25px;">Add Steps for task</h2>
        <span wire:click="increment" class="fas fa-plus px-2 py-2 text-primary" style="cursor: pointer"/>
    </div>

    @foreach ($steps as $step)
    <div class="d-flex justify-content-center py-2" wire:key="{{$step}}">
        <input type="text" name="step[]" class="w-100 py-1 px-2 border rounded" placeholder="{{'Describe step '.($step+1)}}">
        <span class="fas fa-times text-danger px-2 py-2" style="cursor: pointer" wire:click="remove({{$step}})"/>
    </div>
    @endforeach
</div>
