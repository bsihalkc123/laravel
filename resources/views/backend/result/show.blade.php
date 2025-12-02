<!DOCTYPE html>
<html>

<head>
    <title>Official Transcript</title>
    <style>
        @page {
            size: A4;
            margin: 20mm;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #222;
            font-size: 15px;
            line-height: 1.5;
            background: #f9f9f9;
            padding: 10px 30px;
        }

        .header {
            text-align: center;
            margin-bottom: 5px;
        }

        .header h1 {
            margin: 0;
            font-size: 26px;
            font-weight: 900;
            color: #003366;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .header .address {
            font-size: 12px;
            color: #555;
            margin-top: 3px;
            font-style: italic;
        }

        .transcript-title {
            background-color: #004080;
            color: white;
            width: 180px;
            margin: 15px auto 20px auto;
            padding: 6px 0;
            font-weight: 700;
            font-size: 16px;
            letter-spacing: 1.5px;
            border-radius: 4px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
            text-align: center;
        }

        .info-container {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
            padding-bottom: 8px;
            border-bottom: 2px solid #004080;
        }

        .info-block {
            width: 48%;
            font-size: 14px;
            color: #111;
        }

        .info-block h3 {
            margin-bottom: 12px;
            border-bottom: 3px solid #004080;
            padding-bottom: 6px;
            font-weight: 800;
            font-size: 15px;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: #00264d;
        }

        .info-block p {
            margin: 6px 0;
            font-weight: 600;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
            font-size: 14px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            background: #fff;
            border-radius: 6px;
            overflow: hidden;
        }

        table th,
        table td {
            border: 1px solid #999;
            padding: 10px 12px;
            text-align: center;
        }

        table th {
            background-color: #0073e6;
            color: #fff;
            font-weight: 700;
            letter-spacing: 0.8px;
        }

        table td.subject-name {
            text-align: left;
            padding-left: 18px;
            color: #333;
        }

        table td.subject-code {
            width: 75px;
        }

        .summary {
            margin-top: 30px;
            font-size: 16px;
            max-width: 420px;
            font-weight: 700;
            color: #003366;
            letter-spacing: 0.7px;
        }

        .summary p {
            margin: 8px 0;
        }


        .a4-wrapper {
            width: 210mm;
            min-height: 297mm;
            background: #ffffff;
            padding: 15mm 20mm;
            margin: auto;
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.25);
            border-radius: 3px;
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
                background: white !important;
            }

            button {
                display: none;
            }

            .hidden-btn {
                display: none;
            }



            .a4-wrapper {
                box-shadow: none !important;
                width: 210mm !important;
                height: 297mm !important;
                padding: 12mm 15mm !important;
                margin: 0 !important;
                border-radius: 0 !important;
            }
        }
    </style>

</head>

<body>
     <div class="a4-wrapper">
        <div style="display:flex; justify-content: space-between; margin-bottom: 15px;">
            <!-- Back button on the left -->
            <a href="{{ route('results.index') }}" class="back-btn hidden-btn" style="padding:8px 16px; font-size:14px; 
                   background-color:#0073e6; color:#fff; border:none; border-radius:4px; font-weight:600; cursor:pointer;">Back</a>

            <!-- Print button on the right -->
            <button onclick=" window.print()"
                style="padding:8px 16px; font-size:14px; 
                   background-color:#0073e6; color:#fff; border:none; border-radius:4px; font-weight:600; cursor:pointer;">
                Print PDF
                </button>
        </div>
        <!-- Header -->
        <div class="header">
            <h1>Asian College of Higher Studies</h1>
            <div class="address">
                Ekantakuna, Kathmandu, Nepal | Phone: +977-01-5912727 | Email:info@achsnepaledu.np
            </div>
        </div>

        <div class="transcript-title">MARKSHEET</div>

        <!-- Student & Academic Information -->
        <div class="info-container">

            <!-- Student Information -->
            <div class="info-block">
                <h3>Student Information</h3>
                <p><strong>Student Name:</strong> {{ $student->first_name . ' ' . $student->last_name ?? 'N/A' }}</p>

                <p><strong>Student ID:</strong> {{ $student->student_code ?? $student->id ?? 'N/A' }}</p>
                <p><strong>Date of Birth:</strong> {{ $student->date_of_birth ?? 'N/A' }}</p>
            </div>

            <!-- Academic Information -->
            <div class="info-block">
                <h3>Academic Information</h3>
                <p><strong>Exam:</strong> {{ optional($student->results->first()->exam)->exam_name ?? 'N/A' }}</p>
                <p><strong>Semester:</strong> {{ optional($student->results->first()->exam)->exam_term ?? 'N/A' }}</p>
                <p><strong>Academic Year:</strong> {{ optional($student->results->first()->exam)->exam_year ?? 'N/A' }}</p>
                <p><strong>Course:</strong> {{ optional($student->enrollments->first()->course)->course_name ?? 'N/A' }}</p>
            </div>


        </div>

        <!-- Marks Table -->
        <table border="1" cellpadding="8" style="width:100%; border-collapse: collapse; margin-top:20px;">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Subject</th>
                    <th>Full Marks</th>
                    <th>Pass Marks</th>
                    <th>Obtained</th>
                    <th>Grade</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                @php
                $totalObtained = 0;
                $totalFullMarks = 0;
                @endphp

                @foreach($student->results as $result)
                @php
                // Subject marks
                $fullMarks = $result->full_marks;
                $passMarks = $result->pass_marks;
                $obtained = $result->obtained_marks;

                // Percentage & Grade calculation
                $percentage = $fullMarks > 0 ? ($obtained / $fullMarks) * 100 : 0;

                if($percentage >= 80) $grade = 'A+';
                elseif($percentage >= 70) $grade = 'A';
                elseif($percentage >= 60) $grade = 'B+';
                elseif($percentage >= 50) $grade = 'B';
                elseif($percentage >= 40) $grade = 'C';
                else $grade = 'F';

                $remarks = ($grade == 'F') ? 'Fail' : 'Pass';

                $totalObtained += $obtained;
                $totalFullMarks += $fullMarks;
                @endphp
                <tr>
                    <td>{{ $result->subject->subject_code ?? 'N/A' }}</td>
                    <td>{{ $result->subject->subject_name ?? 'N/A' }}</td>
                    <td>{{ $fullMarks }}</td>
                    <td>{{ $passMarks }}</td>
                    <td>{{ $obtained }}</td>
                    <td>{{ $grade }}</td>
                    <td>{{ $remarks }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Performance Summary -->
        @php
        $overallPercentage = $totalFullMarks > 0 ? round(($totalObtained / $totalFullMarks) * 100, 2) : 0;

        if($overallPercentage >= 80) $finalGrade = 'A+';
        elseif($overallPercentage >= 70) $finalGrade = 'A';
        elseif($overallPercentage >= 60) $finalGrade = 'B+';
        elseif($overallPercentage >= 50) $finalGrade = 'B';
        elseif($overallPercentage >= 40) $finalGrade = 'C';
        else $finalGrade = 'F';

        $finalResult = ($finalGrade == 'F') ? 'Fail' : 'Pass';
        @endphp

        <div style="margin-top:20px;">
            <p><strong>Percentage:</strong> {{ $overallPercentage }}%</p>
            <p><strong>Final Grade:</strong> {{ $finalGrade }}</p>
            <p><strong>Final Result:</strong> {{ $finalResult }}</p>
        </div>
    </div>
</body>
</html>