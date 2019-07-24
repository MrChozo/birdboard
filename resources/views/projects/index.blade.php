@extends('layouts.app')

@section('content')
    <div class="something" style="display: flex; align-items: center;">
        <h1 style="margin-right: auto;">Birdboard</h1>
        <a href="/projects/create">Create new Project</a>
    </div>
    <ul>
        @forelse ($projects as $project)
            <li>
                <a href="{{ $project->path() }}">{{ $project->title }}</a>
            </li>
        @empty
            <li>No projects yet.</li>
        @endforelse
    </ul>
@endsection
