<?php
namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('course', 'teacher')->orderBy('id','desc')->paginate(10);
        return view('backend.subject.index', compact('subjects'));
    }

    public function create()
    {
        $courses = Course::all();
        $teachers = Teacher::all();
        return view('backend.subject.create', compact('courses', 'teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required',
            'subject_name' => 'required',
            'subject_code' => 'required|unique:subjects',
            'credit_hours' => 'required|integer',
            'teacher_id' => 'required',
        ]);

        Subject::create($request->all());
        return redirect()->route('subjects.index')->with('success', 'Subject added successfully!');
    }

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        $courses = Course::all();
        $teachers = Teacher::all();

        return view('backend.subject.edit', compact('subject', 'courses', 'teachers'));
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);

        $request->validate([
            'course_id' => 'required',
            'subject_name' => 'required',
            'subject_code' => 'required|unique:subjects,subject_code,' . $id,
            'credit_hours' => 'required|integer',
            'teacher_id' => 'required',
        ]);

        $subject->update($request->all());

        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully!');
    }

    public function destroy($id)
    {
        Subject::findOrFail($id)->delete();
        return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully!');
    }
}
