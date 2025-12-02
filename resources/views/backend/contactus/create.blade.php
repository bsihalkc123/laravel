@extends('backend.master')

@section('content')

<div class="max-w-2xl mx-auto bg-white shadow-lg p-8 rounded-lg mt-10">

    <h2 class="text-3xl font-bold mb-6 text-gray-800 text-center">Contact Us</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('contactus.store') }}" method="POST">
        @csrf

        <!-- Full Name -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Full Name</label>
            <input type="text" name="full_name"
                class="w-full border rounded p-2"
                value="{{ old('full_name') }}" required>
            @error('full_name') 
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Email</label>
            <input type="email" name="email"
                class="w-full border rounded p-2"
                value="{{ old('email') }}" required>
            @error('email') 
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- ⭐ Request Type -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Request Type</label>
            <select name="request_type" class="w-full border rounded p-2" required>
                <option value="">-- Select Request Type --</option>
                <option value="general" {{ old('request_type') == 'general' ? 'selected' : '' }}>General Inquiry</option>
                <option value="technical" {{ old('request_type') == 'technical' ? 'selected' : '' }}>Technical Issue</option>
                <option value="payment" {{ old('request_type') == 'payment' ? 'selected' : '' }}>Payment Related</option>
                <option value="feedback" {{ old('request_type') == 'feedback' ? 'selected' : '' }}>Feedback</option>
            </select>

            @error('request_type')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- Message -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Message</label>
            <textarea name="message" rows="4"
                class="w-full border rounded p-2"
                required>{{ old('message') }}</textarea>

            @error('message') 
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
            class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">
            Send Message
        </button>
    </form>

</div>

@endsection
