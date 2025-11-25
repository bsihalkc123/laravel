<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Student;
use App\Models\Exam;
use App\Models\Subject;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        $results = Result::with(['student', 'exam', 'subject'])->get();
        return view('backend.result.index', compact('results'));
    }

    public function create()
    {
        $students = Student::all();
        $exams = Exam::all();
        $subjects = Subject::all();

        return view('backend.result.create', compact('students', 'exams', 'subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'exam_id' => 'required|exists:exams,id',
            'subject_id' => 'required|exists:subjects,id',
            'obtained_marks' => 'required|integer',
            'full_marks' => 'required|integer',
            'pass_marks' => 'required|integer',
            'remarks' => 'nullable|string',
        ]);

        $grade = $this->generateGrade($request->obtained_marks, $request->full_marks);

        Result::create([
            'student_id' => $request->student_id,
            'exam_id' => $request->exam_id,
            'subject_id' => $request->subject_id,
            'obtained_marks' => $request->obtained_marks,
            'full_marks' => $request->full_marks,
            'pass_marks' => $request->pass_marks,
            'grade' => $grade,
            'remarks' => $request->remarks,
        ]);

        return redirect()->route('results.index')->with('success', 'Result added successfully.');
    }

    public function edit($id)
    {
        $result = Result::findOrFail($id);
        $students = Student::all();
        $exams = Exam::all();
        $subjects = Subject::all();

        return view('backend.result.edit', compact('result', 'students', 'exams', 'subjects'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'exam_id' => 'required|exists:exams,id',
            'subject_id' => 'required|exists:subjects,id',
            'obtained_marks' => 'required|integer',
            'full_marks' => 'required|integer',
            'pass_marks' => 'required|integer',
            'remarks' => 'nullable|string',
        ]);

        $result = Result::findOrFail($id);
        $grade = $this->generateGrade($request->obtained_marks, $request->full_marks);

        $result->update([
            'student_id' => $request->student_id,
            'exam_id' => $request->exam_id,
            'subject_id' => $request->subject_id,
            'obtained_marks' => $request->obtained_marks,
            'full_marks' => $request->full_marks,
            'pass_marks' => $request->pass_marks,
            'grade' => $grade,
            'remarks' => $request->remarks,
        ]);

        return redirect()->route('results.index')->with('success', 'Result updated successfully.');
    }

    public function destroy($id)
    {
        Result::findOrFail($id)->delete();
        return redirect()->route('results.index')->with('success', 'Result deleted successfully.');
    }

    private function generateGrade($obtained, $full)
    {
        $percentage = ($obtained / $full) * 100;

        if ($percentage >= 90) return 'A+';
        if ($percentage >= 80) return 'A';
        if ($percentage >= 70) return 'B+';
        if ($percentage >= 60) return 'B';
        if ($percentage >= 50) return 'C';
        if ($percentage >= 40) return 'D';
        return 'F';
    }
}
