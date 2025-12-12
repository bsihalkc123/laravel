@extends('frontend.app')

@section('title', 'BBM Program')

@section('content')

<div style="max-width:1200px; margin:3rem auto; padding:0 20px;">

    <!-- PAGE TITLE & DESCRIPTION -->
    <h1 style="text-align:center; color:#004080; margin-bottom:1rem; font-size:2.2rem;">
        Bachelor of Business Management (BBM)
    </h1>

    <p style="font-size:1rem; line-height:1.7; color:#333;">
       The Bachelor of Business Management (BBM) is a four-year undergraduate program that provides in-depth knowledge in management, finance, marketing, accounting, and business operations.
       It equips students with the skills needed for leadership and management roles in various industries.

    </p>

    <!-- SEMESTERS -->
    <h2 style="margin-top:2.5rem; color:#004080; text-align:center; margin-bottom:2rem;">BBM Semester-wise Syllabus</h2>

    @php
    $semesters = [
        1 => [
            ['id'=>1,'code'=>'ECO211','subject'=>'Introductory Microeconomics','credits'=>3],
            ['id'=>2,'code'=>'ENG211','subject'=>'English – I','credits'=>3],
            ['id'=>3,'code'=>'MGT201','subject'=>'Principles of Management','credits'=>3],
            ['id'=>4,'code'=>'MTH201','subject'=>'Business Mathematics I','credits'=>3],
            ['id'=>5,'code'=>'SOC201','subject'=>'Sociology for Business','credits'=>3],
        ],
        2 => [
            ['id'=>1,'code'=>'ACC201','subject'=>'Financial Accounting','credits'=>3],
            ['id'=>2,'code'=>'ECO212','subject'=>'Introductory Macroeconomics','credits'=>3],
            ['id'=>3,'code'=>'ENG212','subject'=>'English – II','credits'=>3],
            ['id'=>4,'code'=>'MTH212','subject'=>'Business Mathematics II','credits'=>3],
            ['id'=>5,'code'=>'PSY201','subject'=>'Psychology','credits'=>3],
        ],
        3 => [
            ['id'=>1,'code'=>'ACC312','subject'=>'Computer-Based Financial Accounting','credits'=>3],
            ['id'=>2,'code'=>'ENG313','subject'=>'Business Communication','credits'=>3],
            ['id'=>3,'code'=>'FIN311','subject'=>'Basic Finance','credits'=>3],
            ['id'=>4,'code'=>'SOC312','subject'=>'Nepalese Society and Politics','credits'=>3],
            ['id'=>5,'code'=>'STT311','subject'=>'Business Statistics','credits'=>3],
        ],
        4 => [
            ['id'=>1,'code'=>'ACC313','subject'=>'Accounting for Decision Making','credits'=>3],
            ['id'=>2,'code'=>'FIN312','subject'=>'Financial Management','credits'=>3],
            ['id'=>3,'code'=>'MGT313','subject'=>'Human Resource Management','credits'=>3],
            ['id'=>4,'code'=>'ACC314','subject'=>'Taxation in Nepal','credits'=>3],
            ['id'=>5,'code'=>'RCH31','subject'=>'Business Research Methods','credits'=>3],
        ],
        5 => [
            ['id'=>1,'code'=>'MGT203','subject'=>'Organizational Behavior','credits'=>3],
            ['id'=>2,'code'=>'MKT311','subject'=>'Fundamentals of Marketing','credits'=>3],
            ['id'=>3,'code'=>'OPR311','subject'=>'Introduction to Operations Management','credits'=>3],
            ['id'=>4,'code'=>'MGT314','subject'=>'Legal Environment of Business','credits'=>3],
            ['id'=>5,'code'=>'FAI101','subject'=>'Focus Area Course I','credits'=>3],
        ],
        6 => [
            ['id'=>1,'code'=>'FAI102','subject'=>'Focus Area Course II','credits'=>3],
            ['id'=>2,'code'=>'COM312','subject'=>'Database Management','credits'=>3],
            ['id'=>3,'code'=>'MGT315','subject'=>'Business Environment in Nepal','credits'=>3],
            ['id'=>4,'code'=>'MGT316','subject'=>'Introduction to International Business','credits'=>3],
        ],
        7 => [
            ['id'=>1,'code'=>'ELE301','subject'=>'Elective Course I','credits'=>3],
            ['id'=>2,'code'=>'FAI103','subject'=>'Focus Area Course III','credits'=>3],
            ['id'=>3,'code'=>'ITC311','subject'=>'E-commerce','credits'=>3],
            ['id'=>4,'code'=>'MGT317','subject'=>'Business Ethics and Social Responsibility','credits'=>3],
        ],
        8 => [
            ['id'=>1,'code'=>'MGT318','subject'=>'Business Strategy','credits'=>3],
            ['id'=>2,'code'=>'ELE302','subject'=>'Elective Course II','credits'=>3],
            ['id'=>3,'code'=>'ELE303','subject'=>'Elective Course III','credits'=>3],
            ['id'=>4,'code'=>'FAI104','subject'=>'Focus Area Course IV','credits'=>3],
            ['id'=>5,'code'=>'MGT351','subject'=>'Internship','credits'=>6],
        ],
    ];
    @endphp

    @foreach($semesters as $sem => $subjects)
    <div style="margin-bottom:2.5rem; background:white; padding:20px; border-radius:12px; box-shadow:0 6px 15px rgba(0,0,0,0.1);">
        <h3 style="color:#0066cc; margin-bottom:15px;">Semester {{ $sem }}</h3>
        <table style="width:100%; border-collapse:collapse;">
            <thead>
                <tr style="background:#f0f4f8;">
                    <th style="padding:10px; border-bottom:2px solid #ccc;">SN</th>
                    <th style="padding:10px; border-bottom:2px solid #ccc;">Course ID</th>
                    <th style="padding:10px; border-bottom:2px solid #ccc;">Course Name</th>
                    <th style="padding:10px; border-bottom:2px solid #ccc;">Credit Hour</th>
                </tr>
            </thead>
            <tbody>
                @php $totalCredits = 0; @endphp
                @foreach($subjects as $sub)
                <tr>
                    <td style="padding:8px 10px; border-bottom:1px solid #eee;">{{ $sub['id'] }}</td>
                    <td style="padding:8px 10px; border-bottom:1px solid #eee;">{{ $sub['code'] }}</td>
                    <td style="padding:8px 10px; border-bottom:1px solid #eee;">{{ $sub['subject'] }}</td>
                    <td style="padding:8px 10px; border-bottom:1px solid #eee; text-align:center;">{{ $sub['credits'] }}</td>
                </tr>
                @php $totalCredits += $sub['credits']; @endphp
                @endforeach
                <tr>
                    <td colspan="3" style="padding:8px 10px; font-weight:700; text-align:right;">Total Credit Hours:</td>
                    <td style="padding:8px 10px; text-align:center; font-weight:700;">{{ $totalCredits }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    @endforeach

    <!-- FOCUS AREA COURSES -->
    <div style="margin-top:3rem; background:#f9f9f9; padding:25px; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,0.08);">
        <h2 style="color:#004080; text-align:center; margin-bottom:1.5rem;">List of Focus Area Courses</h2>

        @php
        $focusAreas = [
            'Bank Operations and Cooperative Management'=>[
                'BNK211'=>'Banking Law','BNK212'=>'Wholesale and Retail Banking','BNK213'=>'Futures and Options Markets',
                'BNK214'=>'Commercial Bank Operations','BNK215'=>'Capital and Money Markets','BNK216'=>'Treasury Management',
                'BNK217'=>'Cooperative Management','BNK218'=>'Micro Finance and Rural Banking','BNK219'=>'Investment Banking',
            ],
            'Sales and Marketing'=>[
                'MKT211'=>'Consumer Behavior','MKT212'=>'Advertising and Public Relations','MKT213'=>'Creative Selling',
                'MKT214'=>'Sales Force Management','MKT215'=>'Retail Management','MKT216'=>'Supply Chain and Channel Management',
                'MKT217'=>'Industrial Marketing','MKT218'=>'Rural Marketing',
            ],
            'Insurance and Risk Management'=>[
                'INS211'=>'Introduction to Risk and Insurance','INS212'=>'Insurance Broking and Bancassurance','INS213'=>'Commercial Property Risk Management',
                'INS214'=>'Commercial Liability Risk Management','INS215'=>'Life and Non-Life Insurance','INS216'=>'Private Property Risk Management',
                'INS217'=>'Global Trade and Marine Insurance','INS218'=>'Micro Insurance',
            ],
            'Entrepreneurship and Enterprise Development'=>[
                'EED211'=>'Entrepreneurship Development','EED212'=>'Principles of Small Business Management','EED213'=>'Creativity and Innovation',
                'EED214'=>'Entrepreneurial Marketing','EED215'=>'Micro-finance','EED216'=>'Small Business Planning and Creation',
                'EED217'=>'Project Management',
            ],
        ];
        @endphp

        @foreach($focusAreas as $area=>$courses)
            <h3 style="color:#0066cc; margin-bottom:10px;">{{ $area }}</h3>
            <ul style="list-style:disc; margin-left:20px; line-height:1.7; color:#333;">
                @foreach($courses as $code=>$name)
                    <li>{{ $code }}: {{ $name }}</li>
                @endforeach
            </ul>
        @endforeach
    </div>

    <!-- ELECTIVE COURSES -->
    <div style="margin-top:2.5rem; background:#f9f9f9; padding:25px; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,0.08);">
        <h2 style="color:#004080; text-align:center; margin-bottom:1.5rem;">List of Elective Courses</h2>

        @php
        $electives = [
            'ELE221'=>'Emerging Global Business Issues',
            'ELE222'=>'Information and Technology Management',
            'ELE223'=>'Management of Foreign Trade',
            'ELE224'=>'Organizational Development and Change',
            'ELE225'=>'Budgeting and Financial Forecasting',
            'ELE226'=>'Event Management',
            'ELE227'=>'Service Operations Management',
            'ELE228'=>'Labor Relations Management',
            'ELE229'=>'Negotiation Skills',
            'ELE230'=>'Real Estate Management',
        ];
        @endphp

        <ul style="list-style:disc; margin-left:20px; line-height:1.7; color:#333;">
            @foreach($electives as $code=>$name)
                <li>{{ $code }}: {{ $name }}</li>
            @endforeach
        </ul>
    </div>

    <!-- ENTRY REQUIREMENTS & FEE STRUCTURE -->
    <div style="margin-top:3rem; background:#f0f4f8; padding:30px; border-radius:12px; box-shadow:0 6px 15px rgba(0,0,0,0.1);">

        <h2 style="color:#004080; margin-bottom:1.5rem; text-align:center;">Entry Requirements</h2>

        <p style="font-size:1.05rem; line-height:1.7; color:#333;">
            <strong>Academic Requirements for BBM:</strong><br>
            - 10+2 or equivalent in any discipline with minimum of 45% or equivalent in aggregate from a recognized board.<br>
            - No entrance examination required for admission.
        </p>

        <h2 style="color:#004080; margin-top:2.5rem; margin-bottom:1.5rem; text-align:center;">Fee Structure & Scholarships</h2>

        <div style="display:flex; flex-wrap:wrap; gap:20px; justify-content:center; text-align:center;">

            <div style="background:white; flex:1 1 300px; padding:25px; border-radius:12px; box-shadow:0 6px 15px rgba(0,0,0,0.1);">
                <h3 style="color:#0066cc; margin-bottom:10px;">Total Fee including Admission</h3>
                <p style="font-size:1.2rem; font-weight:600; color:#004080;">NRs. 6,00,000</p>
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
           style="padding:12px 25px; background:#ffcc00; color:#004080; text-decoration:none; font-weight:700; border-radius:8px; transition:0.3s;"
           onmouseover="this.style.background='#e6b800'"
           onmouseout="this.style.background='#ffcc00'">
            Apply Now
        </a>
    </div>

</div>

@endsection
