@extends('backend.master')
@section('content')
<h2 class="text-2xl font-semibold mb-6">Add New Student</h2>
<form action="{{ route('students.store') }}" method="POST" class="space-y-6">
    @csrf
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
        <input type="text" name="name" id="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
    </div>
    <div>
        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
        <input type="text" name="address" id="address" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>  
    </div>
    <div>
        <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
        <input type="date" name="date_of_birth" id="date_of_birth" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>      
    </div>
    <div>
        <label for="course" class="block text-sm font-medium text-gray-700">Course</label>
        <select name="course" id="course" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            <option value="Mathematics">Mathematics</option>
            <option value="English">English</option>
            <option value="Science">Science</option>
        </select>       
    </div>
    <div>
        <label for="enrollment_date" class="block text-sm font-medium text-gray-700">Enrollment Date</label>
        <input type="date" name="enrollment_date" id="enrollment_date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>  
    </div>
    <div>
        <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
        <input type="text" name="phone_number" id="phone_number" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
    </div>
    <div>
        <label for="semester" class="block text-sm font-medium text-gray-700">Semester</label>
        <select name="semester" id="semester" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            <option value="1st">1st</option>
            <option value="2nd">2nd</option>
            <option value="3rd">3rd</option>
        </select>
    </div>
    <div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Add Student</button>
    </div>
</form>
@endsection