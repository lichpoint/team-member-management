<!-- resources/views/members/create.blade.php -->
@extends('layouts.master')

<h1>Create New Member</h1>

<!-- Using form action -->
<!-- <form action="{{ route('members.store') }}" method="post">
    @csrf
    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" required>
    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" required>
    <label for="city">City:</label>
    <input type="text" name="city" required>
    <label for="state">State:</label>
    <input type="text" name="state" required>
    <label for="country">Country:</label>
    <input type="text" name="country" required>
    <label for="team_id">Team ID:</label>
    <input type="text" name="team_id" required>
    <button type="submit" class="button-3">Create Member</button>
</form>

<a href="{{ route('members.index') }}">Back to Members List</a> -->

<!-- Using API Call -->
<form id="createMemberForm">
    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" required>
    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" required>
    <label for="city">City:</label>
    <input type="text" name="city" required>
    <label for="state">State:</label>
    <input type="text" name="state" required>
    <label for="country">Country:</label>
    <input type="text" name="country" required>
    <label for="team_id">Team ID:</label>
    <input type="text" name="team_id" required>
    <button type="button" class="button-3" onclick="createMember()">Create Member</button>
</form>

<a href="{{ route('members.index') }}">Back to Members List</a>

<!-- JavaScript to handle form submission -->
<script>
    async function createMember() {
        const form = document.getElementById('createMemberForm');
        const formData = new FormData(form);

        try {
            const response = await fetch('/api/members', {
                method: 'POST',
                body: formData,
            });

            if (response.ok) {
                // Successful response, you can handle success here
                console.log('Member created successfully');
                // Redirect to the members list or perform any other actions
                window.location.href = '/members';
            } else {
                // Handle error response
                console.error('Error creating member:', response.statusText);
            }
        } catch (error) {
            console.error('Error creating member:', error);
        }
    }
</script>


