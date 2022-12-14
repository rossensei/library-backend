<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index() {
        $students = Student::orderBy('lname')->get();

        return response()->json([
            'students' => $students
        ]);
    }

    public function show(Student $student) {
        // $student->load('borrows');
        return response()->json($student);
    }

    public function store(Request $request) {
        $request->validate([
            'lname' => 'string|required',
            'fname' => 'string|required',
            'birthdate' => 'string|required',
            'course' => 'string|required',
            'year' => 'numeric|required',
            'gender' => 'string|required',
        ]);

        $student = Student::create($request->all());

        return response()->json($student);
    }

    public function update(Student $student, Request $request) {
        $student->update($request->all());

        return response()->json($student);
    }

    public function destroy(Student $student) {
        $student->delete();
        return response()->json(['message'=>'Student has been deleted.']);
    }
}
