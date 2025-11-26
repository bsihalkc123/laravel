@extends('backend.master')

@section('content')
<div class="p-6 bg-white rounded-lg shadow-md mt-6 w-full max-w-2xl mx-auto">
    <h2 class="text-2xl font-semibold mb-4">Add New Subject</h2>

    <form action="{{ route('subjects.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block mb-1">Course</label>
            <select name="course_id" class="w-full px-4 py-2 border rounded">
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                        {{ $course->course_name }}
                    </option>
                @endforeach
            </select>
            @error('course_id')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

        <div>
            <label class="block mb-1">Subject Name</label>
            <input type="text" name="subject_name" value="{{ old('subject_name') }}" class="w-full px-4 py-2 border rounded">
            @error('subject_name')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

        <div>
            <label class="block mb-1">Subject Code</label>
            <input type="text" name="subject_code" value="{{ old('subject_code') }}" class="w-full px-4 py-2 border rounded">
            @error('subject_code')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

        <div>
            <label class="block mb-1">Credit Hours</label>
            <input type="number" name="credit_hours" value="{{ old('credit_hours') }}" class="w-full px-4 py-2 border rounded">
            @error('credit_hours')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

        <div>
            <label class="block mb-1">Teacher</label>
            <select name="teacher_id" class="w-full px-4 py-2 border rounded">
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                        {{ $teacher->first_name }} {{ $teacher->last_name }}
                    </option>
                @endforeach
            </select>
            @error('teacher_id')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700">Save Subject</button>
            <a href="{{ route('subjects.index') }}" class="px-6 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</a>
        </div>
    </form>
</div>
@endsection
