@extends('backend.master')

@section('content')

<h2 class="text-xl font-bold mb-4">Add New Subject</h2>

<form action="{{ route('subjects.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
        <label>Course</label>
        <select name="course_id" class="w-full border px-2 py-1">
            @foreach($courses as $course)
            <option value="{{ $course->id }}">{{ $course->course_name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Subject Name</label>
        <input type="text" name="subject_name" class="w-full border px-2 py-1">
    </div>

    <div>
        <label>Subject Code</label>
        <input type="text" name="subject_code" class="w-full border px-2 py-1">
    </div>

    <div>
        <label>Credit Hours</label>
        <input type="number" name="credit_hours" class="w-full border px-2 py-1">
    </div>

    <div>
        <label>Teacher</label>
        <select name="teacher_id" class="w-full border px-2 py-1">
            @foreach($teachers as $teacher)
            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
            @endforeach
        </select>
    </div>

    <button class="px-4 py-2 bg-blue-600 text-white rounded">Save Subject</button>

</form>

@endsection
