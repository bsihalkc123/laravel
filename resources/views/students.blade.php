@extends('layout')

@section('page-title','Students')
@section('page-sub','Search, filter & manage students')

@section('content')
<div class="container-fluid">
  <div class="card mb-3">
    <div class="card-body d-flex flex-wrap align-items-center gap-2">
      <div class="flex-grow-1">
        <input id="studentSearch" class="form-control" placeholder="Search students by name, course...">
      </div>

      <select id="filterStatus" class="form-control w-auto">
        <option value="">All Status</option>
        <option>Active</option>
        <option>Pending</option>
        <option>Suspended</option>
      </select>

      <button class="btn btn-primary" id="openAddFromList">+ Add Student</button>
    </div>
  </div>

  <div class="card">
    <div class="card-body p-0">
      <table class="table mb-0" id="studentsTable">
        <thead>
          <tr>
            <th>Name</th>
            <th>Course</th>
            <th>Date</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Ram Thapa</td><td>BCA</td><td>2025-11-20</td>
            <td><span class="badge badge-success">Active</span></td>
            <td><button class="btn btn-sm btn-outline-secondary editRow">Edit</button></td>
          </tr>

          <tr>
            <td>Sita Sharma</td><td>CSIT</td><td>2025-11-19</td>
            <td><span class="badge badge-warning">Pending</span></td>
            <td><button class="btn btn-sm btn-outline-secondary editRow">Edit</button></td>
          </tr>

          <tr>
            <td>Anita BK</td><td>BIM</td><td>2025-11-18</td>
            <td><span class="badge badge-danger">Suspended</span></td>
            <td><button class="btn btn-sm btn-outline-secondary editRow">Edit</button></td>
          </tr>
        </tbody>

      </table>
    </div>
  </div>
</div>
@endsection

{{-- PUSH SCRIPTS ALWAYS AFTER SECTION --}}
@push('scripts')
<script>
  (function(){
    const rows = Array.from(document.querySelectorAll('#studentsTable tbody tr'));
    const search = document.getElementById('studentSearch');
    const status = document.getElementById('filterStatus');

    function filter(){
      const q = (search.value || '').toLowerCase();
      const s = (status.value || '').toLowerCase();
      rows.forEach(r=>{
        const text = r.innerText.toLowerCase();
        const matchesQ = q === '' || text.includes(q);
        const matchesS = s === '' || text.includes(s);
        r.style.display = (matchesQ && matchesS) ? '' : 'none';
      });
    }
    search.addEventListener('input', filter);
    status.addEventListener('change', filter);

    // open add modal
    document.getElementById('openAddFromList')?.addEventListener('click', (e)=>{
      e.preventDefault();
      $('#addStudentModal').modal('show');
    });

    // edit row demo
    document.querySelectorAll('.editRow').forEach(btn=>{
      btn.addEventListener('click', (e)=>{
        const tr = e.target.closest('tr');
        const name = tr.children[0].innerText;
        const course = tr.children[1].innerText;
        const date = tr.children[2].innerText;

        $('#addStudentModal').modal('show');
        const form = document.getElementById('addStudentForm');
        form.name.value = name;
        form.course.value = course;
        form.date.value = date;
      });
    });

  })();
</script>
@endpush
@extends('layout')