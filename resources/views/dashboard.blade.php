{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student Management System</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<style>
/* The side navigation menu */
.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

/* Sidebar links */
.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}

/* Active/current link */
.sidebar a.active {
  background-color: #04AA6D;
  color: white;
}

/* Links on mouse-over */
.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  min-height: 100vh;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>
</head>

<body>

<div class="container-fluid p-0">
  <!-- TOP NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><h2>Student Management System</h2></a>

    <!-- Logout Button -->
    <div class="ml-auto">
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn btn-danger">Logout</button>
      </form>
    </div>
  </nav>
  
  <div class="row no-gutters">
    <!-- Sidebar -->
    <div class="col-md-3">
      <div class="sidebar">
        <a class="active" href="#home">Home</a>
        <a href="#Student">Student</a>
        <a href="#Teacher">Teacher</a>
        <a href="#courses">Courses</a>
        <a href="#Enrollment">Enrollment</a>
        <a href="#payment">Payment</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>
      </div>
    </div>

    <!-- Page Content -->
    <div class="col-md-9">
      <div class="content">
        @yield('content')
      </div>
    </div>
  </div>
</div>

</body>
</html> --}}
@extends('layout')

@section('page-title','Dashboard')
@section('page-sub','Overview & stats')

@section('content')
<div class="container-fluid">

  <!-- top stats -->
  <div class="row">
    <div class="col-sm-6 col-md-3 mb-3 fade-in">
      <div class="card p-3">
        <div class="d-flex justify-content-between">
          <div>
            <small class="muted">Total Students</small>
            <div class="counter js-counter" data-value="1245">0</div>
            <small class="text-success">↑ 12% this month</small>
          </div>
          <div><i class="bi bi-people" style="font-size:28px;color:var(--accent)"></i></div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-md-3 mb-3 fade-in">
      <div class="card p-3">
        <div class="d-flex justify-content-between">
          <div>
            <small class="muted">Total Teachers</small>
            <div class="counter js-counter" data-value="89">0</div>
            <small class="muted">+3 new</small>
          </div>
          <div><i class="bi bi-person-badge" style="font-size:28px;color:#10b981"></i></div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-md-3 mb-3 fade-in">
      <div class="card p-3">
        <div class="d-flex justify-content-between">
          <div>
            <small class="muted">Courses</small>
            <div class="counter js-counter" data-value="56">0</div>
            <small class="muted">Updated</small>
          </div>
          <div><i class="bi bi-journal-bookmark" style="font-size:28px;color:#f59e0b"></i></div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-md-3 mb-3 fade-in">
      <div class="card p-3">
        <div class="d-flex justify-content-between">
          <div>
            <small class="muted">Monthly Revenue</small>
            <div class="counter js-counter" data-value="98500">0</div>
            <small class="text-success">↑ 8.6%</small>
          </div>
          <div><i class="bi bi-cash-stack" style="font-size:28px;color:#ef4444"></i></div>
        </div>
      </div>
    </div>
  </div>

  <!-- Chart + quick -->
  <div class="row">
    <div class="col-md-8 mb-3 fade-in">
      <div class="card">
        <div class="card-body">
          <h5>Enrollment Analytics</h5>
          <canvas id="enrollmentChart" height="120"></canvas>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-3 fade-in">
      <div class="card p-3">
        <h6>Quick Actions</h6>
        <p class="muted">Common admin tasks</p>
        <div class="d-flex flex-column">
          <a href="#" class="btn btn-primary btn-block mb-2" id="actionAddStudent">➕ Add Student</a>
          <a href="#" class="btn btn-success btn-block mb-2">➕ Add Teacher</a>
          <a href="#" class="btn btn-warning btn-block mb-2">📚 Manage Courses</a>
          <a href="#" class="btn btn-info btn-block">💳 View Payments</a>
        </div>
      </div>
    </div>
  </div>

  <!-- recent students table -->
  <div class="row">
    <div class="col-12 fade-in">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Recent Registrations</h5>
          <a href="{{ route('students') }}" class="btn btn-outline-primary btn-sm">View all students</a>
        </div>
        <div class="card-body p-0">
          <table class="table table-hover mb-0">
            <thead><tr><th>Name</th><th>Course</th><th>Date</th><th>Status</th></tr></thead>
            <tbody>
              <tr><td>Ram Thapa</td><td>BCA</td><td>2025-11-20</td><td><span class="badge badge-success">Active</span></td></tr>
              <tr><td>Sita Sharma</td><td>CSIT</td><td>2025-11-19</td><td><span class="badge badge-warning">Pending</span></td></tr>
              <tr><td>Anita BK</td><td>BIM</td><td>2025-11-18</td><td><span class="badge badge-danger">Suspended</span></td></tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>

@push('scripts')
<script>
  // Chart initialization after 'init-charts' event
  document.addEventListener('init-charts', function(){
    const ctx = document.getElementById('enrollmentChart').getContext('2d');
    const enrollmentChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['July','Aug','Sep','Oct','Nov','Dec'],
        datasets: [{
          label: 'Enrollments',
          data: [50, 80, 60, 100, 120, 150],
          tension: 0.4,
          borderWidth: 2,
          fill: true,
          backgroundColor: (ctx) => {
            const g = ctx.chart.ctx.createLinearGradient(0,0,0,200);
            g.addColorStop(0, 'rgba(14,165,233,0.25)');
            g.addColorStop(1, 'rgba(14,165,233,0)');
            return g;
          },
          borderColor: '#0ea5e9',
          pointRadius: 4,
        }]
      },
      options: {
        responsive: true,
        plugins:{legend:{display:false}},
        scales:{
          y:{beginAtZero:true, ticks:{precision:0}}
        }
      }
    });
  });

  // quick action triggers
  document.getElementById('actionAddStudent')?.addEventListener('click', (e)=>{
    e.preventDefault(); $('#addStudentModal').modal('show');
  });
</script>
@endpush

@endsection
