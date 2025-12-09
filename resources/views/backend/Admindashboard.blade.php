<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Student Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .sidebar { transition: all 0.3s ease; }
        .sidebar-item { transition: all 0.2s ease; }
        .sidebar-item:hover { background-color: rgba(59,130,246,0.1); border-left:4px solid #3b82f6; }
        .sidebar-item.active { background-color: rgba(59,130,246,0.15); border-left:4px solid #3b82f6; color:#3b82f6; }
        .card { transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        .notification-dot { animation: pulse 2s infinite; }
        @keyframes pulse { 0% { opacity:1 } 50% { opacity:0.5 } 100% { opacity:1 } }
    </style>
</head>
<body class="bg-gray-50">
<div class="flex min-h-screen">
    <!-- Sidebar -->
    <div class="sidebar bg-white w-64 shadow-md">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center">
                <div class="w-auto h-12 flex items-center justify-center">
                    <img src="{{ asset('images/college logo.webp') }}" alt="Logo" class="h-full object-contain">
                </div>
                <h1 class="text-xl font-bold text-gray-800 ml-3">Asian College Of Higher Studies</h1>
            </div>
            <p class="text-sm text-gray-500 mt-2">Student Management System</p>
        </div>
        <!-- User Profile -->
        <div class="p-4 border-b border-gray-200 flex items-center">
            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                <i class="fas fa-user text-blue-600"></i>
            </div>
            <div class="ml-3">
                <h3 class="font-medium text-gray-800">{{ auth()->user()->name }}</h3>
                <p class="text-xs text-gray-500">{{ auth()->user()->getRoleNames()->first() }}</p>
            </div>
        </div>
        <!-- Menu -->
        <div class="py-4">
            <a href="#" class="sidebar-item active flex items-center py-3 px-6 text-gray-700">
                <i class="fas fa-tachometer-alt w-5 mr-3"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('students.index') }}" class="sidebar-item flex items-center py-3 px-6 text-gray-700">
                <i class="fas fa-user-graduate w-5 mr-3"></i>
                <span>Students</span>
                <span class="ml-auto bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">{{ $counts['students'] }}</span>
            </a>
            <a href="{{ route('teachers.index') }}" class="sidebar-item flex items-center py-3 px-6 text-gray-700">
                <i class="fas fa-chalkboard-teacher w-5 mr-3"></i>
                <span>Teachers</span>
                <span class="ml-auto bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">{{ $counts['teachers'] }}</span>
            </a>
            <a href="{{ route('courses.index') }}" class="sidebar-item flex items-center py-3 px-6 text-gray-700">
                <i class="fas fa-book w-5 mr-3"></i>
                <span>Courses</span>
            </a>
            <a href="{{ route('subjects.index') }}" class="sidebar-item flex items-center py-3 px-6 text-gray-700">
                <i class="fas fa-book-open w-5 mr-3"></i>
                <span>Subjects</span>
            </a>
            <a href="{{ route('exams.index') }}" class="sidebar-item flex items-center py-3 px-6 text-gray-700">
                <i class="fas fa-file-alt w-5 mr-3"></i>
                <span>Exams</span>
            </a>
            <a href="{{ route('results.index') }}" class="sidebar-item flex items-center py-3 px-6 text-gray-700">
                <i class="fas fa-chart-line w-5 mr-3"></i>
                <span>Results</span>
            </a>
            <a href="{{ route('enrollments.index') }}" class="sidebar-item flex items-center py-3 px-6 text-gray-700">
                <i class="fas fa-user-check w-5 mr-3"></i>
                <span>Enrollments</span>
            </a>
            <a href="{{ route('contactus.index') }}" class="sidebar-item flex items-center py-3 px-6 text-gray-700">
                <i class="fas fa-envelope w-5 mr-3"></i>
                <span>Inbox</span>
            </a>
            <a href="#" class="sidebar-item flex items-center py-3 px-6 text-gray-700">
                <i class="fas fa-cog w-5 mr-3"></i>
                <span>Settings</span>
            </a>
        </div>
        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}" class="p-4">
            @csrf
            <button type="submit" class="flex items-center py-2 px-4 text-red-600 rounded-lg hover:bg-red-50 transition w-full text-left">
                <i class="fas fa-sign-out-alt w-5 mr-3"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>

    <!-- Main Content -->
    <div class="flex-1 overflow-auto">
        <header class="bg-[linear-gradient(135deg,#004080,#0066cc)] shadow-sm py-4 px-6 flex justify-between items-center text-white">
            <div>
                <h2 class="text-xl font-semibold text-white">Dashboard</h2>
                <p class="text-sm text-blue-100">Welcome to your student management dashboard</p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <button class="p-2 rounded-full hover:bg-white/10 transition-colors">
                        <i class="fas fa-bell text-white"></i>
                        <span class="notification-dot absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                </div>
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center text-blue-800 font-bold shadow-sm">
                        {{ auth()->user()->initials ?? 'BK' }}
                    </div>
                    <span class="ml-2 text-white font-medium">{{ auth()->user()->name }}</span>
                </div>
            </div>
        </header>

        <!-- Stats Cards -->
        <div class="p-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white p-6 rounded-xl shadow-xl transform hover:scale-105 transition duration-300 flex items-center justify-between">
                <div>
                    <h4 class="text-sm font-semibold uppercase tracking-wide">Total Students</h4>
                    <p class="text-3xl font-bold mt-2">{{ $counts['students'] }}</p>
                </div>
                <div class="text-5xl opacity-80"><i class="fas fa-user-graduate"></i></div>
            </div>
            <div class="bg-gradient-to-r from-yellow-400 via-red-400 to-pink-500 text-white p-6 rounded-xl shadow-xl transform hover:scale-105 transition duration-300 flex items-center justify-between">
                <div>
                    <h4 class="text-sm font-semibold uppercase tracking-wide">Total Teachers</h4>
                    <p class="text-3xl font-bold mt-2">{{ $counts['teachers'] }}</p>
                </div>
                <div class="text-5xl opacity-80"><i class="fas fa-chalkboard-teacher"></i></div>
            </div>
            <div class="bg-gradient-to-r from-teal-400 to-blue-500 text-white p-6 rounded-xl shadow-xl transform hover:scale-105 transition duration-300 flex items-center justify-between">
                <div>
                    <h4 class="text-sm font-semibold uppercase tracking-wide">Total Courses</h4>
                    <p class="text-3xl font-bold mt-2">{{ $counts['courses'] }}</p>
                </div>
                <div class="text-5xl opacity-80"><i class="fas fa-book"></i></div>
            </div>
            <div class="bg-gradient-to-r from-pink-400 to-red-500 text-white p-6 rounded-xl shadow-xl transform hover:scale-105 transition duration-300 flex items-center justify-between">
                <div>
                    <h4 class="text-sm font-semibold uppercase tracking-wide">Total Exams</h4>
                    <p class="text-3xl font-bold mt-2">{{ $counts['exams'] }}</p>
                </div>
                <div class="text-5xl opacity-80"><i class="fas fa-file-alt"></i></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
