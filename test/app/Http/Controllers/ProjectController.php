<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {
        
        // $projects = \App\Models\Project::all();
        $projects = DB::table('projects')->get();

        return view('project' ,[
            'projects' => $projects
        ]);
    }
}
