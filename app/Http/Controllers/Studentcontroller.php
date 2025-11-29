<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Stub;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::latest()->paginate(10);
        return view('backend.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
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

    
    // * Display the specified resource.
    //  */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);
        return view('backend.student.show', compact('student'));
    }

    /**
    * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view('backend.student.edit', compact('student'));
    }

    // /**
    //  * Update the specified resource.
    //  */
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

        return redirect()->route('student.index')
            ->with('success', 'Student updated successfully.');
    }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    public function destroy(string $id)
    {
        Student::findOrFail($id)->delete();
        return redirect()->route('student.index')
            ->with('success', 'Student deleted successfully.');
    }
}
