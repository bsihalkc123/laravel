@extends('backend.master')
@section('content')

<h2 class="text-2xl font-semibold mb-4">Courses</h2>

@if(session('success'))
<div class="bg-green-100 text-green-700 p-3 rounded mb-3">
    {{ session('success') }}
</div>
@endif

<div class="flex justify-between mb-4">
    
    <form action="{{ route('courses.index') }}" class="flex space-x-2">
        <input type="text" name="search" value="{{ $search }}" placeholder="Search courses..." class="border p-2 rounded">
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Search</button>
    </form>

    <a href="{{ route('courses.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">
        Add New Course
    </a>
</div>

<table class="min-w-full border">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-2 border">ID</th>
            <th class="p-2 border">Course Name</th>
            <th class="p-2 border">Course Code</th>
            <th class="p-2 border">Duration (Years)</th>
            <th class="p-2 border">Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($courses as $course)
        <tr class="hover:bg-gray-50">
            <td class="p-2 border">{{ $course->id }}</td>
            <td class="p-2 border">{{ $course->course_name }}</td>
            <td class="p-2 border">{{ $course->course_code }}</td>
            <td class="p-2 border">{{ $course->duration_years }}</td>
            <td class="p-2 border space-x-2">
                <a href="{{ route('courses.edit', $course->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>

                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="inline-block">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Are you sure?')" class="bg-red-600 text-white px-2 py-1 rounded">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="5" class="p-4 text-center text-gray-500">No courses found.</td></tr>
        @endforelse
    </tbody>
</table>

<div class="mt-4">
    {{ $courses->links() }}
</div>

@endsection
