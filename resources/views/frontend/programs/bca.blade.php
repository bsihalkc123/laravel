@extends('frontend.app')

@section('title', 'BCA Program')

@section('content')

<div style="max-width:1000px; margin:3rem auto; padding:0 20px;">

    <!-- PAGE TITLE & DESCRIPTION -->
    <h1 style="text-align:center; color:#004080; margin-bottom:1rem; font-size:2.2rem;">
        Bachelor of Computer Applications (BCA)
    </h1>

    <p style="font-size:1rem; line-height:1.7; color:#333;">
        The Bachelor of Computer Applications (BCA) is a four-year undergraduate program that 
        provides in-depth knowledge of computer programming, software development, databases, 
        networking, and IT systems. It is one of the most in demand IT courses in Nepal.
    </p>

    <!-- SEMESTER-WISE SYLLABUS -->
    <h2 style="margin-top:2rem; color:#004080; text-align:center; margin-bottom:2rem;">
        BCA Semester-wise Syllabus
    </h2>

    @php
    $semesters = [
        1 => [
            ['code'=>'CACS101','subject'=>'Computer Fundamentals & Applications','credits'=>3],
            ['code'=>'CAEN101','subject'=>'English I','credits'=>3],
            ['code'=>'CAMT101','subject'=>'Mathematics I','credits'=>3],
            ['code'=>'CASO101','subject'=>'Society and Technology','credits'=>3],
            ['code'=>'CAPR101','subject'=>'Programming in C','credits'=>3],
            ['code'=>'CAPR102','subject'=>'C Programming Lab','credits'=>1.5],
        ],
        2 => [
            ['code'=>'CACS102','subject'=>'Discrete Mathematics','credits'=>3],
            ['code'=>'CAEN102','subject'=>'English II','credits'=>3],
            ['code'=>'CAMT102','subject'=>'Mathematics II','credits'=>3],
            ['code'=>'CAPR103','subject'=>'Data Structures and Algorithms','credits'=>3],
            ['code'=>'CAPR104','subject'=>'Data Structures and Algorithms Lab','credits'=>1.5],
            ['code'=>'CAAC101','subject'=>'Accounting for IT','credits'=>3],
        ],
        3 => [
            ['code'=>'CAWD201','subject'=>'Web Technology','credits'=>3],
            ['code'=>'CAWD202','subject'=>'Web Technology Lab','credits'=>1.5],
            ['code'=>'CASM201','subject'=>'Statistics I','credits'=>3],
            ['code'=>'CAPR201','subject'=>'Java Programming','credits'=>3],
            ['code'=>'CAPR202','subject'=>'Java Programming Lab','credits'=>1.5],
            ['code'=>'CAOB201','subject'=>'Organizational Behavior','credits'=>3],
        ],
        4 => [
            ['code'=>'CASM202','subject'=>'Statistics II','credits'=>3],
            ['code'=>'CADB301','subject'=>'Database Management System','credits'=>3],
            ['code'=>'CADB302','subject'=>'DBMS Lab','credits'=>1.5],
            ['code'=>'CAPR301','subject'=>'Object-Oriented Programming','credits'=>3],
            ['code'=>'CAPR302','subject'=>'OOP Lab','credits'=>1.5],
            ['code'=>'CANM301','subject'=>'Numerical Methods','credits'=>3],
        ],
        5 => [
            ['code'=>'CANW301','subject'=>'Computer Networking','credits'=>3],
            ['code'=>'CANW302','subject'=>'Networking Lab','credits'=>1.5],
            ['code'=>'CASE301','subject'=>'Software Engineering','credits'=>3],
            ['code'=>'CASY301','subject'=>'Operating System','credits'=>3],
            ['code'=>'CASEP01','subject'=>'Project Work I (Minor Project)','credits'=>3],
        ],
        6 => [
            ['code'=>'CAMG301','subject'=>'Mobile Application Development','credits'=>3],
            ['code'=>'CAMG302','subject'=>'Mobile App Development Lab','credits'=>1.5],
            ['code'=>'CAWT301','subject'=>'Web Development using PHP','credits'=>3],
            ['code'=>'CAWT302','subject'=>'PHP Lab','credits'=>1.5],
            ['code'=>'CAPR401','subject'=>'Dot Net Technology','credits'=>3],
            ['code'=>'CAPR402','subject'=>'Dot Net Lab','credits'=>1.5],
        ],
        7 => [
            ['code'=>'CASE401','subject'=>'Cyber Law and Professional Ethics','credits'=>3],
            ['code'=>'CACS401','subject'=>'Cloud Computing','credits'=>3],
            ['code'=>'CACS402','subject'=>'Artificial Intelligence','credits'=>3],
            ['code'=>'CASEP02','subject'=>'Project Work II (Major Project)','credits'=>3],
        ],
        8 => [
            ['code'=>'CASEP03','subject'=>'Internship/Field Work','credits'=>3],
            ['code'=>'CACS403','subject'=>'Multimedia System','credits'=>3],
            ['code'=>'CACS404','subject'=>'IT in Banking','credits'=>3],
            ['code'=>'CAPR403','subject'=>'Elective Course (Choose One)','credits'=>3],
        ],
    ];
    @endphp

    @foreach($semesters as $sem => $subjects)
    <div style="margin-bottom:2rem; background:white; padding:20px; border-radius:12px; box-shadow:0 6px 15px rgba(0,0,0,0.1);">
        <h3 style="color:#0066cc; margin-bottom:15px;">Semester {{ $sem }}</h3>
        <table style="width:100%; border-collapse:collapse;">
            <thead>
                <tr style="background:#f0f4f8;">
                    <th style="padding:10px; border-bottom:2px solid #ccc;">#</th>
                    <th style="padding:10px; border-bottom:2px solid #ccc;">Code</th>
                    <th style="padding:10px; border-bottom:2px solid #ccc;">Subject Name</th>
                    <th style="padding:10px; border-bottom:2px solid #ccc;">Credit Hours</th>
                </tr>
            </thead>
            <tbody>
                @php $totalCredits = 0; $i=1; @endphp
                @foreach($subjects as $sub)
                <tr>
                    <td style="padding:8px 10px; border-bottom:1px solid #eee; text-align:center;">{{ $i }}</td>
                    <td style="padding:8px 10px; border-bottom:1px solid #eee;">{{ $sub['code'] }}</td>
                    <td style="padding:8px 10px; border-bottom:1px solid #eee;">{{ $sub['subject'] }}</td>
                    <td style="padding:8px 10px; border-bottom:1px solid #eee; text-align:center;">{{ $sub['credits'] }}</td>
                </tr>
                @php $totalCredits += $sub['credits']; $i++; @endphp
                @endforeach
                <tr>
                    <td colspan="3" style="padding:8px 10px; font-weight:700; text-align:right;">Total Credit Hours:</td>
                    <td style="padding:8px 10px; text-align:center; font-weight:700;">{{ $totalCredits }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    @endforeach

 <!-- ENTRY REQUIREMENTS & FEE STRUCTURE -->
    <div style="margin-top:3rem; background:#f0f4f8; padding:30px; border-radius:12px; box-shadow:0 6px 15px rgba(0,0,0,0.1);">

        <h2 style="color:#004080; margin-bottom:1.5rem; text-align:center;">Entry Requirements</h2>

        <p style="font-size:1.05rem; line-height:1.7; color:#333;">
            <strong>Academic Requirements for BCA:</strong><br>
            - 10+2 or equivalent in any discipline with minimum of 45% or equivalent in aggregate from a recognized board.<br>
            - Applicants must pass the entrance examination conducted by the college.
        </p>

        <h2 style="color:#004080; margin-top:2.5rem; margin-bottom:1.5rem; text-align:center;">Fee Structure & Scholarships</h2>

        <div style="display:flex; flex-wrap:wrap; gap:20px; justify-content:center; text-align:center;">

            <div style="background:white; flex:1 1 300px; padding:25px; border-radius:12px; box-shadow:0 6px 15px rgba(0,0,0,0.1);">
                <h3 style="color:#0066cc; margin-bottom:10px;">Total Fee including Admission</h3>
                <p style="font-size:1.2rem; font-weight:600; color:#004080;">NRs. 7,50,000</p>
            </div>

            <div style="background:white; flex:1 1 300px; padding:25px; border-radius:12px; box-shadow:0 6px 15px rgba(0,0,0,0.1);">
                <h3 style="color:#0066cc; margin-bottom:10px;">Scholarships</h3>
                <ul style="list-style:disc; text-align:left; margin-left:20px; line-height:1.7; color:#333;">
                    <li>Merit Scholarship: 10% of occupied quota as per the rules of TU</li>
                    <li>Discounts available as per the grade of NEB</li>
                </ul>
            </div>

        </div>

    </div>


    <!-- APPLY NOW BUTTON -->
    <div style="margin-top:2rem; text-align:center;">
        <a href="#" 
           style="padding:12px 25px; background:#ffcc00; color:#004080; text-decoration:none; font-weight:700; border-radius:8px; transition:0.3s;"
           onmouseover="this.style.background='#e6b800'"
           onmouseout="this.style.background='#ffcc00'">
            Apply Now
        </a>
    </div>

</div>

@endsection
