@extends('backend.master')
@section('content')

<div class="p-8">

    <!-- Page Title -->
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Students List</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-5 border border-green-300 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Top Controls -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">

        <!-- Search Form -->
        <form action="{{ route('students.index') }}" method="GET" class="flex items-center space-x-2 w-full md:w-auto">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search students..."
                class="border border-gray-300 rounded-lg p-2 w-full md:w-64 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            >
            <button
                type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition shadow"
            >
                Search
            </button>
        </form>

        <!-- Add New Button -->
        <a
            href="{{ route('students.create') }}"
            class="bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700 transition shadow"
        >
            + Add New Student
        </a>
    </div>

    <!-- Table Container -->
    <div class="overflow-hidden rounded-xl shadow-lg border border-gray-200">

        <table class="min-w-full border-collapse">

            <!-- Table Header -->
            <thead class="bg-gradient-to-r from-blue-600 to-blue-500 text-white">
                <tr>
                    <th class="py-4 px-4 text-left font-semibold">S.N.</th>
                    <th class="py-4 px-4 text-left font-semibold">Student Code</th>
                    <th class="py-4 px-4 text-left font-semibold">First Name</th>
                    <th class="py-4 px-4 text-left font-semibold">Last Name</th>
                    <th class="py-4 px-4 text-left font-semibold">Email</th>
                    <th class="py-4 px-4 text-left font-semibold">Address</th>
                    <th class="py-4 px-4 text-left font-semibold">Date of Birth</th>
                    <th class="py-4 px-4 text-left font-semibold">Course</th>
                    <th class="py-4 px-4 text-left font-semibold">Enrollment Date</th>
                    <th class="py-4 px-4 text-left font-semibold">Phone Number</th>
                    <th class="py-4 px-4 text-left font-semibold">Semester</th>
                    <th class="py-4 px-4 text-left font-semibold">Actions</th>
                </tr>
            </thead>

            <!-- Table Body -->
            <tbody class="bg-white">
                @foreach ($students as $student)
                <tr class="border-b hover:bg-blue-50 transition duration-200">
                    <td class="py-3 px-4">{{ $student->id }}</td>
                    <td class="py-3 px-4 font-medium">{{ $student->student_code }}</td>
                    <td class="py-3 px-4">{{ $student->first_name }}</td>
                    <td class="py-3 px-4">{{ $student->last_name }}</td>
                    <td class="py-3 px-4">{{ $student->email }}</td>
                    <td class="py-3 px-4">{{ $student->address }}</td>
                    <td class="py-3 px-4">{{ $student->date_of_birth }}</td>
                    <td class="py-3 px-4">{{ $student->course }}</td>
                    <td class="py-3 px-4">{{ $student->enrollment_date }}</td>
                    <td class="py-3 px-4">{{ $student->phone_number }}</td>
                    <td class="py-3 px-4">{{ $student->semester }}</td>

                    <!-- Action Buttons -->
                    <td class="py-3 px-4 flex gap-2">
                        <a
                            href="{{ route('students.edit', $student->id) }}"
                            class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 shadow transition flex items-center gap-1"
                        >
                            <i class="fas fa-edit"></i> Edit
                        </a>

                        <form
                            action="{{ route('students.destroy', $student->id) }}"
                            method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this student?')"
                        >
                            @csrf
                            @method('DELETE')
                            <button
                                class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 shadow transition flex items-center gap-1"
                            >
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

            <!-- Table Footer -->
            <tfoot class="bg-gray-100">
                <tr>
                    <td colspan="12" class="py-4 px-4 font-semibold text-right text-gray-700">
                        Total: {{ $students->count() }} students
                    </td>
                </tr>
            </tfoot>

        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $students->withQueryString()->links() }}
    </div>

</div>

@endsection
