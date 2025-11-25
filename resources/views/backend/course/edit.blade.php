@extends('backend.master')
@section('content')

<h2 class="text-2xl font-semibold mb-6">Edit Course</h2>

<form method="POST" action="{{ route('courses.update', $course->id) }}" class="space-y-6">
    @csrf
    @method('PUT')

    <div>
        <label class="block text-sm font-medium">Course Name</label>
        <input name="course_name" value="{{ $course->course_name }}" class="w-full p-2 border rounded" required>
    </div>

    <div>
        <label class="block text-sm font-medium">Course Code</label>
        <input name="course_code" value="{{ $course->course_code }}" class="w-full p-2 border rounded" required>
    </div>

    <div>
        <label class="block text-sm font-medium">Duration (Years)</label>
        <input type="number" name="duration_years" value="{{ $course->duration_years }}" class="w-full p-2 border rounded" required>
    </div>

    <button class="bg-blue-600 text-white px-4 py-2 rounded">Update Course</button>
</form>

@endsection
