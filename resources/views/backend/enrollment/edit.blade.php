@extends('backend.master')
@section('content')
<div class="p-6 max-w-xl mx-auto">
    <h2 class="text-2xl font-semibold mb-6">Edit Enrollment</h2>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc pl-5">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('enrollments.update', $enrollment->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1">Student</label>
            <select name="student_id" class="w-full border px-3 py-2 rounded">
                @foreach($students as $student)
                <option value="{{ $student->id }}" {{ $enrollment->student_id == $student->id ? 'selected' : '' }}>
                    {{ $student->student_code }}
                </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1">Course</label>
            <select name="course_id" class="w-full border px-3 py-2 rounded">
                @foreach($courses as $course)
                <option value="{{ $course->id }}" {{ $enrollment->course_id == $course->id ? 'selected' : '' }}>
                    {{ $course->course_code }}
                </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1">Enrollment Year</label>
            <input type="number" name="enrollment_year" value="{{ $enrollment->enrollment_year }}" class="w-full border px-3 py-2 rounded">
        </div>

        <div>
            <label class="block mb-1">Status</label>
            <select name="status" class="w-full border px-3 py-2 rounded">
                <option value="active" {{ $enrollment->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="passed" {{ $enrollment->status == 'passed' ? 'selected' : '' }}>Passed</option>
                <option value="dropped" {{ $enrollment->status == 'dropped' ? 'selected' : '' }}>Dropped</option>
            </select>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update Enrollment</button>
    </form>
</div>
@endsection
