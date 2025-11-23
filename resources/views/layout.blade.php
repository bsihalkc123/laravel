<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Student Management System</title>

  <!-- Bootstrap 4 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>

  <style>
    :root{
      --bg: #f3f4f6;
      --card: #fff;
      --text: #1f2937;
      --muted: #6b7280;
      --sidebar-bg: #111827;
      --sidebar-text: #cbd5e1;
      --accent: #0ea5e9;
      --glass: rgba(255,255,255,0.6);
    }
    [data-theme="dark"]{
      --bg: #0b1220;
      --card: #0f1724;
      --text: #e6eef6;
      --muted: #9aa7b8;
      --sidebar-bg: #020617;
      --sidebar-text: #9aa7b8;
      --accent: #3b82f6;
      --glass: rgba(255,255,255,0.04);
    }

    html,body{height:100%}
    body{
      background: var(--bg);
      color: var(--text);
      font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
      transition: background .25s ease, color .25s ease;
    }

    /* SIDEBAR */
    .app-shell{display:flex; min-height:100vh;}
    .sidebar{
      width:250px;
      background: linear-gradient(180deg,var(--sidebar-bg), #0b1220);
      color: var(--sidebar-text);
      transition: width .25s ease;
      overflow:hidden;
      box-shadow: 2px 0 8px rgba(0,0,0,0.06);
    }
    .sidebar.collapsed{width:72px;}
    .sidebar .brand{padding:18px; font-weight:700; font-size:18px; display:flex; align-items:center; gap:.5rem;}
    .sidebar .nav-link{
      color:var(--sidebar-text);
      padding:12px 18px;
      display:flex; align-items:center; gap:.8rem;
      border-left:4px solid transparent;
      transition: background .15s ease, color .15s ease, padding-left .15s ease;
    }
    .sidebar .nav-link:hover{background: rgba(255,255,255,0.02); color:#fff; padding-left:22px;}
    .sidebar .nav-link.active{background: linear-gradient(90deg,var(--accent), rgba(0,0,0,0)); color:#fff; border-left-color:var(--accent);}

    .sidebar i{font-size:18px; width:22px; text-align:center;}

    .content{
      flex:1;
      padding:20px;
      transition: margin-left .25s ease;
    }

    /* navbar */
    .topbar{
      display:flex; align-items:center; gap:12px;
      justify-content:space-between;
      background:var(--card);
      padding:10px 16px;
      border-radius:10px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.04);
      margin-bottom:18px;
    }

    /* cards */
    .card{background:var(--card); border:0; color:var(--text); border-radius:12px;}
    .stat-number{font-size:28px; font-weight:700;}
    .fade-in{animation:fadeInUp .4s ease both;}
    @keyframes fadeInUp{from{opacity:0; transform:translateY(8px)} to{opacity:1; transform:none}}

    /* counters */
    .counter{font-weight:700; font-size:24px;}

    /* small screens */
    @media (max-width: 768px){
      .sidebar{position:fixed; z-index:1000; height:100vh; left:-260px;}
      .sidebar.open{left:0;}
      .content{padding:12px;}
    }

    /* utility */
    .muted{color:var(--muted);}
    .btn-icon{display:inline-flex; align-items:center; gap:.5rem;}
    .profile-img{width:36px;height:36px;border-radius:50%; object-fit:cover; border:2px solid var(--glass);}
  </style>

</head>
<body>

<div class="app-shell">

  <!-- SIDEBAR -->
  <aside class="sidebar" id="sidebar">
    <div class="brand text-white pl-3">
      <i class="bi bi-mortarboard-fill"></i>
      <span class="brand-text d-none d-md-inline"> LMS Admin</span>
      <button class="btn btn-sm btn-link text-muted ml-auto d-md-none" id="mobileSidebarClose"><i class="bi bi-x-lg" style="font-size:1.1rem"></i></button>
    </div>

    <nav class="nav flex-column mt-2">
      <a href="{{ route('dashboard') }}" class="nav-link active"><i class="bi bi-speedometer2"></i><span class="d-none d-md-inline"> Dashboard</span></a>
      <a href="{{ route('students') }}" class="nav-link"><i class="bi bi-people"></i><span class="d-none d-md-inline"> Students</span></a>
      <a href="#" class="nav-link"><i class="bi bi-person-badge"></i><span class="d-none d-md-inline"> Teachers</span></a>
      <a href="#" class="nav-link"><i class="bi bi-journal-bookmark"></i><span class="d-none d-md-inline"> Courses</span></a>
      <a href="#" class="nav-link"><i class="bi bi-building"></i><span class="d-none d-md-inline"> Enrollment</span></a>
      <a href="#" class="nav-link"><i class="bi bi-cash-stack"></i><span class="d-none d-md-inline"> Payments</span></a>
      <a href="#" class="nav-link"><i class="bi bi-gear"></i><span class="d-none d-md-inline"> Settings</span></a>
    </nav>

    <div class="mt-auto p-3 d-none d-md-block">
      <small class="muted">Version 1.0</small>
    </div>
  </aside>

  <!-- CONTENT -->
  <main class="content">

    <!-- topbar -->
    <div class="topbar">
      <div class="d-flex align-items-center gap-2">
        <button class="btn btn-outline-secondary btn-sm d-md-none" id="mobileSidebarToggle"><i class="bi bi-list"></i></button>

        <button class="btn btn-outline-secondary btn-sm" id="collapseSidebar" title="Collapse sidebar"><i class="bi bi-chevron-left"></i></button>

        <div class="ml-2">
          <h4 class="mb-0">@yield('page-title', 'Dashboard')</h4>
          <small class="muted">@yield('page-sub', 'Overview & stats')</small>
        </div>
      </div>

      <div class="d-flex align-items-center gap-2">
        <!-- Dark mode toggle -->
        <div class="custom-control custom-switch mr-3">
          <input type="checkbox" class="custom-control-input" id="darkModeToggle">
          <label class="custom-control-label muted" for="darkModeToggle">Dark</label>
        </div>

        <!-- Quick add -->
        <div class="dropdown mr-2">
          <button class="btn btn-outline-primary btn-sm dropdown-toggle" data-toggle="dropdown"><i class="bi bi-plus-lg"></i> Add</button>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#" id="openAddStudent">Add Student</a>
            <a class="dropdown-item" href="#">Add Teacher</a>
            <a class="dropdown-item" href="#">Add Course</a>
          </div>
        </div>

        <!-- Profile dropdown -->
        <div class="dropdown">
          <a href="#" id="profileDropdown" data-toggle="dropdown" class="d-flex align-items-center text-decoration-none">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'User') }}&background=0ea5e9&color=fff" class="profile-img mr-2" alt="avatar">
            <div class="d-none d-md-block text-left">
              <div style="font-size:13px;font-weight:600">{{ Auth::user()->name ?? 'Admin' }}</div>
              <small class="muted">Administrator</small>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#">Profile</a>
            <a class="dropdown-item" href="#">Settings</a>
            <div class="dropdown-divider"></div>
            <form action="{{ route('logout') }}" method="POST" class="px-3">
              @csrf
              <button class="btn btn-danger btn-sm btn-block" type="submit"><i class="bi bi-box-arrow-right"></i> Logout</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- main content area -->
    <div id="mainArea">
      @yield('content')
    </div>

    <!-- Add Student Modal (reusable) -->
    <div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <form id="addStudentForm">
            <div class="modal-header">
              <h5 class="modal-title">Add Student</h5>
              <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
              <div class="form-group"><label>Name</label><input name="name" class="form-control" required></div>
              <div class="form-group"><label>Course</label><input name="course" class="form-control"></div>
              <div class="form-group"><label>Enrollment Date</label><input name="date" type="date" class="form-control"></div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button>
              <button class="btn btn-primary" type="submit">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </main>
</div>

<!-- scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

<script>
  // --- UI STATE (persist theme + sidebar) ---
  (function(){
    const root = document.documentElement;
    const body = document.querySelector('html');
    const toggle = document.getElementById('darkModeToggle');
    const collapseBtn = document.getElementById('collapseSidebar');
    const sidebar = document.getElementById('sidebar');
    const mobileToggle = document.getElementById('mobileSidebarToggle');
    const mobileClose = document.getElementById('mobileSidebarClose');

    // theme
    const savedTheme = localStorage.getItem('s_theme') || 'light';
    document.documentElement.setAttribute('data-theme', savedTheme);
    toggle.checked = savedTheme === 'dark';

    toggle.addEventListener('change', () => {
      const theme = toggle.checked ? 'dark' : 'light';
      document.documentElement.setAttribute('data-theme', theme);
      localStorage.setItem('s_theme', theme);
    });

    // collapse
    const savedCollapse = localStorage.getItem('s_collapsed') === 'true';
    if(savedCollapse) sidebar.classList.add('collapsed');

    collapseBtn.addEventListener('click', () => {
      sidebar.classList.toggle('collapsed');
      localStorage.setItem('s_collapsed', sidebar.classList.contains('collapsed'));
      // rotate icon
      collapseBtn.querySelector('i').classList.toggle('bi-chevron-left');
      collapseBtn.querySelector('i').classList.toggle('bi-chevron-right');
    });

    // mobile
    mobileToggle && mobileToggle.addEventListener('click', ()=> sidebar.classList.toggle('open'));
    mobileClose && mobileClose.addEventListener('click', ()=> sidebar.classList.remove('open'));

    // quick add opens modal
    document.getElementById('openAddStudent')?.addEventListener('click', (e)=>{
      e.preventDefault();
      $('#addStudentModal').modal('show');
    });

    // Add student form (demo) - replace with AJAX POST to your backend
    document.getElementById('addStudentForm')?.addEventListener('submit', function(e){
      e.preventDefault();
      const data = new FormData(this);
      // demo: just show success and close
      $('#addStudentModal').modal('hide');
      alert('Student "' + (data.get('name')||'') + '" added (demo). Hook this to backend.');
      this.reset();
    });

  })();

  // --- small helper: animate counters ---
  function animateCounter(el, endVal, duration=1200){
    const start = 0;
    const range = endVal - start;
    const stepTime = Math.max(Math.floor(duration / endVal), 20);
    let current = start;
    const timer = setInterval(()=> {
      current += Math.ceil(range / (duration/stepTime));
      if(current >= endVal){
        el.innerText = endVal.toLocaleString();
        clearInterval(timer);
      } else {
        el.innerText = current.toLocaleString();
      }
    }, stepTime);
  }

  // When DOM ready, animate counters and initialize any page charts via custom event
  document.addEventListener('DOMContentLoaded', function(){
    document.querySelectorAll('.js-counter').forEach((el)=>{
      const val = parseInt(el.dataset.value || '0', 10);
      animateCounter(el, val);
    });

    // allow pages to initialize charts
    document.dispatchEvent(new Event('init-charts'));
  });

</script>

@stack('scripts')

</body>
</html>
