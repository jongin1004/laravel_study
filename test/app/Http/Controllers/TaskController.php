<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {   
        // $Tasks = DB::table('tasks')->get();
        // $Tasks = Task::latest() ->where('user_id', auth()->id())-> get();
        // $Tasks = auth() -> user() -> tasks()->latest()->get(); #로그인한 유저가 가진 tasks를 알려줘  최신순서로 그리고 그 값을 get으로 가져와 
        $Tasks = Task::latest()->get();


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
        
        $values = request(['title', 'body']);
        $values['user_id'] = auth()->id();  //현제 로그인 사람의 id값도 같이 저장한다. 

        $task = Task::create($values);

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
        // if(auth() -> id() != $task->user_id){
        //     abort(403); // 403에러를 보여주면서 막아라 
        // }

        // abort_if(auth() -> id() != $task->user_id, 403);

        // abort_if(!auth()->user()->owns($task), 403);  //로그인한 유저의 유저정보를 보여준다. 그 유저가 task를 소유하고 있지않으면 403에러를 보여줘라 
        // abort_unless(auth()->user()->owns($task), 403);
        $user = User::find($task-> user_id);        

        return view('tasks.show', [
            'task' => $task,
            'user' => $user
        ]);
    }

    public function edit(Task $task)
    {                            
        abort_unless(auth()->user()->owns($task), 403);

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
        abort_unless(auth()->user()->owns($task), 403);
        
        $task -> delete();

        return redirect('/tasks');
    }
}
