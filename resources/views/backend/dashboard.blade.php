<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        .sidebar {
            transition: all 0.3s ease;
        }
        
        .sidebar-item {
            transition: all 0.2s ease;
        }
        
        .sidebar-item:hover {
            background-color: rgba(59, 130, 246, 0.1);
            border-left: 4px solid #3b82f6;
        }
        
        .sidebar-item.active {
            background-color: rgba(59, 130, 246, 0.15);
            border-left: 4px solid #3b82f6;
            color: #3b82f6;
        }
        
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .stat-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .progress-bar {
            transition: width 1s ease-in-out;
        }
        
        .notification-dot {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.5; }
            100% { opacity: 1; }
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Dashboard Container -->
    <div class="flex min-h-screen">
        <!-- Sidebar Menu -->
        <div class="sidebar bg-white w-64 shadow-md">
            <!-- Logo and Title -->
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-white"></i>
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
                    <h3 class="font-medium text-gray-800">Bishal Kc</h3>
                    <p class="text-xs text-gray-500">Administrator</p>
                </div>
            </div>
            
            <!-- Navigation Menu -->
            <div class="py-4">
                <a href="#" class="sidebar-item active flex items-center py-3 px-6 text-gray-700">
                    <i class="fas fa-tachometer-alt w-5 mr-3"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('students.index') }}" class="sidebar-item flex items-center py-3 px-6 text-gray-700">
                    <i class="fas fa-user-graduate w-5 mr-3"></i>
                    <span>Students</span>
                    <span class="ml-auto bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">42</span>
                </a>
                
                <a href="{{ route('teachers.index') }}" class="sidebar-item flex items-center py-3 px-6 text-gray-700">
                    <i class="fas fa-chalkboard-teacher w-5 mr-3"></i>
                    <span>Teachers</span>
                    <span class="ml-auto bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">12</span>
                </a>
                
                <a href="{{ route('courses.index') }}" class="sidebar-item flex items-center py-3 px-6 text-gray-700">
                    <i class="fas fa-book w-5 mr-3"></i>
                    <span>Courses</span>
                </a>
                
                <a href="{{ route('subjects.index') }}" class="sidebar-item flex items-center py-3 px-6 text-gray-700">
                    <i class="fas fa-calendar-alt w-5 mr-3"></i>
                    <span>Subjects</span>
                </a>
                
                <a href="{{ route('exams.index') }}" class="sidebar-item flex items-center py-3 px-6 text-gray-700">
                    <i class="fas fa-file-invoice-dollar w-5 mr-3"></i>
                    <span>Exams</span>
                </a>
                
                <a href="{{ route('results.index') }}" class="sidebar-item flex items-center py-3 px-6 text-gray-700">
                    <i class="fas fa-chart-bar w-5 mr-3"></i>
                    <span>Results</span>
                </a>

                <a href="{{ route('enrollments.index') }}" class="sidebar-item flex items-center py-3 px-6 text-gray-700">
                    <i class="fas fa-chart-bar w-5 mr-3"></i>
                    <span>Enrollments</span>
                </a>
                
                <a href="#" class="sidebar-item flex items-center py-3 px-6 text-gray-700">
                    <i class="fas fa-cog w-5 mr-3"></i>
                    <span>Settings</span>
                </a>
            </div>
            
            <!-- Logout Button -->
            <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="flex items-center py-2 px-4 text-red-600 rounded-lg hover:bg-red-50 transition w-full text-left">
        <i class="fas fa-sign-out-alt w-5 mr-3"></i>
        <span>Logout</span>
    </button>
</form>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <!-- Header -->
            <header class="bg-white shadow-sm py-4 px-6 flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Dashboard</h2>
                    <p class="text-sm text-gray-500">Welcome to your student management dashboard</p>
                </div>
                
                <div class="flex items-center space-x-4">
                    <!-- Notifications -->
                    <div class="relative">
                        <button class="p-2 rounded-full hover:bg-gray-100">
                            <i class="fas fa-bell text-gray-600"></i>
                            <span class="notification-dot absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>
                    </div>
                    
                    <!-- User Menu -->
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white font-medium">
                            BK
                        </div>
                        <span class="ml-2 text-gray-700 font-medium">Bishal Kc</span>
                    </div>
                </div>
            </header>
<body>
          <!-- Main Content Body -->
<div class="p-6 bg-gray-50 min-h-screen">

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-6">
        <!-- Total Students -->
        <div class="card stat-card text-white p-6 rounded-lg shadow-lg flex items-center justify-between">
            <div>
                <h4 class="text-sm font-medium">Total Students</h4>
                <p class="text-2xl font-bold mt-2">42</p>
            </div>
            <div class="text-4xl opacity-70">
                <i class="fas fa-user-graduate"></i>
            </div>
        </div>

        <!-- Total Teachers -->
        <div class="card stat-card text-white p-6 rounded-lg shadow-lg flex items-center justify-between" style="background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);">
            <div>
                <h4 class="text-sm font-medium">Total Teachers</h4>
                <p class="text-2xl font-bold mt-2">12</p>
            </div>
            <div class="text-4xl opacity-70">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
        </div>

        <!-- Total Courses -->
        <div class="card stat-card text-white p-6 rounded-lg shadow-lg flex items-center justify-between" style="background: linear-gradient(135deg, #89f7fe 0%, #66a6ff 100%);">
            <div>
                <h4 class="text-sm font-medium">Total Courses</h4>
                <p class="text-2xl font-bold mt-2">10</p>
            </div>
            <div class="text-4xl opacity-70">
                <i class="fas fa-book"></i>
            </div>
        </div>

        <!-- Total Exams -->
        <div class="card stat-card text-white p-6 rounded-lg shadow-lg flex items-center justify-between" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
            <div>
                <h4 class="text-sm font-medium">Total Exams</h4>
                <p class="text-2xl font-bold mt-2">8</p>
            </div>
            <div class="text-4xl opacity-70">
                <i class="fas fa-file-alt"></i>
            </div>
        </div>
    </div>
</div>
</body>
