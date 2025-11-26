@extends('backend.master')
@section('content')
<div class="p-6 max-w-xl mx-auto">
    <h2 class="text-2xl font-semibold mb-6">Add New Enrollment</h2>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('enrollments.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block mb-1">Student</label>
            <select name="student_id" class="w-full border px-3 py-2 rounded">
                @foreach($students as $student)
                    <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>
                        {{ $student->name }}
                    </option>
                @endforeach
            </select>
            @error('student_id')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

        <div>
            <label class="block mb-1">Course</label>
            <select name="course_id" class="w-full border px-3 py-2 rounded">
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
            @error('course_id')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

        <div>
            <label class="block mb-1">Enrollment Year</label>
            <input type="number" name="enrollment_year" value="{{ old('enrollment_year') }}" class="w-full border px-3 py-2 rounded">
            @error('enrollment_year')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

        <div>
            <label class="block mb-1">Status</label>
            <select name="status" class="w-full border px-3 py-2 rounded">
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="passed" {{ old('status') == 'passed' ? 'selected' : '' }}>Passed</option>
                <option value="dropped" {{ old('status') == 'dropped' ? 'selected' : '' }}>Dropped</option>
            </select>
            @error('status')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">Save Enrollment</button>
            <a href="{{ route('enrollments.index') }}" class="px-6 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</a>
        </div>
    </form>
</div>
@endsection
