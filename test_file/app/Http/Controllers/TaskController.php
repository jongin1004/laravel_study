<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index','show']);
    }

    public function index()
    {
        $tasks = Task::latest()->get();
        return view('tasks.index',compact('tasks'));
    }

    public function show(Task $task)
    {
        return view('tasks.show',compact('task'));
    }

    public function store(Request $request)
    {
        $request->validate([
        'title' => 'required',
        'description' => 'required'
        ]);

        $values = request(['title', 'description']);
        $values['user_id'] = auth()->id();

        $task = Task::create($values);

        // $task = Task::create([
        //     'title' => $request->get('title'),
        //     'description' => $request->get('description'),
        //     'user_id' => auth()->id()
        // ]);

        return redirect('/tasks/'.$task->id);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task);

        $task->update($request->all());
        return redirect('/tasks/'.$task->id);
    }

    public function edit(Task $task)
    {
        return view('tasks.edit',compact('task'));
    }

    public function destroy(Task $task)
    {
        $this->authorize('update', $task);

        $task->delete();

        return redirect("/tasks");
    }
}
