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
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

  <!-- Main Content Body -->
  <div class="p-6 min-h-screen bg-gradient-to-r from-black via-gray-600 to-black">

      <!-- Stats Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-6">
          <!-- Total Students -->
          <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white p-6 rounded-xl shadow-xl transform hover:scale-105 transition duration-300 flex items-center justify-between">
              <div>
                  <h4 class="text-sm font-semibold uppercase tracking-wide">Total Students</h4>
                  <p class="text-3xl font-bold mt-2">42</p>
              </div>
              <div class="text-5xl opacity-80">
                  <i class="fas fa-user-graduate"></i>
              </div>
          </div>

          <!-- Total Teachers -->
          <div class="bg-gradient-to-r from-yellow-400 via-red-400 to-pink-500 text-white p-6 rounded-xl shadow-xl transform hover:scale-105 transition duration-300 flex items-center justify-between">
              <div>
                  <h4 class="text-sm font-semibold uppercase tracking-wide">Total Teachers</h4>
                  <p class="text-3xl font-bold mt-2">12</p>
              </div>
              <div class="text-5xl opacity-80">
                  <i class="fas fa-chalkboard-teacher"></i>
              </div>
          </div>

          <!-- Total Courses -->
          <div class="bg-gradient-to-r from-teal-400 to-blue-500 text-white p-6 rounded-xl shadow-xl transform hover:scale-105 transition duration-300 flex items-center justify-between">
              <div>
                  <h4 class="text-sm font-semibold uppercase tracking-wide">Total Courses</h4>
                  <p class="text-3xl font-bold mt-2">10</p>
              </div>
              <div class="text-5xl opacity-80">
                  <i class="fas fa-book"></i>
              </div>
          </div>

          <!-- Total Exams -->
          <div class="bg-gradient-to-r from-pink-400 to-red-500 text-white p-6 rounded-xl shadow-xl transform hover:scale-105 transition duration-300 flex items-center justify-between">
              <div>
                  <h4 class="text-sm font-semibold uppercase tracking-wide">Total Exams</h4>
                  <p class="text-3xl font-bold mt-2">8</p>
              </div>
              <div class="text-5xl opacity-80">
                  <i class="fas fa-file-alt"></i>
              </div>
          </div>
      </div>

      <!-- Notifications -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
          <div class="bg-white p-4 rounded-xl shadow hover:shadow-2xl transition duration-300 flex items-center gap-4">
              <div class="bg-blue-100 text-blue-600 p-3 rounded-full">
                  <i class="fas fa-envelope"></i>
              </div>
              <div>
                  <p class="font-semibold">New Messages</p>
                  <p class="text-sm text-gray-500">You have 7 unread messages</p>
              </div>
          </div>

          <div class="bg-white p-4 rounded-xl shadow hover:shadow-2xl transition duration-300 flex items-center gap-4">
              <div class="bg-green-100 text-green-600 p-3 rounded-full">
                  <i class="fas fa-check-circle"></i>
              </div>
              <div>
                  <p class="font-semibold">Attendance</p>
                  <p class="text-sm text-gray-500">85% students present today</p>
              </div>
          </div>

          <div class="bg-white p-4 rounded-xl shadow hover:shadow-2xl transition duration-300 flex items-center gap-4">
              <div class="bg-yellow-100 text-yellow-600 p-3 rounded-full">
                  <i class="fas fa-wallet"></i>
              </div>
              <div>
                  <p class="font-semibold">Pending Fees</p>
                  <p class="text-sm text-gray-500">$1,240 pending payments</p>
              </div>
          </div>
      </div>

      <!-- Charts Section -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
          <!-- Student Enrollment Chart -->
          <div class="bg-white p-6 rounded-xl shadow-lg">
              <h4 class="text-lg font-semibold mb-4">Student Enrollment Over Months</h4>
              <canvas id="enrollmentChart" class="w-full h-64"></canvas>
          </div>

          <!-- Exams Performance Chart -->
          <div class="bg-white p-6 rounded-xl shadow-lg">
              <h4 class="text-lg font-semibold mb-4">Exams Performance</h4>
              <canvas id="examChart" class="w-full h-64"></canvas>
          </div>
      </div>

      <!-- Progress Bars Section -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
          <div class="bg-white p-6 rounded-xl shadow-lg">
              <h4 class="text-lg font-semibold mb-3">Attendance Progress</h4>
              <div class="w-full bg-gray-200 rounded-full h-4 mb-2">
                  <div class="bg-green-500 h-4 rounded-full" style="width: 85%;"></div>
              </div>
              <p class="text-sm text-gray-600">85% Attendance this month</p>
          </div>

          <div class="bg-white p-6 rounded-xl shadow-lg">
              <h4 class="text-lg font-semibold mb-3">Course Completion</h4>
              <div class="w-full bg-gray-200 rounded-full h-4 mb-2">
                  <div class="bg-blue-500 h-4 rounded-full" style="width: 60%;"></div>
              </div>
              <p class="text-sm text-gray-600">60% Courses Completed</p>
          </div>

          <div class="bg-white p-6 rounded-xl shadow-lg">
              <h4 class="text-lg font-semibold mb-3">Fee Collection</h4>
              <div class="w-full bg-gray-200 rounded-full h-4 mb-2">
                  <div class="bg-yellow-500 h-4 rounded-full" style="width: 75%;"></div>
              </div>
              <p class="text-sm text-gray-600">75% Fees Collected</p>
          </div>
      </div>

      <!-- Latest Students & Upcoming Exams Tables -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
          <!-- Latest Students Table -->
          <div class="bg-white p-6 rounded-xl shadow-lg overflow-x-auto">
              <h4 class="text-lg font-semibold mb-4">Latest Students</h4>
              <table class="w-full text-left text-gray-700">
                  <thead class="bg-gray-100">
                      <tr>
                          <th class="py-2 px-3">ID</th>
                          <th class="py-2 px-3">Name</th>
                          <th class="py-2 px-3">Course</th>
                          <th class="py-2 px-3">Enrolled</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr class="border-b hover:bg-gray-50">
                          <td class="py-2 px-3">1</td>
                          <td class="py-2 px-3">John Doe</td>
                          <td class="py-2 px-3">Math</td>
                          <td class="py-2 px-3">2025-11-01</td>
                      </tr>
                      <tr class="border-b hover:bg-gray-50">
                          <td class="py-2 px-3">2</td>
                          <td class="py-2 px-3">Jane Smith</td>
                          <td class="py-2 px-3">Science</td>
                          <td class="py-2 px-3">2025-11-03</td>
                      </tr>
                      <tr class="border-b hover:bg-gray-50">
                          <td class="py-2 px-3">3</td>
                          <td class="py-2 px-3">Alex Johnson</td>
                          <td class="py-2 px-3">English</td>
                          <td class="py-2 px-3">2025-11-05</td>
                      </tr>
                  </tbody>
              </table>
          </div>

          <!-- Upcoming Exams Table -->
          <div class="bg-white p-6 rounded-xl shadow-lg overflow-x-auto">
              <h4 class="text-lg font-semibold mb-4">Upcoming Exams</h4>
              <table class="w-full text-left text-gray-700">
                  <thead class="bg-gray-100">
                      <tr>
                          <th class="py-2 px-3">Exam</th>
                          <th class="py-2 px-3">Course</th>
                          <th class="py-2 px-3">Date</th>
                          <th class="py-2 px-3">Status</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr class="border-b hover:bg-gray-50">
                          <td class="py-2 px-3">Mid Term</td>
                          <td class="py-2 px-3">Math</td>
                          <td class="py-2 px-3">2025-12-01</td>
                          <td class="py-2 px-3"><span class="text-yellow-600 font-semibold">Pending</span></td>
                      </tr>
                      <tr class="border-b hover:bg-gray-50">
                          <td class="py-2 px-3">Final Exam</td>
                          <td class="py-2 px-3">Science</td>
                          <td class="py-2 px-3">2025-12-10</td>
                          <td class="py-2 px-3"><span class="text-red-600 font-semibold">Scheduled</span></td>
                      </tr>
                      <tr class="border-b hover:bg-gray-50">
                          <td class="py-2 px-3">Quiz</td>
                          <td class="py-2 px-3">English</td>
                          <td class="py-2 px-3">2025-11-30</td>
                          <td class="py-2 px-3"><span class="text-green-600 font-semibold">Upcoming</span></td>
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>

     <!-- Interactive Calendar Widget -->
<div class="bg-white p-6 rounded-xl shadow-lg mb-6 w-full md:w-1/3">
    <h4 class="text-lg font-semibold mb-4">Calendar</h4>
    <div class="flex justify-between items-center mb-4">
        <button id="prevMonth" class="text-gray-600 hover:text-gray-900">&lt;</button>
        <h5 id="monthYear" class="font-semibold text-gray-700"></h5>
        <button id="nextMonth" class="text-gray-600 hover:text-gray-900">&gt;</button>
    </div>

    <div class="grid grid-cols-7 gap-2 text-center mb-2 font-semibold text-gray-700">
        <div>Sun</div><div>Mon</div><div>Tue</div><div>Wed</div><div>Thu</div><div>Fri</div><div>Sat</div>
    </div>

    <div id="calendarDays" class="grid grid-cols-7 gap-2 text-center"></div>
</div>

<script>
const calendarDays = document.getElementById('calendarDays');
const monthYear = document.getElementById('monthYear');
const prevMonthBtn = document.getElementById('prevMonth');
const nextMonthBtn = document.getElementById('nextMonth');

// Example exam dates
const exams = {
    "2025-12-01": "Math Mid Term",
    "2025-12-10": "Science Final Exam",
    "2025-11-30": "English Quiz"
};

let currentDate = new Date();

function renderCalendar(date) {
    calendarDays.innerHTML = "";
    const year = date.getFullYear();
    const month = date.getMonth();
    monthYear.textContent = date.toLocaleString('default', { month: 'long', year: 'numeric' });

    const firstDay = new Date(year, month, 1).getDay();
    const lastDate = new Date(year, month + 1, 0).getDate();

    // Empty slots before first day
    for(let i = 0; i < firstDay; i++) {
        const emptyCell = document.createElement('div');
        calendarDays.appendChild(emptyCell);
    }

    // Days of month
    for(let day = 1; day <= lastDate; day++) {
        const dayCell = document.createElement('div');
        const fullDate = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2,'0')}`;

        dayCell.textContent = day;
        dayCell.classList.add("py-2", "rounded-full", "cursor-pointer", "hover:bg-gray-200");

        // Highlight today's date
        const today = new Date();
        if(day === today.getDate() && month === today.getMonth() && year === today.getFullYear()) {
            dayCell.classList.add("bg-blue-500", "text-white");
        }

        // Highlight exam dates
        if(exams[fullDate]) {
            dayCell.classList.add("bg-red-400", "text-white", "font-semibold");
            dayCell.title = exams[fullDate]; // Show exam name on hover
        }

        // Click to alert exam details
        dayCell.addEventListener('click', () => {
            if(exams[fullDate]){
                alert(`Exam: ${exams[fullDate]}\nDate: ${fullDate}`);
            } else {
                alert(`No event on ${fullDate}`);
            }
        });

        calendarDays.appendChild(dayCell);
    }
}

// Navigation buttons
prevMonthBtn.addEventListener('click', () => {
    currentDate.setMonth(currentDate.getMonth() - 1);
    renderCalendar(currentDate);
});
nextMonthBtn.addEventListener('click', () => {
    currentDate.setMonth(currentDate.getMonth() + 1);
    renderCalendar(currentDate);
});

// Initial render
renderCalendar(currentDate);
</script>

  <!-- Chart.js Script -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
      const enrollmentCtx = document.getElementById('enrollmentChart').getContext('2d');
      new Chart(enrollmentCtx, {
          type: 'line',
          data: {
              labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
              datasets: [{
                  label: 'Students',
                  data: [20, 25, 30, 28, 35, 40, 42, 42],
                  backgroundColor: 'rgba(59, 130, 246, 0.2)',
                  borderColor: 'rgba(59, 130, 246, 1)',
                  borderWidth: 2,
                  fill: true,
                  tension: 0.3
              }]
          },
          options: {
              responsive: true,
              plugins: { legend: { display: false } },
              scales: { y: { beginAtZero: true } }
          }
      });

      const examCtx = document.getElementById('examChart').getContext('2d');
      new Chart(examCtx, {
          type: 'bar',
          data: {
              labels: ['Math', 'Science', 'English', 'History', 'Art'],
              datasets: [{
                  label: 'Average Marks',
                  data: [75, 88, 92, 70, 80],
                  backgroundColor: [
                      '#f87171', '#60a5fa', '#34d399', '#fbbf24', '#a78bfa'
                  ],
                  borderRadius: 5,
                  barThickness: 30
              }]
          },
          options: {
              responsive: true,
              plugins: { legend: { display: false } },
              scales: { y: { beginAtZero: true, max: 100 } }
          }
      });
  </script>

</body>

