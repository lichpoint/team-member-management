@extends('layouts.master')

<h1>Projects List</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Project Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projects as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->name }}</td>
                <td>
                    <a href="{{ route('project.show', $project->id) }}">Show</a>
                    <a href="{{ route('project.edit', $project->id) }}">Edit</a>
                    <a href="{{ route('project.show-members', $project->id) }}">Members</a>
                    <form action="{{ route('project.destroy', $project->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button-24">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('project.create') }}">Create New Project</a>
<br />
<a href="{{ url('/') }}">Home</a>