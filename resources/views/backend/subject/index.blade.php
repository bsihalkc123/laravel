@extends('backend.master')

@section('content')

<div class="p-8">

    <!-- Page Title + Add Button -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <h2 class="text-3xl font-bold text-gray-800">Subjects List</h2>
        @role('admin|teacher')
            <a href="{{ route('subjects.create') }}"
            class="bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700 transition shadow">
                + Add Subject
            </a>
        @endrole
        </div>

    <!-- Table Container -->
    <div class="overflow-hidden rounded-xl shadow-lg border border-gray-200">

        <table class="min-w-full border-collapse">

            <!-- Table Header -->
            <thead class="bg-gradient-to-r from-blue-600 to-blue-500 text-white">
                <tr>
                    <th class="py-4 px-4 text-left font-semibold">ID</th>
                    <th class="py-4 px-4 text-left font-semibold">Subject Name</th>
                    <th class="py-4 px-4 text-left font-semibold">Code</th>
                    <th class="py-4 px-4 text-left font-semibold">Credit Hours</th>
                    <th class="py-4 px-4 text-left font-semibold">Course</th>
                    <th class="py-4 px-4 text-left font-semibold">Teacher</th>
                    <th class="py-4 px-4 text-left font-semibold">Actions</th>
                </tr>
            </thead>

            <!-- Table Body -->
            <tbody class="bg-white">

                @foreach($subjects as $subject)
                <tr class="border-b hover:bg-blue-50 transition duration-200">

                    <td class="py-3 px-4">{{ $subject->id }}</td>
                    <td class="py-3 px-4 font-medium">{{ $subject->subject_name }}</td>
                    <td class="py-3 px-4">{{ $subject->subject_code }}</td>
                    <td class="py-3 px-4">{{ $subject->credit_hours }}</td>
                    <td class="py-3 px-4">{{ $subject->course->course_name }}</td>
                    <td class="py-3 px-4">
                        {{ $subject->teacher->first_name ?? '' }} {{ $subject->teacher->last_name ?? '' }}
                    </td>

                    <!-- Action Buttons -->
                    @role('admin|teacher')
                    <td class="py-3 px-4 flex gap-2">
                        <a href="{{ route('subjects.edit', $subject->id) }}"
                           class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 shadow transition flex items-center gap-1">
                            <i class="fas fa-edit"></i> Edit
                        </a>

                        <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST"
                              onsubmit="return confirm('Delete this subject?')" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button
                                class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 shadow transition flex items-center gap-1">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                    @endrole

                </tr>
                @endforeach

            </tbody>
        </table>

    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $subjects->links() }}
    </div>

</div>

@endsection
