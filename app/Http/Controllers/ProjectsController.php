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

        $pair = 2;

        $total_pairs = 0;
        for ($i = 0; $i < count($ar); $i++) {
            $color = array_keys($ar, $ar[$i]);
            $count = count($color);
            $remainder = $count % $pair;
            $matches = ($count - $remainder) / $pair;

            $total_pairs += $matches;

            foreach ($color as $c) {
                unset($ar[$c]);
            }
        }

        return response('socks for sale', 200)
            ->header('foo', $total_pairs);
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
