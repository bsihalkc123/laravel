@extends('backend.master')

@section('title', 'Teachers')

@section('content')
<div class="p-6 bg-white rounded-lg shadow-md mt-6">
    <h2 class="text-2xl font-semibold mb-4">Teachers</h2>
    @if(session('success'))
<div class="bg-green-100 text-green-700 p-3 rounded mb-3">
    {{ session('success') }}
</div>
@endif

    <!-- Add New Teacher Button -->
    <div class="mb-4">
        <a href="{{ route('teachers.create') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
            Add New Teacher
        </a>
    </div>

    <!-- Search Form -->
    <form method="GET" action="{{ route('teachers.index') }}" class="mb-4 flex items-center space-x-2">
        <input 
            type="text" 
            name="search" 
            value="{{ $search ?? '' }}" 
            placeholder="Search by name, code, or email" 
            class="px-4 py-2 border rounded w-full"
        >
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Search
        </button>
    </form>

    <!-- Teachers Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Teacher Code</th>
                    <th class="border px-4 py-2">First Name</th>
                    <th class="border px-4 py-2">Last Name</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Phone</th>
                    <th class="border px-4 py-2">Qualification</th>
                    <th class="border px-4 py-2">Address</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($teachers as $teacher)
                <tr>
                    <td class="border px-4 py-2">{{ $teacher->id }}</td>
                    <td class="border px-4 py-2">{{ $teacher->teacher_code }}</td>
                    <td class="border px-4 py-2">{{ $teacher->first_name }}</td>
                    <td class="border px-4 py-2">{{ $teacher->last_name }}</td>
                    <td class="border px-4 py-2">{{ $teacher->email }}</td>
                    <td class="border px-4 py-2">{{ $teacher->phone }}</td>
                    <td class="border px-4 py-2">{{ $teacher->qualification }}</td>
                    <td class="border px-4 py-2">{{ $teacher->address }}</td>
                    <td class="border px-4 py-2 space-x-2">
                        <a href="{{ route('teachers.edit', $teacher->id) }}" class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                        <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')" class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="border px-4 py-2 text-center">No teachers found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $teachers->withQueryString()->links() }}
    </div>
</div>
@endsection
