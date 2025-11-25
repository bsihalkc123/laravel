@extends('backend.master')
@section('content')

<h2 class="text-xl font-bold mb-4">Add New Exam</h2>

<form action="{{ route('exams.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
        <label class="font-semibold">Exam Name</label>
        <input type="text" name="exam_name" class="w-full border p-2 rounded" required>
    </div>

    <div>
        <label class="font-semibold">Course</label>
        <select name="course_id" class="w-full border p-2 rounded" required>
            @foreach($courses as $course)
                <option value="{{ $course->id }}">{{ $course->course_name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="font-semibold">Exam Year</label>
        <input type="number" name="exam_year" class="w-full border p-2 rounded" required>
    </div>

    <div>
        <label class="font-semibold">Exam Term</label>
        <select name="exam_term" class="w-full border p-2 rounded">
            <option value="1st">1st</option>
            <option value="2nd">2nd</option>
            <option value="3rd">3rd</option>
        </select>
    </div>

    <div>
        <label class="font-semibold">Start Date</label>
        <input type="date" name="start_date" class="w-full border p-2 rounded" required>
    </div>

    <div>
        <label class="font-semibold">End Date</label>
        <input type="date" name="end_date" class="w-full border p-2 rounded" required>
    </div>

    <button class="bg-blue-600 text-white px-4 py-2 rounded">Save Exam</button>
</form>

@endsection
