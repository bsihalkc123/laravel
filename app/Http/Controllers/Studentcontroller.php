<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class StudentController extends BaseController
{
    public function index()
    {
        $students = Student::latest()->paginate(10);
        return view('backend.student.index', compact('students'));
    }

    public function create()
    {
        return view('backend.student.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_code' => 'required|unique:students',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:students',
            'phone_number' => 'required',
            'date_of_birth' => 'required|date',
            'address' => 'required',
            'course' => 'required',
            'semester' => 'required',
            'enrollment_date' => 'required|date',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    public function show(string $id)
    {
        $student = Student::findOrFail($id);
        return view('backend.student.show', compact('student'));
    }

    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view('backend.student.edit', compact('student'));
    }

    public function update(Request $request, string $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'student_code' => 'required|unique:students,student_code,' . $id,
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:students,email,' . $id,
            'phone_number' => 'required',
            'date_of_birth' => 'required|date',
            'address' => 'required',
            'course' => 'required',
            'semester' => 'required',
            'enrollment_date' => 'required|date',
        ]);

        $student->update($request->only([
            'student_code',
            'first_name',
            'last_name',
            'email',
            'phone_number',
            'date_of_birth',
            'address',
            'course',
            'semester',
            'enrollment_date',
        ]));

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    public function destroy(string $id)
    {
        Student::findOrFail($id)->delete();
        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}
