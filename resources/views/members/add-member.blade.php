@extends('layouts.master')

<h1>Add Member to a Project</h1>

<form id="addMemberForm">
    @csrf
    <label for="member_id">Member ID:</label>
    <input type="text" name="member_id" required>
    <label for="project_id">Project ID:</label>
    <input type="text" name="project_id" required>
    <button type="button" class="button-3" onclick="addMemberToProject()">Add</button>
</form>

<a href="{{ route('members.index') }}">Back to Members List</a>

<!-- JavaScript to handle form submission -->
<script>
    async function addMemberToProject() {
      const form = document.getElementById('addMemberForm');
      const formData = new FormData(form);

      try {
          const response = await fetch('/api/members/add-member', {
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