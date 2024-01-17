@extends('layouts.master')

<h1>Create New Project</h1>

<!-- Using form -->
<!-- <form action="{{ route('project.store') }}" method="post">
    @csrf
    <label for="name">Project Name:</label>
    <input type="text" name="name" required>
    <button type="submit" class="button-3">Create Member</button>
</form>

<a href="{{ route('project.index') }}">Back to Projects List</a> -->

<!-- Using API Call -->
<form id="createProjectForm">
    @csrf
    <label for="name">Project Name:</label>
    <input type="text" name="name" required>
    <button type="button" class="button-3" onclick="createProject()">Create Project</button>
</form>

<a href="{{ route('project.index') }}">Back to Projects List</a>

<!-- JavaScript to handle form submission -->
<script>
    async function createProject() {
        const form = document.getElementById('createProjectForm');
        const formData = new FormData(form);

        try {
            const response = await fetch('/api/project', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            });

            if (response.ok) {
                // Successful response, you can handle success here
                console.log('Project created successfully');
                // Redirect to the projects list or perform any other actions
                window.location.href = '/project';
            } else {
                // Handle error response
                console.error('Error creating project:', response.statusText);
            }
        } catch (error) {
            console.error('Error creating project:', error);
        }
    }
</script>