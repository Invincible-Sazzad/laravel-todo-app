<div>
    <div class="d-flex justify-content-center pb-1 px-4">
        <h2 class="pb-2" style="font-size: 25px;">Add Steps for task</h2>
        <span wire:click="increment" class="fas fa-plus text-primary px-2 py-1" style="cursor: pointer" />
    </div>

    @foreach($steps as $step)
    <div class="d-flex justify-content-center py-2" wire:key="{{($loop->index)}}">
        <input type="text" name="stepName[]" class="w-100 py-1 px-2 border rounded" placeholder="{{'Describe Step '.($loop->index+1)}}" value="{{$step['name']}}" />
        <input type="hidden" name="stepId[]" value="{{$step['id']}}" />
        <span class="fas fa-times text-danger p-2" wire:click="remove({{$loop->index}})" />
    </div>
    @endforeach
</div>
