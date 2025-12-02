@extends('frontend.master')

@section('content')
<div class="flex h-screen bg-gray-100">

    {{-- Sidebar --}}
    <aside class="w-64 bg-white shadow-lg">
        <div class="p-6 text-center border-b">
            <h1 class="text-2xl font-bold text-gray-800"><img src="{{ asset('college logo.png') }}" alt="ACHS" class="mx-auto"></h1>
        </div>
        <nav class="mt-6">
            <ul>
                @auth
                    <li class="px-6 py-3 hover:bg-gray-100"><a href="#">Home</a></li>
                    <li class="px-6 py-3 hover:bg-gray-100"><a href="#">My Courses</a></li>
                    <li class="px-6 py-3 hover:bg-gray-100"><a href="#">My Results</a></li>
                    <li class="px-6 py-3 hover:bg-gray-100"><a href="#">Contact Us</a></li>
                @endauth
            </ul>
        </nav>
    </aside>

    {{-- Main Content --}}
    <div class="flex-1 flex flex-col">

        {{-- Topbar --}}
        <header class="flex justify-between items-center bg-white shadow px-6 py-4">
            <div>
                @auth
                    <h2 class="text-xl font-semibold">Welcome, {{ auth()->user()->name }}</h2>
                @else
                    <h2 class="text-xl font-semibold">Welcome, Guest</h2>
                @endauth
            </div>

            <div class="flex items-center space-x-4">
                {{-- Notifications --}}
                @auth
                <div class="relative">
                    <button class="relative focus:outline-none">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-5-5.917V4a2 2 0 10-4 0v1.083A6.002 6.002 0 004 11v3.159c0 .538-.214 1.055-.595 1.436L2 17h5m5 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                        <span class="absolute top-0 right-0 inline-block w-2 h-2 bg-red-600 rounded-full"></span>
                    </button>
                </div>
                @endauth

                {{-- Login / Logout --}}
                @guest
                    <a href="{{ route('login') }}"
                       class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded">
                       Login
                    </a>
                @endguest

                @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded">
                            Logout
                        </button>
                    </form>
                @endauth
            </div>
        </header>

        {{-- Main Dashboard Content --}}
        <main class="flex-1 overflow-y-auto p-6">

            @auth
            {{-- Courses --}}
            <section class="mb-8">
                <h3 class="text-xl font-semibold mb-2">📚 My Courses</h3>
                @if($courses->count())
                    <ul class="list-disc pl-5">
                        @foreach($courses as $course)
                            <li class="mb-1">{{ $course->name }}</li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500">You are not enrolled in any courses.</p>
                @endif
            </section>

            {{-- Results --}}
            <section class="mb-8">
                <h3 class="text-xl font-semibold mb-2">📊 My Results</h3>
                @if($results->count())
                    <table class="w-full border border-gray-300">
                        <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-3 py-2">Course</th>
                            <th class="border px-3 py-2">Exam</th>
                            <th class="border px-3 py-2">Marks</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($results as $result)
                            <tr>
                                <td class="border px-3 py-2">{{ $result->course->name ?? 'N/A' }}</td>
                                <td class="border px-3 py-2">{{ $result->exam->name ?? 'N/A' }}</td>
                                <td class="border px-3 py-2">{{ $result->marks }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-500">No results available yet.</p>
                @endif
            </section>

            {{-- Contact Form --}}
            <section>
                <h3 class="text-xl font-semibold mb-4">📨 Contact Us</h3>
                @if(session('success'))
                    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('user.dashboard.contact') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <input type="text" name="full_name" placeholder="Full Name"
                               value="{{ old('full_name') }}"
                               class="w-full border px-3 py-2 rounded">
                        @error('full_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <input type="email" name="email" placeholder="Email"
                               value="{{ old('email') }}"
                               class="w-full border px-3 py-2 rounded">
                        @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- request type select field --}}
                    <div>
            <select name="request_type"
                    class="w-full border px-3 py-2 rounded">
                <option value="">Select Request Type</option>
                <option value="general" {{ old('request_type') == 'general' ? 'selected' : '' }}>General Inquiry</option>
                <option value="technical" {{ old('request_type') == 'technical' ? 'selected' : '' }}>Technical Issue</option>
                <option value="payment" {{ old('request_type') == 'payment' ? 'selected' : '' }}>Payment Related</option>
                <option value="feedback" {{ old('request_type') == 'feedback' ? 'selected' : '' }}>Feedback</option>
            </select>

                  @error('request_type')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                  @enderror
                   </div>

                    <div>
                        <textarea name="message" rows="4" placeholder="Message"
                                  class="w-full border px-3 py-2 rounded">{{ old('message') }}</textarea>
                        @error('message')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-6 rounded-lg">
                        Send Message
                    </button>
                </form>
            </section>
            @endauth

            @guest
                <p class="text-gray-500 mt-4 text-center">
                    Please log in to view your courses, results, and send messages.
                </p>
            @endguest

        </main>

    </div>
</div>
@endsection