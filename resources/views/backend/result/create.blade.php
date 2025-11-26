@extends('backend.master')
@section('content')
<div class="p-6 max-w-xl mx-auto">
    <h2 class="text-2xl font-semibold mb-6">Add New Result</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('results.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block mb-1">Student</label>
            <select name="student_id" class="w-full border px-3 py-2 rounded">
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1">Exam</label>
            <select name="exam_id" class="w-full border px-3 py-2 rounded">
                @foreach($exams as $exam)
                    <option value="{{ $exam->id }}">{{ $exam->exam_name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1">Subject</label>
            <select name="subject_id" class="w-full border px-3 py-2 rounded">
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1">Obtained Marks</label>
            <input type="number" name="obtained_marks" class="w-full border px-3 py-2 rounded">
        </div>

        <div>
            <label class="block mb-1">Full Marks</label>
            <input type="number" name="full_marks" class="w-full border px-3 py-2 rounded">
        </div>

        <div>
            <label class="block mb-1">Pass Marks</label>
            <input type="number" name="pass_marks" class="w-full border px-3 py-2 rounded">
        </div>

        <div>
            <label class="block mb-1">Remarks</label>
            <textarea name="remarks" class="w-full border px-3 py-2 rounded"></textarea>
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">Save Result</button>
            <a href="{{ route('results.index') }}" class="px-6 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</a>
        </div>
    </form>
</div>
@endsection
