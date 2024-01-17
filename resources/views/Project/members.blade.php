@extends('layouts.master')

<h1>Members List</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Second Name</th>
            <th>City</th>
            <th>State</th>
            <th>Country</th>
        </tr>
    </thead>
    <tbody>
        @foreach($members as $member)
            <tr>
                <td>{{ $member->id }}</td>
                <td>{{ $member->first_name }}</td>
                <td>{{ $member->second_name }}</td>
                <td>{{ $member->city }}</td>
                <td>{{ $member->state }}</td>
                <td>{{ $member->country }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('project.index') }}">Back to Projects List</a>
<br />
<a href="{{ url('/') }}">Home</a>