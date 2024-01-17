@extends('layouts.master')

<!-- resources/views/team/show.blade.php -->
<h1>Team Details</h1>

<p>ID: {{ $team->id }}</p>
<p>Team Name: {{ $team->name }}</p>

<a href="{{ route('team.index') }}">Back to Team List</a>
