<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExcercisesController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }

    public function index()
    {
        //auth()->id(); check()
        //$tareas = Task::all();
        $tareas = Task::where('user_id', auth()->id())->get();

        return view('tasks.index')->with(["tareas" => $tareas]);
    }
    public function create()
    {

        return view('tasks.create');
    }
    public function store()
    {
        $data = request()->validate([
            'title' => 'required|max:25|min:3',
            'description' => 'required|min:10'
        ]);
        //Task::create($data);
        //Task::create(request(['title', 'description']));
        auth()->user()->tasks()->create($data);
        return redirect('/tasks');
    }

    public function show (Task $task){
        //$task=Task::findOrfail($id);
        return view('tasks.show')->with(["task" => $task]);
    }

    public function edit (Task $task){
        //$task=Task::findOrfail($id);
        return view('tasks.edit')->with(["task" => $task]);
    }
    public function update (Task $task){
        $task->update(request(['title', 'description']));

        return redirect('/tasks');
    }
    public function destroy (Task $task){
        $task->delete();

        return redirect('/tasks');
    }
}
