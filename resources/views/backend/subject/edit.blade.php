@extends('backend.master')

@section('content')

<h2 class="text-xl font-bold mb-4">Edit Subject</h2>

<form action="{{ route('subjects.update', $subject->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label>Course</label>
        <select name="course_id" class="w-full border px-2 py-1">
            @foreach($courses as $course)
            <option value="{{ $course->id }}" {{ $subject->course_id == $course->id ? 'selected' : '' }}>
                {{ $course->course_name }}
            </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Subject Name</label>
        <input type="text" name="subject_name" class="w-full border px-2 py-1" value="{{ $subject->subject_name }}">
    </div>

    <div>
        <label>Subject Code</label>
        <input type="text" name="subject_code" class="w-full border px-2 py-1" value="{{ $subject->subject_code }}">
    </div>

    <div>
        <label>Credit Hours</label>
        <input type="number" name="credit_hours" class="w-full border px-2 py-1" value="{{ $subject->credit_hours }}">
    </div>

    <div>
        <label>Teacher</label>
        <select name="teacher_id" class="w-full border px-2 py-1">
            @foreach($teachers as $teacher)
            <option value="{{ $teacher->id }}" {{ $subject->teacher_id == $teacher->id ? 'selected' : '' }}>
                {{ $teacher->name }}
            </option>
            @endforeach
        </select>
    </div>

    <button class="px-4 py-2 bg-green-600 text-white rounded">Update Subject</button>

</form>

@endsection
