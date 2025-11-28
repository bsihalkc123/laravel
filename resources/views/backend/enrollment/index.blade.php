@extends('backend.master')

@section('content')

<div class="p-8">

    <!-- Page Header + Add Button -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <h2 class="text-3xl font-bold text-gray-800">📘 Enrollments List</h2>

        <a href="{{ route('enrollments.create') }}"
           class="bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700 transition shadow">
            + Add Enrollment
        </a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 p-4 rounded mb-6 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table Container -->
    <div class="overflow-hidden rounded-xl shadow-lg border border-gray-200">
        <table class="min-w-full border-collapse">

            <!-- Table Header -->
            <thead class="bg-gradient-to-r from-blue-600 to-blue-500 text-white">
                <tr class="text-center">
                    <th class="py-4 px-4 font-semibold">#</th>
                    <th class="py-4 px-4 font-semibold">Student</th>
                    <th class="py-4 px-4 font-semibold">Course</th>
                    <th class="py-4 px-4 font-semibold">Year</th>
                    <th class="py-4 px-4 font-semibold">Status</th>
                    <th class="py-4 px-4 font-semibold">Actions</th>
                </tr>
            </thead>

            <!-- Table Body -->
            <tbody class="bg-white">
                @forelse($enrollments as $enrollment)
                <tr class="border-b hover:bg-blue-50 transition duration-200 text-center">
                    <td class="py-3 px-4">{{ $loop->iteration }}</td>

                    <td class="py-3 px-4 font-semibold">{{ $enrollment->student->name }}</td>
                    <td class="py-3 px-4">{{ $enrollment->course->name }}</td>
                    <td class="py-3 px-4">{{ $enrollment->enrollment_year }}</td>
                    <td class="py-3 px-4">
                        <span class="px-3 py-1 rounded-full 
                            @if($enrollment->status === 'active') bg-green-100 text-green-700
                            @elseif($enrollment->status === 'completed') bg-blue-100 text-blue-700
                            @else bg-gray-200 text-gray-700 @endif
                        ">
                            {{ ucfirst($enrollment->status) }}
                        </span>
                    </td>

                    <!-- Action Buttons -->
                    <td class="py-3 px-4 flex gap-2 justify-center">
                        <a href="{{ route('enrollments.edit', $enrollment->id) }}"
                           class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 shadow transition flex items-center gap-1">
                            <i class="fas fa-edit"></i> Edit
                        </a>

                        <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this enrollment?')" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 shadow transition flex items-center gap-1">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-6 text-center text-gray-500">
                        No enrollment records found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $enrollments->withQueryString()->links() }}
    </div>

</div>

@endsection
