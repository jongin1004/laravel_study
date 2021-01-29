<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $Tasks = Task::all();

        return view('tasks.index', [
            'Tasks' => $Tasks
        ]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {                
        $task = Task::create([
            'title' => $request->input('title'),
            'body'  => $request->input('body')
        ]);

        return redirect('/tasks/'.$task -> id);
    }

    public function show(Task $task)
    {
        return view('tasks.show', [
            'task' => $task
        ]);
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', [
            'task' => $task
        ]);
    }

    public function update(Task $task)
    {        
        $task->update([
            'title' => request('title'),
            'body' => request('body')
        ]);
        
        return redirect('/tasks/'.$task -> id);
    }
}
