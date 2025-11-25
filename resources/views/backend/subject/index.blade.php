@extends('backend.master')

@section('content')

<div class="flex justify-between mb-4">
    <h2 class="text-xl font-bold">Subjects List</h2>
    <a href="{{ route('subjects.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Add Subject</a>
</div>

<table class="min-w-full border border-gray-300">
    <thead class="bg-gray-200">
        <tr>
            <th>ID</th>
            <th>Subject Name</th>
            <th>Code</th>
            <th>Credit Hours</th>
            <th>Course</th>
            <th>Teacher</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($subjects as $subject)
        <tr>
            <td>{{ $subject->id }}</td>
            <td>{{ $subject->subject_name }}</td>
            <td>{{ $subject->subject_code }}</td>
            <td>{{ $subject->credit_hours }}</td>
            <td>{{ $subject->course->course_name }}</td>
            <td>{{ $subject->teacher->name }}</td>

            <td class="flex gap-2">
                <a href="{{ route('subjects.edit', $subject->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded">Edit</a>

                <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="px-3 py-1 bg-red-600 text-white rounded" onclick="return confirm('Delete this subject?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-4">
    {{ $subjects->links() }}
</div>

@endsection
