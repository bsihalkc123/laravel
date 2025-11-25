@extends('backend.master')
@section('content')

<h2 class="text-2xl font-semibold mb-6">Add New Course</h2>

@if ($errors->any())
<div class="bg-red-100 text-red-700 p-4 rounded mb-4">
    <ul class="list-disc pl-5">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('courses.store') }}" class="space-y-6">
    @csrf

    <div>
        <label class="block text-sm font-medium">Course Name</label>
        <input name="course_name" class="w-full p-2 border rounded" required>
    </div>

    <div>
        <label class="block text-sm font-medium">Course Code</label>
        <input name="course_code" class="w-full p-2 border rounded" required>
    </div>

    <div>
        <label class="block text-sm font-medium">Duration (Years)</label>
        <input type="number" name="duration_years" class="w-full p-2 border rounded" required>
    </div>

    <button class="bg-blue-600 text-white px-4 py-2 rounded">Create Course</button>
</form>

@endsection
