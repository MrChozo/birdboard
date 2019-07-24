@extends('layouts.app')

@section('content')
    <h1>Create a new Project</h1>
    <form action="/projects" method="post">
        @csrf
        <div class="foo">
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
        </div>
        <div class="qux">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="40" rows="10"></textarea>
        </div>
        <div class="bar">
            <input type="submit" value="Create Project">
            <a href="/projects">Cancel</a>
        </div>
    </form>
@endsection
