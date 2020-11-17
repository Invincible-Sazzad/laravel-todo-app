<?php

namespace App\Http\Controllers;

use App\Todo;
use App\Step;
use App\Http\Requests\TodoCreateRequest;
// use Illuminate\Http\Request;
 

class TodoController extends Controller
{
    /**
     * If we want the user must be authenticated to perform todo actions, we can create a group middleware
     * or, we can use the 'auth' middleware in the controller's constructor
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
     
    public function index()
    {
        // $todos = auth()->user()->todos()->orderBy('completed')->get();
        $todos = auth()->user()->todos->sortBy('completed');
        // $todos = Todo::orderBy('completed')->get();
        // return view('todos.index')->with(['todos' => $todos]);
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(TodoCreateRequest $request)
    {
        // dd(auth()->user());
        $todo = auth()->user()->todos()->create($request->all());

        if($request->step) {
            foreach ($request->step as $step) {
                $todo->steps()->create(['name' => $step]);
            }
        }
        
        // $request['user_id'] = auth()->user()->id;
        // Todo::create($request->all());
        return redirect(route('todo.index'))->with('message', 'Todo Created SUccessfully!');
    }

    // Route Model binding
    public function edit(Todo $todo)
    {
        // $todo = Todo::find($id);

        // with compact, data is passed to the view
        return view('todos.edit', compact('todo'));
    }

    // we want same kinds of validation as store, so we have used the formrequest 'TodoCreateRequest'
    public function update(TodoCreateRequest $request, Todo $todo)
    {
        $todo->update(['title' => $request->title, 'description' => $request->description]);
        if($request->stepName) {
            foreach ($request->stepName as $key => $value) {
                $id = $request->stepId[$key];

                if(!$id){
                    $todo->steps()->create(['name' => $value]);
                }else{
                    $step = Step::find($id);
                    $step->update(['name' => $value]);
                }
            }
        }
        return redirect(route('todo.index'))->with('message', 'Successfully updated!');
    }

    public function complete(Todo $todo)
    {
        $todo->update(['completed' => true]);
        return redirect()->back()->with('message', 'Task is marked as completed!');
    }

    public function incomplete(Todo $todo)
    {
        $todo->update(['completed' => false]);

        return redirect()->back()->with('message', 'Task is marked as incompleted!');
    }

    /**
     * Delete a todo
     */
    public function destroy(Todo $todo)
    {
        // delete the childs first
        if($todo->steps->count()>0) {
            $todo->steps->each()->delete();
        }
        
        // delete the parent now
        $todo->delete();
        return redirect()->back()->with('message', 'Task is deleted successfully!');
    }

    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }
}
