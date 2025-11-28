@extends('backend.master')

@section('title', 'Teachers')

@section('content')

<div class="p-8">

    <!-- Page Title -->
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Teachers List</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-5 border border-green-300 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Top Controls -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">

        <!-- Search Form -->
        <form method="GET" action="{{ route('teachers.index') }}" 
              class="flex items-center space-x-2 w-full md:w-auto">
            <input 
                type="text" 
                name="search" 
                value="{{ $search ?? '' }}" 
                placeholder="Search by name, code, or email" 
                class="border border-gray-300 rounded-lg p-2 w-full md:w-64 
                       focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            >
            <button type="submit" 
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition shadow">
                Search
            </button>
        </form>

        <!-- Add Teacher Button -->
        <a href="{{ route('teachers.create') }}" 
           class="bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700 transition shadow">
            + Add New Teacher
        </a>
    </div>

    <!-- Table Container -->
    <div class="overflow-hidden rounded-xl shadow-lg border border-gray-200">

        <table class="min-w-full border-collapse">

            <!-- Table Header -->
            <thead class="bg-gradient-to-r from-blue-600 to-blue-500 text-white">
                <tr>
                    <th class="py-4 px-4 text-left font-semibold">ID</th>
                    <th class="py-4 px-4 text-left font-semibold">Teacher Code</th>
                    <th class="py-4 px-4 text-left font-semibold">First Name</th>
                    <th class="py-4 px-4 text-left font-semibold">Last Name</th>
                    <th class="py-4 px-4 text-left font-semibold">Email</th>
                    <th class="py-4 px-4 text-left font-semibold">Phone</th>
                    <th class="py-4 px-4 text-left font-semibold">Qualification</th>
                    <th class="py-4 px-4 text-left font-semibold">Address</th>
                    <th class="py-4 px-4 text-left font-semibold">Actions</th>
                </tr>
            </thead>

            <!-- Table Body -->
            <tbody class="bg-white">
                @forelse($teachers as $teacher)
                <tr class="border-b hover:bg-blue-50 transition duration-200">
                    <td class="py-3 px-4">{{ $teacher->id }}</td>
                    <td class="py-3 px-4 font-medium">{{ $teacher->teacher_code }}</td>
                    <td class="py-3 px-4">{{ $teacher->first_name }}</td>
                    <td class="py-3 px-4">{{ $teacher->last_name }}</td>
                    <td class="py-3 px-4">{{ $teacher->email }}</td>
                    <td class="py-3 px-4">{{ $teacher->phone }}</td>
                    <td class="py-3 px-4">{{ $teacher->qualification }}</td>
                    <td class="py-3 px-4">{{ $teacher->address }}</td>

                    <!-- Action Buttons -->
                    <td class="py-3 px-4 flex gap-2">
                        <a href="{{ route('teachers.edit', $teacher->id) }}" 
                           class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 shadow transition flex items-center gap-1">
                            <i class="fas fa-edit"></i> Edit
                        </a>

                        <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST"
                              onsubmit="return confirm('Are you sure?')" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 shadow transition flex items-center gap-1">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="9" class="py-4 px-4 text-center text-gray-600">
                        No teachers found.
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $teachers->withQueryString()->links() }}
    </div>

</div>

@endsection
