<!-- Extends the main layout. -->
@extends('layout')

<!-- Sets the title for this view to "Edit Student". -->
@section('title', 'Edit Student')

@section('content')
<!-- Header for the edit form page. -->
<h1 class="mb-4">Edit Student</h1>

<!-- Form for updating student information, sends a PUT request to the update route. -->
<form action="{{ route('students.update', $student->id) }}" method="POST" class="mb-4">
    <!-- CSRF token for security. -->
    @csrf
    <!-- Spoofs PUT method for update request. -->
    @method('PUT')
    <div class="mb-3">
        <!-- Label and input field for the student's name, prefilled with existing name. -->
        <label for="name" class="form-label">Name</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ $student->name }}" required>
    </div>
    <div class="mb-3">
        <!-- Label and input field for the student's age, prefilled with existing age. -->
        <label for="age" class="form-label">Age</label>
        <input type="number" id="age" name="age" class="form-control" value="{{ $student->age }}" required>
    </div>
    <!-- Submit button to update student details. -->
    <button type="submit" class="btn btn-primary">Update Student</button>
</form>
@endsection
