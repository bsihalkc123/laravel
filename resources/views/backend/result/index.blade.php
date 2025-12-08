@extends('backend.master')

@section('content')

<div class="p-8">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-gray-800">📊 Results List</h2>
        @role('admin|teacher')

        <a href="{{ route('results.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded shadow">
            + Add New Result
        </a>
        @endrole
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 text-green-700 border border-green-300 p-4 rounded mb-6 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table Container -->
    <div class="overflow-x-auto bg-white shadow-lg rounded-xl border border-gray-200">
        <table class="min-w-full border-collapse">

            <!-- Table Header -->
            <thead class="bg-gradient-to-r from-blue-600 to-blue-500 text-white text-sm uppercase">
                <tr class="text-center">
                    <th class="py-4 px-3">#</th>
                    <th class="py-4 px-3">Student</th>
                    <th class="py-4 px-3">Exam</th>
                    <th class="py-4 px-3">Subject</th>
                    <th class="py-4 px-3">Obtained</th>
                    <th class="py-4 px-3">Full Marks</th>
                    <th class="py-4 px-3">Pass Marks</th>
                    <th class="py-4 px-3">Grade</th>
                    <th class="py-4 px-3">Remarks</th>
                    <th class="py-4 px-3">Actions</th>
                </tr>
            </thead>

            <!-- Table Body -->
            <tbody class="text-gray-700">
                @forelse($results as $result)
                <tr class="text-center border-b hover:bg-blue-50 transition">

                    <td class="py-3 px-3">{{ $loop->iteration }}</td>

                    <td class="py-3 px-3 font-semibold">
                        {{ $result->student->student_code }}
                    </td>

                    <td class="py-3 px-3">
                        {{ $result->exam->exam_name }}
                    </td>

                    <td class="py-3 px-3">
                        {{ $result->subject->subject_name }}
                    </td>

                    <td class="py-3 px-3">{{ $result->obtained_marks }}</td>

                    <td class="py-3 px-3">{{ $result->full_marks }}</td>

                    <td class="py-3 px-3">{{ $result->pass_marks }}</td>

                    <td class="py-3 px-3 font-bold text-blue-700">
                        {{ $result->grade }}
                    </td>

                    <td class="py-3 px-3">
                        {{ $result->remarks }}
                    </td>

                    <!-- Action Buttons -->
                    @role('admin|teacher')
                    <td class="py-3 px-3 flex gap-2 justify-center">
                         <a href="{{ route('results.show', $result->id) }}" 
                            class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700 shadow transition">
                              View
                        </a>
                        
                        <a href="{{ route('results.edit', $result->id) }}"
                           class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 shadow transition">
                            Edit
                        </a>

                        <form action="{{ route('results.destroy', $result->id) }}"
                              method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this result?')">
                            @csrf
                            @method('DELETE')

                            <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 shadow transition">
                                Delete
                            </button>
                        </form>
                    </td>
                    @endrole
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text-center py-6 text-gray-500">
                        No results found.
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $results->links() }}
    </div>

</div>

@endsection
