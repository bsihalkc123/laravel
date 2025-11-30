@extends('backend.master')

@section('content')

<div class="max-w-3xl mx-auto bg-white shadow-xl rounded-xl p-10 border border-gray-200">

    <!-- Marksheet Header -->
<div class="text-center border-b pb-6">
    <h2 class="text-3xl font-bold text-black-700">MarkSheet</h2>
    <div class="mt-2">
        <img src="{{ asset('college logo.png') }}" alt="College logo" class="mx-auto h-17 w-auto">
    </div>
    <p class="text-black-700 font-bold text-3xl">Asian College of Higher Studies</p>
</div>


    <!-- Student Information -->
    <div class="mt-6 grid grid-cols-2 gap-6 text-gray-800 text-sm">

        <div>
            <p class="font-semibold">Student Code:</p>
            <p class="text-gray-600">{{ $result->student->student_code }}</p>
        </div>

        <div>
            <p class="font-semibold">Student Name:</p>
            <p class="text-gray-600">{{ $result->student->first_name }} {{ $result->student->last_name }}</p>
        </div>

        <div>
            <p class="font-semibold">Exam Name:</p>
            <p class="text-gray-600">{{ $result->exam->exam_name }}</p>
        </div>

        <div>
            <p class="font-semibold">Subject:</p>
            <p class="text-gray-600">{{ $result->subject->subject_name }}</p>
        </div>
    </div>

    <!-- Marks Table -->
    <div class="mt-10">
        <table class="w-full border rounded-lg overflow-hidden">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="py-3 border">Full Marks</th>
                    <th class="py-3 border">Pass Marks</th>
                    <th class="py-3 border">Obtained Marks</th>
                    <th class="py-3 border">Grade</th>
                    <th class="py-3 border">Remarks</th>
                </tr>
            </thead>
            <tbody class="text-center text-gray-700">
                <tr class="border">
                    <td class="py-3 border">{{ $result->full_marks }}</td>
                    <td class="py-3 border">{{ $result->pass_marks }}</td>
                    <td class="py-3 border font-semibold">{{ $result->obtained_marks }}</td>
                    <td class="py-3 border font-bold text-blue-700">{{ $result->grade }}</td>
                    <td class="py-3 border">{{ $result->remarks }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <div class="mt-10 border-t pt-6 text-center text-gray-600">
        <p class="text-sm">This marksheet is system generated and does not require a signature.</p>
    </div>

    <!-- Actions -->
    <div class="mt-8 flex justify-center gap-4">
        <a href="{{ route('results.index') }}" 
           class="px-5 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
            Back to List
        </a>

        <button onclick="window.print()" 
                class="px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Print Marksheet
        </button>
    </div>

</div>

@endsection
