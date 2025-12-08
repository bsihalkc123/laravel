<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
    <h2 class="text-3xl font-bold text-gray-800 text-center mb-6">Create an Account</h2>

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

      <div class="mb-4">
        <label class="block text-gray-600 mb-1">Full Name</label>
        <input type="text" name="name" class="w-full border px-4 py-2 rounded-lg" required>
      </div>

      <div class="mb-4">
        <label class="block text-gray-600 mb-1">Email</label>
        <input type="email" name="email" class="w-full border px-4 py-2 rounded-lg" required>
      </div>

      <div class="mb-4">
        <label class="block text-gray-600 mb-1">Password</label>
        <input type="password" name="password" class="w-full border px-4 py-2 rounded-lg" required>
      </div>

      <div class="mb-6">
        <label class="block text-gray-600 mb-1">Confirm Password</label>
        <input type="password" name="password_confirmation" class="w-full border px-4 py-2 rounded-lg" required>
      </div>

      <button type="submit"
        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
        Sign Up
      </button>
    </form>

    <p class="text-center text-gray-600 text-sm mt-6">
      Already have an account?
      <a href="{{ route('login.submit') }}" class="text-blue-600 hover:underline">Login</a>
    </p>

  </div>

</body>
</html>
