<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function sockMerchant()
    {
        $n = request('n');
        $ar = request('ar');

        define("PAIR", 2);
        $pairs = 0;
        for ($i = 0; $i < $n; $i++) {
            $color = array_keys($ar, $ar[$i]);

            $matches = floor(count($color) / PAIR);
            $pairs += floor(count($color) / PAIR);

            echo "matches: $matches\n";
            echo "pairs: $pairs\n";
        }
        return response('socks for sale', 200)
            ->header('foo', $pairs);
    }

    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function store()
    {
        // good example of "Validate, Persist, & Redirect" from Laracasts
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        Project::create($attributes);

        return redirect('/projects');
    }
}
