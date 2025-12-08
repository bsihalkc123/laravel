<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-md">

        <!-- College Logo -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('college logo.png') }}" 
                 alt="College Logo" 
                 class="w-40 h-40 object-contain">
        </div>

        <h2 class="text-3xl font-bold text-center mb-6 text-gray-800">Login</h2>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label class="block text-gray-600 font-medium mb-1">Email</label>
                <input type="email" name="email" placeholder="Enter your email"
                       class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 
                              focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label class="block text-gray-600 font-medium mb-1">Password</label>
                <input type="password" name="password" placeholder="Enter your password"
                       class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 
                              focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Submit Button -->
            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 
                           transition">
                Login
            </button>
        </form>

        <p class="text-center text-gray-600 text-sm mt-6">
            Don't have an account? 
            <a href="{{ route('register.form') }}" class="text-blue-600 hover:underline">Sign Up</a>
        </p>

    </div>

</body>
</html>
