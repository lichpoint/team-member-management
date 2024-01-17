@extends('layouts.master')

<h1>Create New Team</h1>

<!-- Using Form -->
<!-- <form action="{{ route('team.store') }}" method="post">
    @csrf
    <label for="name">Team Name:</label>
    <input type="text" name="name" required>
    <button type="submit" class="button-3">Create Member</button>
</form> -->

<!-- Using API Call -->
<form id="createTeamForm">
    @csrf
    <label for="name">Team Name:</label>
    <input type="text" name="name" required>
    <button type="button" class="button-3" onclick="createTeam()">Create Team</button>
</form>


<a href="{{ route('team.index') }}">Back to Teams List</a>

<script>
    async function createTeam() {
        const form = document.getElementById('createTeamForm');
        const formData = new FormData(form);

        try {
            const response = await fetch('/api/team', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            });

            if (response.ok) {
                // Successful response, you can handle success here
                console.log('Team created successfully');
                // Redirect to the teams list or perform any other actions
                window.location.href = '/team';
            } else {
                // Handle error response
                console.error('Error creating team:', response.statusText);
            }
        } catch (error) {
            console.error('Error creating team:', error);
        }
    }
</script>