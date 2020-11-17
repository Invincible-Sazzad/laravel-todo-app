@extends('todos.layout')

@section('content')

<div class="card shadow" style="min-width: 380px;">
    <div class="d-flex justify-content-between border-bottom mt-3 pb-2 px-4">
        <h1 class="pb-2" style="font-size: 25px;">Update this todo</h1>
        <a href="{{route('todo.index')}}" class="py-2 text-secondary text-white" style="margin-left: 20px;cursor: pointer">
            <span class="fas fa-arrow-left" />
        </a>
    </div>
    <x-alert />

    <div class="card-body">
        <form action="{{ route('todo.update', ['todo' => $todo->id]) }}" method="post">
            @csrf
            @method('patch')
    
            <div class="py-1">
                <input type="text" name="title" value="{{$todo->title}}" class="w-100 py-2 px-2 border rounded" placeholder="Title">
            </div>
    
            <textarea name="description" class="w-100 my-1 p-1 rounded border" rows="4" placeholder="Description">{{$todo->description}}</textarea>
    
            <div class="py-2">
                @livewire('edit-step', ['steps' => $todo->steps])
            </div>
            
            <div class="py-1">
                <input type="submit" value="Update" class="p-2 border rounded">
            </div>
        </form>
    </div>
</div>
    {{-- <a href="/todos" class="m-5 px-3 py-1 bg-white-400 rounded border cursor-pointer">Back</a> --}}
    {{-- <a href="{{route('todo.index')}}" class="m-5 px-3 py-1 bg-white-400 rounded border cursor-pointer">Back</a> --}}
@endsection
