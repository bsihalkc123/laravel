@extends('backend.master')
@section('content')
<div class="p-6">
    <h2 class="text-2xl font-semibold mb-6">Enrollments List</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <a href="{{ route('enrollments.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Add New Enrollment</a>

    <table class="min-w-full bg-white border border-gray-200 rounded">
        <thead class="bg-gray-100">
            <tr class="text-center">
                <th>#</th>
                <th>Student</th>
                <th>Course</th>
                <th>Year</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($enrollments as $enrollment)
            <tr class="text-center">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $enrollment->student->name }}</td>
                <td>{{ $enrollment->course->name }}</td>
                <td>{{ $enrollment->enrollment_year }}</td>
                <td>{{ ucfirst($enrollment->status) }}</td>
                <td>
                    <a href="{{ route('enrollments.edit', $enrollment->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                    <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
