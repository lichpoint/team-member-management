<!-- resources/views/project/show.blade.php -->
@extends('layouts.master')

<h1>Project Details</h1>

<p>ID: {{ $project->id }}</p>
<p>Project Name: {{ $project->name }}</p>

<a href="{{ route('project.index') }}">Back to Project List</a>
