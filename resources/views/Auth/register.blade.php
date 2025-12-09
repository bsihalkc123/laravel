<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .fade-in {
            animation: fadeIn 0.8s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-700 via-blue-700 to-indigo-800">

    <div class="fade-in w-full max-w-md p-10 rounded-3xl 
                bg-white/10 backdrop-blur-2xl shadow-2xl border border-white/20 
                relative overflow-hidden">

        <!-- Decorative Glow -->
        <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-blue-400/20 rounded-full blur-3xl"></div>

        <!-- Title -->
        <h2 class="text-4xl font-extrabold text-center text-white drop-shadow-lg mb-8">
            Create an Account
        </h2>

        <!-- Error Box -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.submit') }}" method="POST">
            @csrf

            <!-- Full Name -->
            <div class="mb-4">
                <label class="block text-white/90 font-semibold mb-2">Full Name</label>
                <div class="flex items-center bg-white/20 border border-white/30 
                            px-4 py-3 rounded-xl backdrop-blur-xl shadow-lg">
                    <i class="fa fa-user text-white/80 mr-3"></i>
                    <input type="text" name="name"
                           placeholder="Enter your full name"
                           class="w-full bg-transparent outline-none text-white placeholder-white/70"
                           required>
                </div>
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label class="block text-white/90 font-semibold mb-2">Email</label>
                <div class="flex items-center bg-white/20 border border-white/30 
                            px-4 py-3 rounded-xl backdrop-blur-xl shadow-lg">
                    <i class="fa fa-envelope text-white/80 mr-3"></i>
                    <input type="email" name="email"
                           placeholder="Enter your email"
                           class="w-full bg-transparent outline-none text-white placeholder-white/70"
                           required>
                </div>
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label class="block text-white/90 font-semibold mb-2">Password</label>
                <div class="flex items-center bg-white/20 border border-white/30 
                            px-4 py-3 rounded-xl backdrop-blur-xl shadow-lg">
                    <i class="fa fa-lock text-white/80 mr-3"></i>
                    <input type="password" name="password"
                           placeholder="Enter your password"
                           class="w-full bg-transparent outline-none text-white placeholder-white/70"
                           required>
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <label class="block text-white/90 font-semibold mb-2">Confirm Password</label>
                <div class="flex items-center bg-white/20 border border-white/30 
                            px-4 py-3 rounded-xl backdrop-blur-xl shadow-lg">
                    <i class="fa fa-check-double text-white/80 mr-3"></i>
                    <input type="password" name="password_confirmation"
                           placeholder="Confirm password"
                           class="w-full bg-transparent outline-none text-white placeholder-white/70"
                           required>
                </div>
            </div>

            <!-- Button -->
            <button type="submit"
                class="w-full py-3 rounded-xl bg-white/30 text-white font-bold text-lg
                       hover:bg-white/40 transition-all duration-300 shadow-xl backdrop-blur-md
                       border border-white/40 hover:scale-[1.03] active:scale-95">
                Sign Up
            </button>
        </form>

        <!-- Login Link -->
        <p class="text-center text-white/80 mt-6">
            Already have an account?
            <a href="{{ route('login.submit') }}"
               class="text-white font-semibold underline hover:text-blue-200 transition">
               Login
            </a>
        </p>

    </div>

    <!-- FontAwesome Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

</body>
</html>
