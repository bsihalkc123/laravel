@extends('frontend.app')

@section('title', 'BBS Program')

@section('content')

<div style="max-width:1000px; margin:3rem auto; padding:0 20px;">

    <!-- PAGE TITLE & DESCRIPTION -->
    <h1 style="text-align:center; color:#004080; margin-bottom:1rem; font-size:2.2rem;">
        Bachelor of Business Studies (BBS)
    </h1>

    <p style="font-size:1rem; line-height:1.7; color:#333;">
        The Bachelor of Business Studies (BBS) is a four-year undergraduate program designed to provide students with comprehensive knowledge in business, finance, accounting, management, and marketing. Graduates are prepared for professional careers in business administration and management.
    </p>

    <!-- SEMESTER-WISE SYLLABUS -->
    <h2 style="margin-top:2rem; color:#004080; text-align:center; margin-bottom:2rem;">
        TU BBS Semester-wise Syllabus
    </h2>

    @php
    $semesters = [
        1 => [
            ['code'=>'MGT201','subject'=>'Business English'],
            ['code'=>'MGT202','subject'=>'Business Statistics'],
            ['code'=>'MGT207','subject'=>'Microeconomics for Business'],
            ['code'=>'MGT211','subject'=>'Financial Accounting and Analysis'],
            ['code'=>'MGT213','subject'=>'Principles of Management'],
        ],
        2 => [
            ['code'=>'MGT205','subject'=>'Business Communication'],
            ['code'=>'MGT209','subject'=>'Macroeconomics for Business'],
            ['code'=>'MGT212','subject'=>'Cost and Management Accounting'],
            ['code'=>'MGT223','subject'=>'Organizational Behavior & HRM'],
            ['code'=>'MGT215','subject'=>'Fundamentals of Financial Management'],
        ],
        3 => [
            ['code'=>'MGT204','subject'=>'Business Law'],
            ['code'=>'MGT226','subject'=>'Foundation of Financial Systems'],
            ['code'=>'MGT217','subject'=>'Business Environment and Strategy'],
            ['code'=>'MGT224','subject'=>'Taxation in Nepal'],
            ['code'=>'MGT214','subject'=>'Fundamentals of Marketing'],
        ],
        4 => [
            ['code'=>'MGT225','subject'=>'Entrepreneurship'],
            ['code'=>'Concentration I','subject'=>'Choose from concentration area'],
            ['code'=>'Concentration II','subject'=>'Choose from concentration area'],
            ['code'=>'Concentration III','subject'=>'Choose from concentration area'],
            ['code'=>'MGT221','subject'=>'Business Research Methods'],
            ['code'=>'MGT401','subject'=>'Final Project'],
        ],
    ];

    $concentrations = [
        'Accounting' => [
            ['code'=>'ACC250','subject'=>'Accounting for Banking'],
            ['code'=>'ACC251','subject'=>'Accounting for Business'],
            ['code'=>'ACC252','subject'=>'Advanced Financial Accounting'],
            ['code'=>'ACC255','subject'=>'Auditing'],
            ['code'=>'ACC256','subject'=>'Advance Cost and Management Accounting'],
        ],
        'Finance' => [
            ['code'=>'FIN250','subject'=>'Fundamentals of Corporate Finance'],
            ['code'=>'FIN251','subject'=>'Commercial Bank Management'],
            ['code'=>'FIN255','subject'=>'Management of Financial Institutions'],
            ['code'=>'FIN253','subject'=>'Fundamentals of Investment'],
            ['code'=>'FIN254','subject'=>'Insurance and Risk Management'],
        ],
        'Marketing' => [
            ['code'=>'MKT250','subject'=>'Fundamentals of Selling'],
            ['code'=>'MKT251','subject'=>'Customer Relationship Management'],
            ['code'=>'MKT252','subject'=>'Foreign Trade and Export Management in Nepal'],
            ['code'=>'MKT253','subject'=>'Fundamentals of Advertising'],
            ['code'=>'MKT254','subject'=>'Fundamentals of Services Marketing'],
        ],
        'Management' => [
            ['code'=>'MGT251','subject'=>'International Business'],
            ['code'=>'MGT256','subject'=>'Small and Medium Enterprises'],
            ['code'=>'MGT257','subject'=>'Event Management'],
            ['code'=>'MGT258','subject'=>'Project Management'],
            ['code'=>'MGT259','subject'=>'Technology & Information Management'],
        ],
    ];
    @endphp

    @foreach($semesters as $sem => $subjects)
    <div style="margin-bottom:2rem; background:white; padding:20px; border-radius:12px; box-shadow:0 6px 15px rgba(0,0,0,0.1);">
        <h3 style="color:#0066cc; margin-bottom:15px;">Year {{ $sem }}</h3>
        <table style="width:100%; border-collapse:collapse;">
            <thead>
                <tr style="background:#f0f4f8;">
                    <th style="padding:10px; border-bottom:2px solid #ccc;">#</th>
                    <th style="padding:10px; border-bottom:2px solid #ccc;">Course Code</th>
                    <th style="padding:10px; border-bottom:2px solid #ccc;">Subject Name</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1; @endphp
                @foreach($subjects as $sub)
                <tr>
                    <td style="padding:8px 10px; border-bottom:1px solid #eee; text-align:center;">{{ $i }}</td>
                    <td style="padding:8px 10px; border-bottom:1px solid #eee;">{{ $sub['code'] }}</td>
                    <td style="padding:8px 10px; border-bottom:1px solid #eee;">{{ $sub['subject'] }}</td>
                </tr>
                @php $i++; @endphp
                @endforeach
            </tbody>
        </table>
    </div>
    @endforeach

    <!-- CONCENTRATION AREAS -->
    <h2 style="color:#004080; margin-top:2.5rem; text-align:center;">Concentration Areas (Choose 3 Courses)</h2>
    @foreach($concentrations as $area => $courses)
    <div style="margin-bottom:1.5rem; background:white; padding:15px 20px; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
        <h3 style="color:#0066cc;">{{ $area }}</h3>
        <ul style="margin-left:20px; line-height:1.6;">
            @foreach($courses as $course)
            <li>{{ $course['code'] }} - {{ $course['subject'] }}</li>
            @endforeach
        </ul>
    </div>
    @endforeach

  <!-- ENTRY REQUIREMENTS & FEE STRUCTURE -->
    <div style="margin-top:3rem; background:#f0f4f8; padding:30px; border-radius:12px; box-shadow:0 6px 15px rgba(0,0,0,0.1);">

        <h2 style="color:#004080; margin-bottom:1.5rem; text-align:center;">Entry Requirements</h2>

        <p style="font-size:1.05rem; line-height:1.7; color:#333;">
            <strong>Academic Requirements for BBS:</strong><br>
            - 10+2 or equivalent in any discipline with minimum of 60% or equivalent in aggregate from a recognized board.<br>
            - No entrance examination required for admission.
        </p>

        <h2 style="color:#004080; margin-top:2.5rem; margin-bottom:1.5rem; text-align:center;">Fee Structure & Scholarships</h2>

        <div style="display:flex; flex-wrap:wrap; gap:20px; justify-content:center; text-align:center;">

            <div style="background:white; flex:1 1 300px; padding:25px; border-radius:12px; box-shadow:0 6px 15px rgba(0,0,0,0.1);">
                <h3 style="color:#0066cc; margin-bottom:10px;">Total Fee including Admission</h3>
                <p style="font-size:1.2rem; font-weight:600; color:#004080;">NRs. 4,00,000</p>
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
