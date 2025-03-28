@extends('layout')
@section('title', 'Students')
@section('content')

<h2>Students</h2>

<!-- Search & Filtering Inputs -->
<div>
    <input type="text" id="search" placeholder="Search Students">
    <input type="number" id="minAge" placeholder="Min Age">
    <input type="number" id="maxAge" placeholder="Max Age">
    <button id="filterBtn">Filter</button>
</div>

<!-- Student Table -->
<table class="table mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
        </tr>
    </thead>
    <tbody id="studentTable">
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->age }} years old</td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- jQuery & AJAX Script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function() {
    function fetchStudents() {
        let query = $("#search").val();
        let minAge = $("#minAge").val();
        let maxAge = $("#maxAge").val();

        $.ajax({
            url: "{{ route('students.search') }}",
            method: "GET",
            data: { query: query, minAge: minAge, maxAge: maxAge },
            success: function(response) {
                $("#studentTable tbody").html(response); /
            }
        });
    }

    $("#search").on("keyup", fetchStudents);
    $("#filterBtn").on("click", fetchStudents);
});
</script>

@endsection
