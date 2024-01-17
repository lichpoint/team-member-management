@extends('layouts.master')

<h1>Teams List</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Team Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($teams as $team)
            <tr>
                <td>{{ $team->id }}</td>
                <td>{{ $team->name }}</td>
                <td>
                    <a href="{{ route('team.show', $team->id) }}">Show</a>
                    <a href="{{ route('team.edit', $team->id) }}">Edit</a>
                    <form action="{{ route('team.destroy', $team->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button-24">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('team.create') }}">Create New Team</a>
<br />
<a href="{{ url('/') }}">Home</a>