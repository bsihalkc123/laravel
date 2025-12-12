@extends('frontend.app')

@section('title', 'News & Events')

@section('content')

<div style="max-width:1200px; margin:3rem auto; padding:0 20px;">

    <!-- PAGE TITLE -->
    <div style="text-align:center; margin-bottom:3rem;">
        <h1 style="font-size:2rem; font-weight:700; color:#1a1a1a;">
            Life at <span style="color:#ff0000;">ACHS</span>
        </h1>
        <p style="font-size:1rem; color:#333; line-height:1.7; max-width:700px; margin:0 auto;">
            Explore the vibrant campus life at ACHS through our events, activities, and student experiences. 
            Our community thrives on learning, creativity, and collaboration.
        </p>
    </div>

    @php
    $events = [
        [
            'title' => 'Orientation Program 2023',
            'date' => 'March 15, 2023',
            'description' => 'Welcoming our new batch of students with an exciting orientation program.',
            'images' => [
                '/images/orientation1.jpg',
                '/images/orientation2.jpg',
                '/images/orientation3.jpg',
            ]
        ],
        [
            'title' => 'Cultural Festival',
            'date' => 'May 5, 2023',
            'description' => 'Celebrating diversity with music, dance, and art performances.',
            'images' => [
                '/images/cultural1.jpg',
                '/images/cultural2.jpg',
                '/images/cultural3.jpg',
            ]
        ],
        [
            'title' => 'Tech Fest',
            'date' => 'September 10, 2023',
            'description' => 'Innovative tech competitions and workshops for tech enthusiasts.',
            'images' => [
                '/images/tech1.jpg',
                '/images/tech2.jpg',
                '/images/tech3.jpg',
            ]
        ],
        [
            'title' => 'Sports Week',
            'date' => 'November 20, 2023',
            'description' => 'A day filled with fun and competitive sports activities.',
            'images' => [
                '/images/sports1.jpg',
                '/images/sports2.jpg',
                '/images/sports3.jpg',
            ]
        ],
    ];
    @endphp

    <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(280px,1fr)); gap:20px;">
        @foreach($events as $event)
            <div style="position:relative; border-radius:12px; overflow:hidden; box-shadow:0 6px 15px rgba(0,0,0,0.1); transition:0.3s; cursor:pointer;"
                 onmouseover="this.style.transform='scale(1.03)'; this.style.boxShadow='0 12px 25px rgba(0,0,0,0.2)';"
                 onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 6px 15px rgba(0,0,0,0.1)';">

                <!-- Images Grid inside Card -->
                <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(90px,1fr)); gap:2px;">
                    @foreach($event['images'] as $img)
                        <img src="{{ $img }}" alt="{{ $event['title'] }}" style="width:100%; height:120px; object-fit:cover;">
                    @endforeach
                </div>

                <!-- Overlay for Text -->
                <div style="position:absolute; bottom:0; left:0; width:100%; background:rgba(0,0,0,0.6); color:#fff; padding:15px; opacity:0; transition:0.3s;"
                     onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0'">
                    <h3 style="margin:0; font-size:1.1rem; font-weight:600;">{{ $event['title'] }}</h3>
                    <p style="margin:5px 0 0; font-size:0.85rem;">{{ $event['date'] }}</p>
                    <p style="margin:5px 0 0; font-size:0.8rem;">{{ $event['description'] }}</p>
                </div>

            </div>
        @endforeach
    </div>
    <!-- CAMPUS FACILITIES -->
<div style="max-width:1200px; margin:5rem auto; padding:0 20px;">

    <h2 style="font-size:2rem; font-weight:700; color:#1a1a1a; margin-bottom:2rem;">
        Campus <span style="color:red;">Facilities</span>
    </h2>

    <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(220px,1fr)); gap:30px;">
        @php
        $facilities = [
            ['icon' => '/images/icons/lab.png', 'title' => 'Modern Labs', 'desc' => 'State-of-the-art computer and science laboratories equipped with latest technology.'],
            ['icon' => '/images/icons/library.png', 'title' => 'Library', 'desc' => 'Well-stocked library with thousands of books, journals, and digital resources.'],
            ['icon' => '/images/icons/sports.png', 'title' => 'Sports Complex', 'desc' => 'Indoor and outdoor sports facilities including basketball court and gymnasium.'],
            ['icon' => '/images/icons/cafeteria.png', 'title' => 'Cafeteria', 'desc' => 'Spacious cafeteria serving healthy and hygienic food options.'],
            ['icon' => '/images/icons/auditorium.png', 'title' => 'Auditorium', 'desc' => 'Fully equipped auditorium for seminars, workshops, and cultural events.'],
            ['icon' => '/images/icons/lounge.png', 'title' => 'Student Lounge', 'desc' => 'Comfortable spaces for students to relax and collaborate between classes.'],
        ];
        @endphp

        @foreach($facilities as $facility)
            <div style="display:flex; align-items:flex-start; gap:15px;">
                <img src="{{ $facility['icon'] }}" alt="{{ $facility['title'] }}" style="width:40px; height:40px;">
                <div>
                    <h3 style="margin:0; font-size:1.1rem; font-weight:600;">{{ $facility['title'] }}</h3>
                    <p style="margin:5px 0 0; font-size:0.9rem; color:#555;">{{ $facility['desc'] }}</p>
                </div>
            </div>
        @endforeach
    </div>

</div>

<!-- STUDENT EXPERIENCES -->
<div style="max-width:1200px; margin:5rem auto; padding:0 20px;">

    <h2 style="font-size:2rem; font-weight:700; color:#1a1a1a; margin-bottom:1rem;">
        Student <span style="color:red;">Experiences</span>
    </h2>
    <p style="font-size:1rem; color:#666; margin-bottom:2rem;">
        Dedicated professionals driving our success
    </p>

    @php
    $students = [
        ['name' => 'Riya Sharma', 'course' => 'BSc CSIT, 3rd Year', 'quote' => 'ACHS has provided me with countless opportunities to grow both academically and personally. The faculty is extremely supportive and the campus environment is very conducive to learning.', 'image' => '/images/students/riya.jpg'],
        ['name' => 'Amit Gurung', 'course' => 'BBM, 2nd Year', 'quote' => 'The practical approach to learning at ACHS has helped me understand business concepts better. The industry visits and guest lectures are particularly valuable.', 'image' => '/images/students/amit.jpg'],
        ['name' => 'Sneha Thapa', 'course' => 'BCA, Final Year', 'quote' => 'I’ve had the chance to work on real-world projects and participate in hackathons that have boosted my confidence and technical skills significantly.', 'image' => '/images/students/sneha.jpg'],
        ['name' => 'Rajiv Shrestha', 'course' => 'BBS, Alumni', 'quote' => 'The holistic education I received at ACHS prepared me well for my professional career. The soft skills training was as valuable as the academic curriculum.', 'image' => '/images/students/rajiv.jpg'],
    ];
    @endphp

    <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(250px,1fr)); gap:25px;">
        @foreach($students as $student)
            <div style="display:flex; flex-direction:column; align-items:center; text-align:center; gap:10px; padding:15px; border-radius:12px; box-shadow:0 6px 15px rgba(0,0,0,0.05);">
                <img src="{{ $student['image'] }}" alt="{{ $student['name'] }}" style="width:120px; height:120px; object-fit:cover; border-radius:50%;">
                <h3 style="margin:0; font-size:1.1rem; font-weight:600;">{{ $student['name'] }}</h3>
                <p style="margin:0; font-size:0.85rem; color:#777;">{{ $student['course'] }}</p>
                <p style="font-size:0.9rem; color:#555;">"{{ $student['quote'] }}"</p>
            </div>
        @endforeach
    </div>

</div>


    <!-- LOAD MORE BUTTON -->
    <div style="text-align:center; margin-top:3rem;">
        <a href="#" 
           style="padding:12px 25px; background:#ffcc00; color:#004080; text-decoration:none; font-weight:700; border-radius:8px; transition:0.3s;"
           onmouseover="this.style.background='#e6b800'"
           onmouseout="this.style.background='#ffcc00'">
            Load More Events
        </a>
    </div>

</div>

@endsection
