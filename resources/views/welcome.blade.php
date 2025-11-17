<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-6">Login to Your Account</h2>
        
        <form action="#" method="POST" class="space-y-4">
            <div>
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email"
                       class="mt-1 block w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none">
            </div>

            <div>
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password"
                       class="mt-1 block w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none">
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center">
                    <input type="checkbox" class="mr-2">
                    <span class="text-gray-600 text-sm">Remember me</span>
                </label>
                <a href="#" class="text-blue-500 text-sm hover:underline">Forgot Password?</a>
            </div>

            <button type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition-colors">
                Login
            </button>
        </form>

        <p class="text-center text-gray-600 text-sm mt-4">
            Don’t have an account? 
            <a href="#" class="text-blue-500 hover:underline">Sign Up</a>
        </p>
    </div>

</body>
</html>
