<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {   
        // $Tasks = DB::table('tasks')->get();
        $Tasks = Task::latest() -> get();

        return view('tasks.index', [
            'Tasks' => $Tasks
        ]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store()
    {                        
    //     $task = Task::create([
    //         'title' => request('title'),
    //         'body' => request('body')
    //     ]);
        
        request() -> validate([
            'title' => 'required',
            'body'  => 'required'
        ]);

        $task = Task::create(request(['title', 'body']));

        // required기능 
        // request() -> validate([
        //     'title' => 'required',
        //     'body' => 'required'
        // ]);

        // $task = Task::create(request(['title', 'body']));

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
        request() -> validate([
            'title' => 'required',
            'body'  => 'required'
        ]);

        $task -> update(request(['title', 'body']));

        return redirect('/tasks/'.$task->id);
    }

    public function destroy(Task $task)
    {
        $task -> delete();

        return redirect('/tasks');
    }
}
