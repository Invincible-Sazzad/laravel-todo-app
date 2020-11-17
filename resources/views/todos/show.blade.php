@extends('todos.layout')

@section('content')
<div class="card shadow" style="min-width: 380px;">
    <div class="d-flex justify-content-between border-bottom mt-3 pb-1 px-4">
        <h1 class="pb-2" style="font-size: 25px;">{{$todo->title}}</h1>
        <a href="{{route('todo.index')}}" class="py-2 text-secondary text-white" style="margin-left: 20px; cursor: pointer;">
            <span class="fas fa-arrow-left" />
        </a>
    </div>

    <div class="pt-2">
        <h4 class="text-lg">Description</h4>
        <p>
            {{$todo->description}}
        </p>
    </div>

    @if ($todo->steps->count()>0)
        <div class="py-4">
            <h4 class="text-lg">Step for this task</h4>
            @foreach ($todo->steps as $step)
                <p>{{$step->name}}</p>
            @endforeach
        </div>
    @endif
</div>
    
@endsection
