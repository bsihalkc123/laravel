@extends('backend.master')
@section('content')
<h2 class="text-2xl font-semibold mb-6">Students List</h2>
<!-- Top Controls: Search + Add New -->
<div class="flex justify-between items-center mb-4">
    <!-- Search Form -->
    <form action="{{ route('students.index') }}" method="GET" class="flex space-x-2">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search students..." class="border border-gray-300 rounded-md p-2">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Search</button>
    </form>
<div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-semibold">Students List</h2>
    <a href="{{ route('students.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
        Add New Student
    </a>
</div>

<table class="min-w-full border border-gray-300">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-2 border">S.N.</th>
            <th class="p-2 border">Student Code</th>
            <th class="p-2 border">First Name</th>
            <th class="p-2 border">Last Name</th>
            <th class="p-2 border">Email</th>
            <th class="p-2 border">Address</th>
            <th class="p-2 border">Date of Birth</th>
            <th class="p-2 border">Course</th>
            <th class="p-2 border">Enrollment Date</th>
            <th class="p-2 border">Phone</th>
            <th class="p-2 border">Semester</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($students as $student)
        <tr class="hover:bg-gray-50">
            <td class="p-2 border">{{ $student->id }}</td>
            <td class="p-2 border">{{ $student->student_code }}</td>
            <td class="p-2 border">{{ $student->first_name }}</td>
            <td class="p-2 border">{{ $student->last_name }}</td>
            <td class="p-2 border">{{ $student->email }}</td>
            <td class="p-2 border">{{ $student->address }}</td>
            <td class="p-2 border">{{ $student->dob }}</td>
            <td class="p-2 border">{{ $student->course }}</td>
            <td class="p-2 border">{{ $student->enrollment_date }}</td>    
            <td class="p-2 border">{{ $student->phone }}</td>
            <td class="p-2 border">{{ $student->semester }}</td>
        </tr>
        @endforeach
    </tbody>

    <tfoot>
        <tr>
            <td colspan="11" class="p-2 border text-right font-semibold">
                Total: {{ $students->count() }} students
            </td>
        </tr>
    </tfoot>
</table>

<!-- Pagination -->
<div class="mt-4">
    {{ $students->withQueryString()->links() }}
</div>
@endsection
