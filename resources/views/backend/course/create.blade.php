@extends('backend.master')

@section('content')
<div class="p-6 bg-white rounded-lg shadow-md mt-6 w-full max-w-2xl mx-auto">
    <h2 class="text-2xl font-semibold mb-4">Add New Course</h2>

    <form action="{{ route('courses.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block mb-1">Course Name</label>
            <input type="text" name="course_name" value="{{ old('course_name') }}" class="w-full px-4 py-2 border rounded">
            @error('course_name')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

        <div>
            <label class="block mb-1">Course Code</label>
            <input type="text" name="course_code" value="{{ old('course_code') }}" class="w-full px-4 py-2 border rounded">
            @error('course_code')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

        <div>
            <label class="block mb-1">Duration (Years)</label>
            <input type="number" name="duration_years" value="{{ old('duration_years') }}" class="w-full px-4 py-2 border rounded">
            @error('duration_years')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700">Add Course</button>
            <a href="{{ route('courses.index') }}" class="px-6 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</a>
        </div>
    </form>
</div>
@endsection
