<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('home');
});

Route::resource('students', StudentController::class);
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/search', [StudentController::class, 'search'])->name('students.search');


