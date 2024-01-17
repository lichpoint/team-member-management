<!-- resources/views/members/edit.blade.php -->
@extends('layouts.master')
<h1>Edit Member</h1>

<!-- Using Normal form -->
<!-- <form action="{{ route('members.update', $member->id) }}" method="post">
    @csrf
    @method('PUT')
    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" value="{{ $member->first_name }}" required>
    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" value="{{ $member->last_name }}" required>
    <label for="city">City:</label>
    <input type="text" name="city" value="{{ $member->city }}" required>
    <label for="state">State:</label>
    <input type="text" name="state" value="{{ $member->state }}" required>
    <label for="country">Country:</label>
    <input type="text" name="country" value="{{ $member->country }}" required>
    <label for="team_id">Team ID:</label>
    <input type="text" name="team_id" value="{{ $member->team_id }}" required>
    <button type="submit" class="button-3">Update Member</button>
</form>

<a href="{{ route('members.index') }}">Back to Members List</a> -->

<!-- Using API Call -->
<form id="updateMemberForm">
    @csrf
    @method('PUT')
    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" value="{{ $member->first_name }}" required>
    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" value="{{ $member->last_name }}" required>
    <label for="city">City:</label>
    <input type="text" name="city" value="{{ $member->city }}" required>
    <label for="state">State:</label>
    <input type="text" name="state" value="{{ $member->state }}" required>
    <label for="country">Country:</label>
    <input type="text" name="country" value="{{ $member->country }}" required>
    <label for="team_id">Team ID:</label>
    <input type="text" name="team_id" value="{{ $member->team_id }}" required>
    <button type="button" class="button-3" onclick="updateMember('{{ $member->id }}')">Update Member</button>
</form>

<a href="{{ route('members.index') }}">Back to Members List</a>

<!-- JavaScript to handle form submission -->
<script>
    async function updateMember(memberId) {
        const form = document.getElementById('updateMemberForm');
        const formData = new FormData(form);
        
        // Append the _method parameter to simulate a PUT request
        formData.append('_method', 'PUT');

        try {
            const response = await fetch(`/api/members/${memberId}`, {
                method: 'POST', // Use POST method
                body: formData,
            });

            if (response.ok) {
                // Successful response, you can handle success here
                console.log('Member updated successfully');
                // Redirect to the members list or perform any other actions
                window.location.href = '/members';
            } else {
                // Handle error response
                console.error('Error updating member:', response.statusText);
            }
        } catch (error) {
            console.error('Error updating member:', error);
        }
    }
</script>
