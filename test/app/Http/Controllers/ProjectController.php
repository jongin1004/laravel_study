<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function index(){

        $projects = \App\Models\Project::all();

        return view('project.index', [
            'projects' => $projects
        ]);
    }
}
