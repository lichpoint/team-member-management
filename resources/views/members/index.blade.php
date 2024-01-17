@extends('layouts.master')

<h1>Members List</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>City</th>
            <th>State</th>
            <th>Country</th>
            <th>Team ID</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($members as $member)
            <tr>
                <td>{{ $member->id }}</td>
                <td>{{ $member->first_name }}</td>
                <td>{{ $member->last_name }}</td>
                <td>{{ $member->city }}</td>
                <td>{{ $member->state }}</td>
                <td>{{ $member->country }}</td>
                <td>{{ $member->team_id }}</td>
                <td>
                    <a href="{{ route('members.show', $member->id) }}">Show</a>
                    <a href="{{ route('members.edit', $member->id) }}">Edit</a>
                    <form action="{{ route('members.destroy', $member->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button-24">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('members.create') }}">Create New Member</a>
<br />
<a href="{{ route('members.add-member') }}">Add Member to a Project</a>
<br />
<a href="{{ url('/') }}">Home</a>

