<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Smooth fade-in animation */
        .fade-in {
            animation: fadeIn 0.7s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to   { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-700">

    <div class="fade-in bg-white/20 backdrop-blur-xl shadow-2xl rounded-3xl p-10 w-full max-w-md border border-white/30">

    <!-- College Logo -->
    <div class="flex justify-center mb-6">
        <img src="{{ asset('college logo.png') }}" 
            alt="College Logo" 
            class="max-w-[180px] w-auto h-auto object-contain drop-shadow-xl">
    </div>



        <h2 class="text-4xl font-extrabold text-center mb-6 text-white tracking-wide">
            Welcome Back
        </h2>

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
            <div class="mb-5">
                <label class="block text-white/90 font-semibold mb-1">Email</label>
                <input type="email" name="email" placeholder="Enter your email"
                       class="w-full px-4 py-3 rounded-xl bg-white/30 text-white placeholder-white/70
                              border border-white/40 focus:ring-2 focus:ring-white focus:outline-none
                              backdrop-blur-md shadow-md">
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label class="block text-white/90 font-semibold mb-1">Password</label>
                <input type="password" name="password" placeholder="Enter your password"
                       class="w-full px-4 py-3 rounded-xl bg-white/30 text-white placeholder-white/70
                              border border-white/40 focus:ring-2 focus:ring-white focus:outline-none
                              backdrop-blur-md shadow-md">
            </div>

            <!-- Submit Button -->
            <button type="submit"
                    class="w-full py-3 rounded-xl bg-white/30 text-white font-bold
                           hover:bg-white/40 transition-all duration-300 shadow-lg
                           backdrop-blur-md border border-white/50">
                Login
            </button>
        </form>

        <p class="text-center text-white/80 text-sm mt-6">
            Don't have an account? 
            <a href="{{ route('register.form') }}" class="text-white font-semibold hover:underline">
                Sign Up
            </a>
        </p>

    </div>

</body>
</html>
