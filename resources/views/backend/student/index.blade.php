@extends ('backend.master')
@section('content')
<table class="min-w-full border border-gray-300">
    <thead style="background-color: #f2f2f2;" >
        <tr>
            <th>S.N.</th>
            <th>Name</th>
            <th>Address</th>
            <th>Date of Birth</th>
            <th>Course</th>
            <th>Enrollment Date</th>
            <th>Phone Number</th>
            <th>Semester</th>

        </tr>
    </thead>

    <tbody>
        @foreach ($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->address }}</td>
            <td>{{ $student->date_of_birth}}</td>
            <td>{{ $student->course }}</td>
            <td>{{ $student->enrollment_date }}</td>    
            <td>{{ $student->phone_number }}</td>
            <td>{{ $student->semester }}</td>

        </tr>
        @endforeach
        
    </tbody>

    <tfoot>
        <tr>
            <td colspan="4">Total: 2 users</td>
        </tr>
    </tfoot>
</table>
@endsection