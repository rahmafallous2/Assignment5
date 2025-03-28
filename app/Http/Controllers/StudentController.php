<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
//Rahma Fallous - 20230637

class StudentController extends Controller
{
    // Display a list of students
    public function index(Request $request)
    {
        $students = Student::all(); 
        return view('students.index', compact('students'));
    }

    // Handle AJAX search & filtering
    public function search(Request $request)
    {
        $query = $request->input('query');
        $minAge = $request->input('minAge');
        $maxAge = $request->input('maxAge');

        $students = Student::query();

        if ($query) {
            $students->where('name', 'LIKE', "%$query%");
        }
        if ($minAge) {
            $students->where('age', '>=', $minAge);
        }
        if ($maxAge) {
            $students->where('age', '<=', $maxAge);
        }

        $students = $students->get();

        return view('students.partials.student_table', compact('students'));
    }

    // Show the form to create a new student
    public function create()
    {
        return view('students.create'); // Make sure this view exists!
    }

    // Store a newly created student
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age'  => 'required|integer|min:1|max:100',
        ]);

        Student::create([
            'name' => $request->name,
            'age'  => $request->age,
        ]);

        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }
}
