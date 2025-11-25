@extends('backend.master')

@section('content')

<div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-bold">Exams List</h2>

    <a href="{{ route('exams.create') }}" 
       class="bg-blue-600 text-white px-4 py-2 rounded">
        + Add New Exam
    </a>
</div>

{{-- Search Form --}}
<form method="GET" action="{{ route('exams.index') }}" class="mb-4">
    <div class="flex gap-2">
        <input type="text" 
               name="search" 
               placeholder="Search by exam name or year..."
               value="{{ request('search') }}"
               class="border px-3 py-2 rounded w-64">

        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Search
        </button>
    </div>
</form>


{{-- Exams Table --}}
<table class="min-w-full border border-gray-300">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-3 py-2">#</th>
            <th class="border px-3 py-2">Exam Name</th>
            <th class="border px-3 py-2">Course</th>
            <th class="border px-3 py-2">Year</th>
            <th class="border px-3 py-2">Term</th>
            <th class="border px-3 py-2">Start Date</th>
            <th class="border px-3 py-2">End Date</th>
            <th class="border px-3 py-2">Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($exams as $key => $exam)
        <tr>
            <td class="border px-3 py-2">{{ $key+1 }}</td>

            <td class="border px-3 py-2">{{ $exam->exam_name }}</td>

            <td class="border px-3 py-2">{{ $exam->course->course_name ?? 'N/A' }}</td>

            <td class="border px-3 py-2">{{ $exam->exam_year }}</td>

            <td class="border px-3 py-2">{{ $exam->exam_term }}</td>

            <td class="border px-3 py-2">{{ $exam->start_date }}</td>

            <td class="border px-3 py-2">{{ $exam->end_date }}</td>

            <td class="p-2 flex gap-2">

                <a href="{{ route('exams.edit', $exam->id) }}" 
                   class="bg-yellow-500 text-white px-3 py-1 rounded">
                    Edit
                </a>

                <form action="{{ route('exams.destroy', $exam->id) }}" method="POST" 
                      onsubmit="return confirm('Are you sure you want to delete this exam?');">
                    @csrf 
                    @method('DELETE')

                    <button class="bg-red-600 text-white px-3 py-1 rounded">
                        Delete
                    </button>
                </form>

            </td>
        </tr>

        @empty
        <tr>
            <td colspan="8" class="text-center py-4 text-gray-500">
                No exams found.
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection