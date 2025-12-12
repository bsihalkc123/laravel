@extends('frontend.app')

@section('title', 'BSC CSIT Program')

@section('content')

<div style="max-width:1200px; margin:3rem auto; padding:0 20px;">

    <!-- PAGE TITLE -->
    <h1 style="text-align:center; color:#004080; margin-bottom:2rem; font-size:2.2rem;">
        Bachelor of Science in Computer Science & IT (BSC CSIT)
    </h1>
    <!-- PROGRAM DESCRIPTION -->

    <p style="font-size:1rem; line-height:1.7; color:#333;">
        BSC CSIT is a four-year undergraduate program designed to provide students with advanced knowledge 
        in computer science, programming, networking, cybersecurity, and data analytics. It equips students 
        for careers in IT, software engineering, and system administration.
    </p>

    <!-- SEMESTERS -->
    <h2 style="margin-top:2.5rem; color:#004080; text-align:center; margin-bottom:2rem;">CSIT Semester-wise Syllabus</h2>

    @php
    $semesters = [
        1 => [
            ['code'=>'CSC109','subject'=>'Introduction to Information Technology','credits'=>3,'marks'=>100],
            ['code'=>'CSC110','subject'=>'C Programming','credits'=>3,'marks'=>100],
            ['code'=>'CSC111','subject'=>'Digital Logic','credits'=>3,'marks'=>100],
            ['code'=>'MTH112','subject'=>'Mathematics I','credits'=>3,'marks'=>100],
            ['code'=>'PHY113','subject'=>'Physics','credits'=>3,'marks'=>100],
        ],
        2 => [
            ['code'=>'CSC160','subject'=>'Discrete Structure','credits'=>3,'marks'=>100],
            ['code'=>'CSC161','subject'=>'Object-Oriented Programming','credits'=>3,'marks'=>100],
            ['code'=>'CSC162','subject'=>'Microprocessor','credits'=>3,'marks'=>100],
            ['code'=>'MTH163','subject'=>'Mathematics II','credits'=>3,'marks'=>100],
            ['code'=>'STA164','subject'=>'Statistics I','credits'=>3,'marks'=>100],
        ],
        3 => [
            ['code'=>'CSC206','subject'=>'Data Structure and Algorithm','credits'=>3,'marks'=>100],
            ['code'=>'CSC207','subject'=>'Numerical Method','credits'=>3,'marks'=>100],
            ['code'=>'CSC208','subject'=>'Computer Architecture','credits'=>3,'marks'=>100],
            ['code'=>'CSC209','subject'=>'Computer Graphics','credits'=>3,'marks'=>100],
            ['code'=>'STA210','subject'=>'Statistics II','credits'=>3,'marks'=>100],
        ],
        4 => [
            ['code'=>'CSC257','subject'=>'Theory of Computation','credits'=>3,'marks'=>100],
            ['code'=>'CSC258','subject'=>'Computer Networks','credits'=>3,'marks'=>100],
            ['code'=>'CSC259','subject'=>'Operating Systems','credits'=>3,'marks'=>100],
            ['code'=>'CSC260','subject'=>'Database Management System','credits'=>3,'marks'=>100],
            ['code'=>'CSC261','subject'=>'Artificial Intelligence','credits'=>3,'marks'=>100],
        ],
        5 => [
            ['code'=>'CSC314','subject'=>'Design and Analysis of Algorithms','credits'=>3,'marks'=>100],
            ['code'=>'CSC315','subject'=>'System Analysis and Design','credits'=>3,'marks'=>100],
            ['code'=>'CSC316','subject'=>'Cryptography','credits'=>3,'marks'=>100],
            ['code'=>'CSC317','subject'=>'Simulation and Modeling','credits'=>3,'marks'=>100],
            ['code'=>'CSC318','subject'=>'Web Technology','credits'=>3,'marks'=>100],
            ['code'=>'Elective I','subject'=>'Choose One','credits'=>3,'marks'=>100,'electives'=>[
                'Multimedia Computing (CSC319)',
                'Wireless Networking (CSC320)',
                'Image Processing (CSC321)',
                'Knowledge Management (CSC322)',
                'Society and Ethics in IT (CSC323)',
                'Microprocessor Based Design (CSC324)',
            ]],
        ],
        6 => [
            ['code'=>'CSC364','subject'=>'Software Engineering','credits'=>3,'marks'=>100],
            ['code'=>'CSC365','subject'=>'Compiler Design and Construction','credits'=>3,'marks'=>100],
            ['code'=>'CSC366','subject'=>'E-Governance','credits'=>3,'marks'=>100],
            ['code'=>'CSC367','subject'=>'.NET Centric Computing','credits'=>3,'marks'=>100],
            ['code'=>'CSC368','subject'=>'Technical Writing','credits'=>3,'marks'=>100],
            ['code'=>'Elective II','subject'=>'Choose One','credits'=>3,'marks'=>100,'electives'=>[
                'Applied Logic (CSC369)',
                'E-Commerce (CSC370)',
                'Automation and Robotics (CSC371)',
                'Neural Networks (CSC372)',
                'Computer Hardware Design (CSC373)',
                'Cognitive Science (CSC3474)',
            ]],
        ],
        7 => [
            ['code'=>'CSC409','subject'=>'Advanced Java Programming','credits'=>3,'marks'=>100],
            ['code'=>'CSC410','subject'=>'Data Warehousing & Data Mining','credits'=>3,'marks'=>100],
            ['code'=>'CSC411','subject'=>'Principles of Management','credits'=>3,'marks'=>100],
            ['code'=>'CSC412','subject'=>'Project Work','credits'=>3,'marks'=>100],
            ['code'=>'Elective III','subject'=>'Choose One','credits'=>3,'marks'=>100,'electives'=>[
                'Information Retrieval (CSC413)',
                'Database Administrator (CSC414)',
                'Software Project Management (CSC415)',
                'Network Security (CSC416)',
                'Digital System Design (CSC417)',
                'International Marketing (MGT418)',
            ]],
        ],
        8 => [
            ['code'=>'CSC461','subject'=>'Advanced Database','credits'=>3,'marks'=>100],
            ['code'=>'CSC462','subject'=>'Internship','credits'=>6,'marks'=>200],
            ['code'=>'Elective IV','subject'=>'Choose One','credits'=>3,'marks'=>100],
            ['code'=>'Elective V','subject'=>'Choose One','credits'=>3,'marks'=>100],
        ],
    ];
    @endphp

    @foreach($semesters as $sem => $subjects)
    <div style="margin-bottom:2.5rem; background:white; padding:20px; border-radius:12px; box-shadow:0 6px 15px rgba(0,0,0,0.1);">
        <h3 style="color:#0066cc; margin-bottom:15px;">Semester {{ $sem }}</h3>
        <table style="width:100%; border-collapse:collapse;">
            <thead>
                <tr style="background:#f0f4f8;">
                    <th style="text-align:left; padding:10px; border-bottom:2px solid #ccc;">SN</th>
                    <th style="text-align:left; padding:10px; border-bottom:2px solid #ccc;">Course Code</th>
                    <th style="text-align:left; padding:10px; border-bottom:2px solid #ccc;">Course Title</th>
                    <th style="text-align:center; padding:10px; border-bottom:2px solid #ccc;">Credit Hrs.</th>
                    <th style="text-align:center; padding:10px; border-bottom:2px solid #ccc;">Full Marks</th>
                </tr>
            </thead>
            <tbody>
                @php $sn = 1; $totalCredits = 0; $totalMarks = 0; @endphp
                @foreach($subjects as $sub)
                <tr>
                    <td style="padding:8px 10px; border-bottom:1px solid #eee;">{{ $sn++ }}</td>
                    <td style="padding:8px 10px; border-bottom:1px solid #eee;">{{ $sub['code'] }}</td>
                    <td style="padding:8px 10px; border-bottom:1px solid #eee;">{{ $sub['subject'] }}
                        @isset($sub['electives'])
                        <ul style="list-style:disc; margin-left:15px; margin-top:5px; color:#555;">
                            @foreach($sub['electives'] as $elective)
                                <li>{{ $elective }}</li>
                            @endforeach
                        </ul>
                        @endisset
                    </td>
                    <td style="padding:8px 10px; text-align:center; border-bottom:1px solid #eee;">{{ $sub['credits'] }}</td>
                    <td style="padding:8px 10px; text-align:center; border-bottom:1px solid #eee;">{{ $sub['marks'] }}</td>
                </tr>
                @php 
                    $totalCredits += $sub['credits']; 
                    $totalMarks += $sub['marks']; 
                @endphp
                @endforeach
                <tr>
                    <td colspan="3" style="padding:8px 10px; font-weight:700; text-align:right;">Total</td>
                    <td style="padding:8px 10px; text-align:center; font-weight:700;">{{ $totalCredits }}</td>
                    <td style="padding:8px 10px; text-align:center; font-weight:700;">{{ $totalMarks }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    @endforeach

    <!-- ENTRY REQUIREMENTS & FEE STRUCTURE -->
    <div style="margin-top:3rem; background:#f0f4f8; padding:30px; border-radius:12px; box-shadow:0 6px 15px rgba(0,0,0,0.1);">

        <h2 style="color:#004080; margin-bottom:1.5rem; text-align:center;">Entry Requirements</h2>

        <p style="font-size:1.05rem; line-height:1.7; color:#333;">
            <strong>Academic Requirements for BSC CSIT:</strong><br>
            - 10+2 or equivalent in any discipline with minimum of 50% or equivalent in aggregate from a recognized board.<br>
            - Applicants are required to appear in the entrance test conducted by Institute of Science and Technology, Tribhuwan University (IOST) and should secure pass marks to be eligible.
        </p>

        <h2 style="color:#004080; margin-top:2.5rem; margin-bottom:1.5rem; text-align:center;">Fee Structure & Scholarships</h2>

        <div style="display:flex; flex-wrap:wrap; gap:20px; justify-content:center; text-align:center;">

            <div style="background:white; flex:1 1 300px; padding:25px; border-radius:12px; box-shadow:0 6px 15px rgba(0,0,0,0.1);">
                <h3 style="color:#0066cc; margin-bottom:10px;">Total Fee including Admission</h3>
                <p style="font-size:1.2rem; font-weight:600; color:#004080;">NRs. 11,60,000</p>
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
    <div style="margin-top:2.5rem; text-align:center;">
        <a href="#" 
           style="
                padding:12px 25px;
                background:#ffcc00;
                color:#004080;
                text-decoration:none;
                font-weight:700;
                border-radius:8px;
                transition:0.3s;
           "
           onmouseover="this.style.background='#e6b800'"
           onmouseout="this.style.background='#ffcc00'">
            Apply Now
        </a>
    </div>

</div>

@endsection
