<!-- resources/views/members/show.blade.php -->
@extends('layouts.master')

<h1>Member Details</h1>

<p>ID: {{ $member->id }}</p>
<p>First Name: {{ $member->first_name }}</p>
<p>Last Name: {{ $member->last_name }}</p>
<p>City: {{ $member->city }}</p>
<p>State: {{ $member->state }}</p>
<p>Country: {{ $member->country }}</p>
<p>Team ID: {{ $member->team_id }}</p>

<a href="{{ route('members.index') }}">Back to Members List</a>
