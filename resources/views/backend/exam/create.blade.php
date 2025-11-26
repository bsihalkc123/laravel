@extends('backend.master')

@section('content')
<div class="p-6 bg-white rounded-lg shadow-md mt-6 w-full max-w-2xl mx-auto">
    <h2 class="text-2xl font-semibold mb-4">Add New Exam</h2>

    <form action="{{ route('exams.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block mb-1">Exam Name</label>
            <input type="text" name="exam_name" value="{{ old('exam_name') }}" class="w-full px-4 py-2 border rounded">
            @error('exam_name')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

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

        <div class="flex space-x-4">
            <div class="flex-1">
                <label class="block mb-1">Exam Year</label>
                <input type="number" name="exam_year" value="{{ old('exam_year') }}" class="w-full px-4 py-2 border rounded">
                @error('exam_year')<span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div class="flex-1">
                <label class="block mb-1">Exam Term</label>
                <select name="exam_term" class="w-full px-4 py-2 border rounded">
                    <option value="1st" {{ old('exam_term') == '1st' ? 'selected' : '' }}>1st</option>
                    <option value="2nd" {{ old('exam_term') == '2nd' ? 'selected' : '' }}>2nd</option>
                    <option value="3rd" {{ old('exam_term') == '3rd' ? 'selected' : '' }}>3rd</option>
                </select>
                @error('exam_term')<span class="text-red-500">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="flex space-x-4">
            <div class="flex-1">
                <label class="block mb-1">Start Date</label>
                <input type="date" name="start_date" value="{{ old('start_date') }}" class="w-full px-4 py-2 border rounded">
                @error('start_date')<span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div class="flex-1">
                <label class="block mb-1">End Date</label>
                <input type="date" name="end_date" value="{{ old('end_date') }}" class="w-full px-4 py-2 border rounded">
                @error('end_date')<span class="text-red-500">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700">Save Exam</button>
            <a href="{{ route('exams.index') }}" class="px-6 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</a>
        </div>
    </form>
</div>
@endsection
