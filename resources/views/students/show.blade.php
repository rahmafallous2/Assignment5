<!-- Extends the main layout. -->
@extends('layout')

<!-- Sets the title for this specific view to "Student Details". -->
@section('title', 'Student Details')

@section('content')
<!-- Main header for the student details page. -->
<h1 class="mb-4">Student Details</h1>

<!-- Card component displaying individual student details. -->
<div class="card">
    <div class="card-body">
        <!-- Displays the student's name. -->
        <h5 class="card-title">Name: {{ $student->name }}</h5>
        <!-- Displays the student's age. -->
        <p class="card-text">Age: {{ $student->age }}</p>
        <!-- Link to navigate back to the main student list. -->
        <a href="{{ route('students.index') }}" class="btn btn-primary">Back to List</a>
    </div>
</div>
@endsection
