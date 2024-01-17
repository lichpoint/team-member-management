@extends('layouts.master')

<h1>Edit Project</h1>

<!-- Using normal form -->
<!-- <form action="{{ route('project.update', $project->id) }}" method="post">
    @csrf
    @method('PUT')
    <label for="name">Project Name:</label>
    <input type="text" name="name" value="{{ $project->name }}" required>
    <button type="submit" class="button-3">Update Project</button>
</form> -->

<!-- Using API Call -->
<form id="updateProjectForm">
    @csrf
    @method('PUT')
    <label for="name">Project Name:</label>
    <input type="text" name="name" value="{{ $project->name }}" required>
    <button type="button" class="button-3" onclick="updateProject('{{ $project->id }}')">Update Project</button>
</form>

<a href="{{ route('project.index') }}">Back to Projects List</a>

<script>
    async function updateProject(projectId) {
        const form = document.getElementById('updateProjectForm');
        const formData = new FormData(form);
        
        // Append the _method parameter to simulate a PUT request
        formData.append('_method', 'PUT');

        try {
            const response = await fetch(`/api/project/${projectId}`, {
                method: 'POST', // Use POST method
                body: formData,
            });

            if (response.ok) {
                // Successful response, you can handle success here
                console.log('Team updated successfully');
                // Redirect to the projects list or perform any other actions
                window.location.href = '/project';
            } else {
                // Handle error response
                console.error('Error updating team:', response.statusText);
            }
        } catch (error) {
            console.error('Error updating project:', error);
        }
    }
</script>