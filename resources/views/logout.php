<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Logout Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md text-center">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Logout</h2>

    <p class="text-gray-700 mb-6">Are you sure you want to logout?</p>

    <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit"
        class="w-full bg-red-600 text-white py-2 rounded-lg hover:bg-red-700 transition">
        Logout
      </button>
    </form>

    <a href="{{ route('Admindashboard') }}" class="block text-blue-600 hover:underline mt-4">Cancel</a>
  </div>
</body>
</html>