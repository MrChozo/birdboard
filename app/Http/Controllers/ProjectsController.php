<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function store()
    {
        // Validate
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        // Persist
        Project::create($attributes);
        // Redirect
        return redirect('/projects');
    }
}
