@extends('backend.master')
@section('content')

<div class="p-8 max-w-4xl mx-auto">

    <h2 class="text-3xl font-bold text-gray-800 mb-6">Add New Student</h2>

    <div class="bg-white shadow-xl rounded-xl p-8 border border-gray-200">

        <form action="{{ route('students.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="font-semibold text-gray-700">Student Code</label>
                    <input type="text" name="student_code"
                        class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="font-semibold text-gray-700">First Name</label>
                    <input type="text" name="first_name"
                        class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="font-semibold text-gray-700">Last Name</label>
                    <input type="text" name="last_name"
                        class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="font-semibold text-gray-700">Email</label>
                    <input type="email" name="email"
                        class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="md:col-span-2">
                    <label class="font-semibold text-gray-700">Address</label>
                    <input type="text" name="address"
                        class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="font-semibold text-gray-700">Date of Birth</label>
                    <input type="date" name="date_of_birth"
                        class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="font-semibold text-gray-700">Course</label>
                    <input type="text" name="course"
                        class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="font-semibold text-gray-700">Enrollment Date</label>
                    <input type="date" name="enrollment_date"
                        class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="font-semibold text-gray-700">Phone Number</label>
                    <input type="text" name="phone_number"
                        class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="font-semibold text-gray-700">Semester</label>
                    <input type="text" name="semester"
                        class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
                </div>

            </div>

            <div class="mt-8 flex justify-end gap-4">
                <a href="{{ route('students.index') }}"
                   class="px-5 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 shadow">
                    Cancel
                </a>

                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 shadow">
                    Save Student
                </button>
            </div>

        </form>

    </div>
</div>

@endsection
