<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
    $search = $request->input('search');

    $teachers = Teacher::query()
        ->when($search, function ($query, $search) {
            $query->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('teacher_code', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
        })
        ->orderBy('id', 'desc')
        ->paginate(10);

    return view('backend.teacher.index', compact('teachers', 'search'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'teacher_code' => 'required|unique:teachers',
        'first_name'   => 'required|string|max:255',
        'last_name'    => 'required|string|max:255',
        'email'        => 'required|email|unique:teachers',
        'phone'        => 'required',
        'qualification'=> 'required|string',
        'address'      => 'required|string',
    ]);

    Teacher::create($request->all());

    return redirect()->route('teachers.index')->with('success', 'Teacher added successfully.');
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
    $teacher = Teacher::findOrFail($id);
    return view('backend.teacher.edit', compact('teacher'));
}

    /**
     * Update the specified resource in storage.
     */
    
public function update(Request $request, $id)
{
    $teacher = Teacher::findOrFail($id);

    $request->validate([
        'teacher_code' => 'required|unique:teachers,teacher_code,'.$teacher->id,
        'first_name'   => 'required|string|max:255',
        'last_name'    => 'required|string|max:255',
        'email'        => 'required|email|unique:teachers,email,'.$teacher->id,
        'phone'        => 'required',
        'qualification'=> 'required|string',
        'address'      => 'required|string',
    ]);

    $teacher->update($request->all());

    return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $teacher = Teacher::findOrFail($id);
    $teacher->delete();

    return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully.');
}

}
