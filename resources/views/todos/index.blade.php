@extends('todos.layout')

@section('content')
<div class="card shadow" style="min-width: 380px;">
    <div class="d-flex justify-content-between border-bottom mt-2 pb-4 px-4">
        <h3 style="font-size: 25px;">All your Todos</h3>
        {{-- <a href="/todos/create" class="mx-5 py-2 text-blue-400 cursor-pointer">
            <span class="fas fa-plus-circle" />
        </a> --}}

        <a href="{{route('todo.create')}}" class="py-2 text-primary" style="margin: 0px;">
            <span class="fas fa-plus-circle" />
        </a>
    </div>
    
    <ul class="list-unstyled">
        <x-alert />
        @forelse ($todos as $todo)
            <li class="d-flex justify-content-between px-3 py-2">
                <div>
                    @include('todos.completeButton')
                </div>
                @if ($todo->completed)
                    <p><del>{{ $todo->title }}</del></p>
                @else
                <a class="cursor-pointer" style="text-decoration: none;" href="{{route('todo.show', $todo->id)}}">{{ $todo->title }}</a>
                @endif
                
                <div>
                    {{-- <a href="{{'/todos/'.$todo->id.'/edit'}}" class="text-orange-400 rounded cursor-pointer text-white">
                        <span class="fas fa-edit px-2"/>
                    </a> --}}

                    <a href="{{route('todo.edit', $todo->id)}}" class="text-warning rounded text-white" style="cursor: pointer">
                        <span class="fas fa-pen px-2"/>
                    </a>

                    <span onclick="event.preventDefault();
                    if(confirm('Are you sure?')) {
                        document.getElementById('form-delete-{{$todo->id}}').submit();
                    }" class="fas fa-times text-danger px-2" style="cursor: pointer"/>

                    <form id="form-delete-{{$todo->id}}" display="none" action="{{route('todo.destroy', $todo->id)}}" method="post">
                        @csrf
                        @method('delete')
                    </form> 
                </div>
                
            </li>
        @empty
            <p>No Task available, create one.</p>
        @endforelse
    </ul>
</div>
    
@endsection