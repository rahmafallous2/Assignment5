@extends('layout')
@section('title', 'Add Student')
@section('content')

<h2>Add a New Student</h2>

<form method="POST" action="{{ route('students.store') }}">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Student Name</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="age" class="form-label">Age</label>
        <input type="number" id="age" name="age" class="form-control" required min="1" max="100">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection

