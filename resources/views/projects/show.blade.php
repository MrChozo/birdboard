@extends('layouts.app')

@section('content')
    <h1>{{ $project->title }}</h1>
    <div>{{ $project->description }}</div>
    <div><a href="/projects">Go Back</a></div>
@endsection
