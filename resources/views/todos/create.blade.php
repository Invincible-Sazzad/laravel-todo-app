@extends('todos.layout')

@section('content')
<div class="card shadow" style="min-width: 380px;">
    <div class="d-flex justify-content-between border-bottom mt-3 pb-1 px-4">
        <h1 class="pb-4" style="font-size: 25px;">What next you need To-DO</h1>
        <a href="{{route('todo.index')}}" class="py-2 text-secondary text-white" style="margin-left: 20px; cursor: pointer">
            <span class="fas fa-arrow-left" />
        </a>
    </div>

    <x-alert />

    <div class="card-body">
        <form method="post" action="{{route('todo.store')}}">
            @csrf
            <div class="py-1">
                <input type="text" name="title" class="w-100 py-2 px-2 border rounded" placeholder="Title">
            </div>
    
            <div class="py-1">
                <textarea name="description" value="" class="w-100 p-2 rounded border" rows="4" placeholder="Description"></textarea>
            </div>
    
            <div class="py-2">
                @livewire('step')
            </div>
            
            <div class="py-1">
                <input type="submit" value="Create" class="p-2 border rounded">
            </div>
            
        </form>
    </div>
    
</div>
    {{-- <a href="/todos" class="m-5 px-3 py-1 bg-white-400 rounded border cursor-pointer">Back</a> --}}
    {{-- <a href="{{route('todo.index')}}" class="m-5 px-3 py-1 bg-white-400 rounded border cursor-pointer">Back</a> --}}
@endsection