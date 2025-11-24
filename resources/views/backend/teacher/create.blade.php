@extends('backend.master')

@section('content')
<div class="p-6 bg-white rounded-lg shadow-md mt-6 w-full max-w-2xl mx-auto">
    <h2 class="text-2xl font-semibold mb-4">Add New Teacher</h2>

    <form action="{{ route('teachers.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block mb-1">Teacher Code</label>
            <input type="text" name="teacher_code" value="{{ old('teacher_code') }}" class="w-full px-4 py-2 border rounded">
            @error('teacher_code')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

        <div class="flex space-x-4">
            <div class="flex-1">
                <label class="block mb-1">First Name</label>
                <input type="text" name="first_name" value="{{ old('first_name') }}" class="w-full px-4 py-2 border rounded">
                @error('first_name')<span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div class="flex-1">
                <label class="block mb-1">Last Name</label>
                <input type="text" name="last_name" value="{{ old('last_name') }}" class="w-full px-4 py-2 border rounded">
                @error('last_name')<span class="text-red-500">{{ $message }}</span>@enderror
            </div>
        </div>

        <div>
            <label class="block mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-2 border rounded">
            @error('email')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

        <div>
            <label class="block mb-1">Phone</label>
            <input type="text" name="phone" value="{{ old('phone') }}" class="w-full px-4 py-2 border rounded">
            @error('phone')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

        <div>
            <label class="block mb-1">Qualification</label>
            <input type="text" name="qualification" value="{{ old('qualification') }}" class="w-full px-4 py-2 border rounded">
            @error('qualification')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

        <div>
            <label class="block mb-1">Address</label>
            <textarea name="address" class="w-full px-4 py-2 border rounded">{{ old('address') }}</textarea>
            @error('address')<span class="text-red-500">{{ $message }}</span>@enderror
        </div>

        <div>
            <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700">Add Teacher</button>
            <a href="{{ route('teachers.index') }}" class="px-6 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</a>
        </div>
    </form>
</div>
@endsection
