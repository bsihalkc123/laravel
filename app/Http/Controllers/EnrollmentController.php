<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of enrollments.
     */
    public function index()
{
    // Paginate results instead of get()
    $enrollments = Enrollment::with(['student', 'course'])
                    ->orderBy('id', 'desc')
                    ->paginate(10); // 10 per page

    return view('backend.enrollment.index', compact('enrollments'));
}

    /**
     * Show the form for creating a new enrollment.
     */
    public function create()
    {
        $students = Student::all();
        $courses = Course::all();
        return view('backend.enrollment.create', compact('students', 'courses'));
    }

    /**
     * Store a newly created enrollment in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id'  => 'required|exists:courses,id',
            'enrollment_year' => 'required|integer',
            'status' => 'required|in:active,passed,dropped',
        ]);

        Enrollment::create($request->all());

        return redirect()->route('enrollments.index')->with('success', 'Enrollment added successfully.');
    }

    /**
     * Show the form for editing an enrollment.
     */
    public function edit($id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $students = Student::all();
        $courses = Course::all();
        return view('backend.enrollment.edit', compact('enrollment', 'students', 'courses'));
    }

    /**
     * Update the specified enrollment in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id'  => 'required|exists:courses,id',
            'enrollment_year' => 'required|integer',
            'status' => 'required|in:active,passed,dropped',
        ]);

        $enrollment = Enrollment::findOrFail($id);
        $enrollment->update($request->all());

        return redirect()->route('enrollments.index')->with('success', 'Enrollment updated successfully.');
    }

    /**
     * Remove the specified enrollment from storage.
     */
    public function destroy($id)
    {
        Enrollment::findOrFail($id)->delete();
        return redirect()->route('enrollments.index')->with('success', 'Enrollment deleted successfully.');
    }
}
