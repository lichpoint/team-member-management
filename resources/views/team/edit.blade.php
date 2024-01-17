@extends('layouts.master')

<h1>Edit Team</h1>

<!-- Using Form -->
<!-- <form action="{{ route('team.update', $team->id) }}" method="post">
    @csrf
    @method('PUT')
    <label for="name">Project Name:</label>
    <input type="text" name="name" value="{{ $team->name }}" required>
    <button type="submit" class="button-3">Update Team</button>
</form> -->

<!-- Using API Call -->
<form id="updateTeamForm">
    @csrf
    @method('PUT')
    <label for="name">Team Name:</label>
    <input type="text" name="name" value="{{ $team->name }}" required>
    <button type="button" class="button-3" onclick="updateTeam('{{ $team->id }}')">Update Team</button>
</form>

<a href="{{ route('team.index') }}">Back to Teams List</a>

<script>
    async function updateTeam(teamId) {
        const form = document.getElementById('updateTeamForm');
        const formData = new FormData(form);
        
        // Append the _method parameter to simulate a PUT request
        formData.append('_method', 'PUT');

        try {
            const response = await fetch(`/api/team/${teamId}`, {
                method: 'POST', // Use POST method
                body: formData,
            });

            if (response.ok) {
                // Successful response, you can handle success here
                console.log('Team updated successfully');
                // Redirect to the Teams list or perform any other actions
                window.location.href = '/team';
            } else {
                // Handle error response
                console.error('Error updating team:', response.statusText);
            }
        } catch (error) {
            console.error('Error updating team:', error);
        }
    }
</script>