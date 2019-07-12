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

        $unique_socks = array_unique($ar);

        foreach ($unique_socks as $sock) {
            $color = array_keys($ar, $sock);
            $count = count($color);
            $remainder = $count % $pair;
            $matches = ($count - $remainder) / $pair;

            $total_pairs += $matches;
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
