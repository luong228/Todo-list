<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\todo;

class toDosController extends Controller
{
    public function index() 
    {
        $todos = todo::all();
        return view('todos.index')->with('todos', $todos);
    }

    public function show($todoId)
    {
        return view('todos.show')->with('todo', todo::find($todoId));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store()
    {   
        $this->validate(request(), [
            'name' => 'required|min:6|max:12',
            'description' => 'required|'
        ]);

        $data = request()->all();

        $todo = new todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;

        $todo->save();

        session()->flash('success', 'Todo created successfully');

        return redirect('/');

    }

    public function edit($todoId)
    {
        return view('todos.edit')->with('todo', todo::find($todoId));
    }

    public function update($todoId)
    {
        $this->validate(request(), [
            'name' => 'required|min:6|max:12',
            'description' => 'required|'
        ]);

        $data = request()->all();

        $todo = Todo::find($todoId);
        $todo->name = $data['name'];
        $todo->description = $data['description'];

        $todo->save();

        session()->flash('success', 'Todo updated successfully');

        return redirect('/');
    }

    public function destroy($todoId)
    {
        $todo = todo::find($todoId);
        $todo->delete();

        session()->flash('success', 'Todo deleted successfully');

        return redirect('/');
    }

    public function complete(todo $todo)
    {
        $todo->completed = true;
        $todo->save();

        session()->flash('success', 'Todo completed successfully');

        return redirect('/');
    }
}
