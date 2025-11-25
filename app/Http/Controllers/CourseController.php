<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index(Request $request)
    {
        $search = $request->search;

        $courses = Course::query()
            ->when($search, function($query, $search) {
                $query->where('course_name', 'like', "%{$search}%")
                      ->orWhere('course_code', 'like', "%{$search}%");
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('backend.course.index', compact('courses','search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.course.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_name'   => 'required',
            'course_code'   => 'required|unique:courses',
            'duration_years'=> 'required|numeric',
        ]);

        Course::create($request->all());

        return redirect()->route('courses.index')->with('success','Course Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
     public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('backend.course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([
            'course_name'   => 'required',
            'course_code'   => 'required|unique:courses,course_code,' . $id,
            'duration_years'=> 'required|numeric',
        ]);

        $course->update($request->all());

        return redirect()->route('courses.index')->with('success','Course Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy($id)
    {
        Course::findOrFail($id)->delete();
        return redirect()->route('courses.index')->with('success','Course Deleted Successfully!');
    }
}

