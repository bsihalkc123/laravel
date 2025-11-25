@extends('backend.master')
@section('content')
<div class="p-6 max-w-xl mx-auto">
    <h2 class="text-2xl font-semibold mb-6">Edit Result</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('results.update', $result->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1">Student</label>
            <select name="student_id" class="w-full border px-3 py-2 rounded">
                @foreach($students as $student)
                    <option value="{{ $student->id }}" {{ $result->student_id == $student->id ? 'selected' : '' }}>
                        {{ $student->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1">Exam</label>
            <select name="exam_id" class="w-full border px-3 py-2 rounded">
                @foreach($exams as $exam)
                    <option value="{{ $exam->id }}" {{ $result->exam_id == $exam->id ? 'selected' : '' }}>
                        {{ $exam->exam_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1">Subject</label>
            <select name="subject_id" class="w-full border px-3 py-2 rounded">
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ $result->subject_id == $subject->id ? 'selected' : '' }}>
                        {{ $subject->subject_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1">Obtained Marks</label>
            <input type="number" name="obtained_marks" value="{{ $result->obtained_marks }}" class="w-full border px-3 py-2 rounded">
        </div>

        <div>
            <label class="block mb-1">Full Marks</label>
            <input type="number" name="full_marks" value="{{ $result->full_marks }}" class="w-full border px-3 py-2 rounded">
        </div>

        <div>
            <label class="block mb-1">Pass Marks</label>
            <input type="number" name="pass_marks" value="{{ $result->pass_marks }}" class="w-full border px-3 py-2 rounded">
        </div>

        <div>
            <label class="block mb-1">Remarks</label>
            <textarea name="remarks" class="w-full border px-3 py-2 rounded">{{ $result->remarks }}</textarea>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update Result</button>
    </form>
</div>
@endsection
