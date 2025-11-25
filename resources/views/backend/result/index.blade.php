@extends('backend.master')
@section('content')
<div class="p-6">
    <h2 class="text-2xl font-semibold mb-6">Results List</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('results.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Add New Result</a>

    <table class="min-w-full bg-white border border-gray-200 rounded">
        <thead class="bg-gray-100">
            <tr class="text-center">
                <th>#</th>
                <th>Student</th>
                <th>Exam</th>
                <th>Subject</th>
                <th>Obtained</th>
                <th>Full Marks</th>
                <th>Pass Marks</th>
                <th>Grade</th>
                <th>Remarks</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $result)
            <tr class="text-center">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $result->student->name }}</td>
                <td>{{ $result->exam->exam_name }}</td>
                <td>{{ $result->subject->subject_name }}</td>
                <td>{{ $result->obtained_marks }}</td>
                <td>{{ $result->full_marks }}</td>
                <td>{{ $result->pass_marks }}</td>
                <td>{{ $result->grade }}</td>
                <td>{{ $result->remarks }}</td>
                <td>
                    <a href="{{ route('results.edit', $result->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                    <form action="{{ route('results.destroy', $result->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?')">
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
