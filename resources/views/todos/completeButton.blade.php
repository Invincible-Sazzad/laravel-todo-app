@if ($todo->completed)
    <span onclick="event.preventDefault();document.getElementById('form-incomplete-{{$todo->id}}').submit();" 
        class="fas fa-check text-success px-2" style="cursor: pointer"/>

    <form id="form-incomplete-{{$todo->id}}" display="none" action="{{route('todo.incomplete', $todo->id)}}" method="post">
        @csrf
        @method('delete')
    </form>                            
@else
    <span onclick="event.preventDefault();document.getElementById('form-complete-{{$todo->id}}').submit();" 
        class="fas fa-check text-secondary px-2" style="cursor: pointer"/>

    <form id="form-complete-{{$todo->id}}" display="none" action="{{route('todo.complete', $todo->id)}}" method="post">
        @csrf
        @method('put')
    </form>
@endif