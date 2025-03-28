@foreach ($students as $student)
<tr>
    <td>{{ $student->id }}</td>
    <td>{{ $student->name }}</td>
    <td>{{ $student->age }} years old</td>
</tr>
@endforeach
