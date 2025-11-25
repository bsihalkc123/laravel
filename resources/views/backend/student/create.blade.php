@extends('backend.master')
@section('content')
<h2 class="text-2xl font-semibold mb-6">Add New Student</h2>

<!-- Display Validation Errors -->
@if ($errors->any())
<div class="bg-red-100 text-red-700 p-4 rounded mb-4">
    <ul class="list-disc pl-5">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('students.store') }}" method="POST" class="space-y-6">
    @csrf

    <div>
        <label for="student_code" class="block text-sm font-medium text-gray-700">Student Code</label>
        <input type="text" name="student_code" id="student_code" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
    </div>

    <div>
        <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
        <input type="text" name="first_name" id="first_name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
    </div>

    <div>
        <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
        <input type="text" name="last_name" id="last_name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
    </div>

    <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" id="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
    </div>

    <div>
        <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
        <input type="text" name="phone_number" id="phone_number" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
    </div>

    <div>
        <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
        <input type="date" name="date_of_birth" id="date_of_birth" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
    </div>

    <div>
        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
        <input type="text" name="address" id="address" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
    </div>

    <div>
        <label for="course" class="block text-sm font-medium text-gray-700">Course</label>
        <select name="course" id="course" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            <option value="Mathematics">Mathematics</option>
            <option value="English">English</option>
            <option value="Science">Science</option>
            <!-- Add more courses as needed -->
        </select>
    </div>

    <div>
        <label for="enrollment_date" class="block text-sm font-medium text-gray-700">Enrollment Date</label>
        <input type="date" name="enrollment_date" id="enrollment_date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
    </div>

    <div>
        <label for="semester" class="block text-sm font-medium text-gray-700">Semester</label>
        <select name="semester" id="semester" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            <option value="1st">1st</option>
            <option value="2nd">2nd</option>
            <option value="3rd">3rd</option>
            <option value="4th">4th</option>
            <option value="5th">5th</option>
            <option value="6th">6th</option>    
            <option value="7th">7th</option>
            <option value="8th">8th</option>
        </select>
    </div>

    <div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Add Student</button>
    </div>
</form>
@endsection
