<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Course;
use Illuminate\Http\Request;

class ExamController extends Controller
{
  public function index(Request $request)
    {
    $query = Exam::query();

    if ($request->search) {
        $query->where('exam_name', 'like', '%'.$request->search.'%')
              ->orWhere('exam_year', 'like', '%'.$request->search.'%');
    }
 
    $exams = $query->with('course')->paginate(10);

    return view('backend.exam.index', compact('exams'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('backend.exam.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'exam_name' => 'required',
            'course_id' => 'required',
            'exam_year' => 'required',
            'exam_term' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        Exam::create($request->all());

        return redirect()->route('exams.index')->with('success', 'Exam Created Successfully');
    }
    public function edit($id)
    {
    $exam = Exam::findOrFail($id);
    $courses = Course::all();

    return view('backend.exam.edit', compact('exam', 'courses'));
    }

public function update(Request $request, $id)
{
    $request->validate([
        'exam_name' => 'required',
        'course_id' => 'required',
        'exam_year' => 'required',
        'exam_term' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
    ]);

    $exam = Exam::findOrFail($id);
    $exam->update($request->all());

    return redirect()->route('exams.index')->with('success', 'Exam Updated Successfully');
}
    public function destroy($id)
    {
        Exam::findOrFail($id)->delete();

        return redirect()->route('exams.index')->with('success', 'Exam Deleted Successfully');
    }
}
