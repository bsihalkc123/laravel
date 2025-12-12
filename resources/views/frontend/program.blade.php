@extends('frontend.app')

@section('title', 'Programs')

@section('content')

<h1 style="text-align:center; margin:2rem 0; font-size:2.3rem; color:#004080; font-weight:700;">
    Our Programs
</h1>

<div style="
    max-width:1200px;
    margin:0 auto;
    display:grid;
    grid-template-columns:repeat(auto-fit, minmax(270px, 1fr));
    gap:2rem;
    padding:0 2rem 4rem;
">

    @php
        $programs = [
            [
                'title'=>'BCA',
                'route'=>'programs.bca',
                'desc'=>'Learn computer applications, programming, databases & software development skills for IT careers.',
                'img'=> asset('images/BCA.png')
            ],
            [
                'title'=>'BSC CSIT',
                'route'=>'programs.csit',
                'desc'=>'Bachelor of Science in Computer Science & IT focusing on programming, networking, AI and cybersecurity.',
                'img'=> asset('images/CSIT.png')
            ],
            [
                'title'=>'BBS',
                'route'=>'programs.bbs',
                'desc'=>'Bachelor of Business Studies with accounting, finance, marketing and management specialization.',
                'img'=> asset('images/BBS.png')
            ],
            [
                'title'=>'BBM',
                'route'=>'programs.bbm',
                'desc'=>'Bachelor of Business Management preparing students for leadership, entrepreneurship & business careers.',
                'img'=> asset('images/BBM.png')
            ],
        ];
    @endphp

    @foreach($programs as $program)
    <div style="
        background:white;
        border-radius:12px;
        overflow:hidden;
        box-shadow:0 6px 15px rgba(0,0,0,0.12);
        transition:0.3s;
        cursor:pointer;
    "
    onmouseover="this.style.transform='scale(1.05)'"
    onmouseout="this.style.transform='scale(1)'"
    >
        <img src="{{ $program['img'] }}" alt="{{ $program['title'] }}" 
             style="width:100%; height:170px; object-fit:cover;">

        <div style="padding:1.4rem;">
            <h2 style="color:#004080; margin-bottom:10px;">{{ $program['title'] }}</h2>
            <p style="color:#555; line-height:1.5; font-size:0.95rem;">
                {{ $program['desc'] }}
            </p>

            <a href="{{ route($program['route']) }}" 
               style="
                  display:inline-block;
                  margin-top:15px;
                  padding:8px 15px;
                  background:#ffcc00;
                  color:#004080;
                  font-weight:600;
                  border-radius:6px;
                  text-decoration:none;
                  transition:0.3s;
              "
              onmouseover="this.style.background='#e6b800'"
              onmouseout="this.style.background='#ffcc00'"
            >
                Learn More
            </a>
        </div>
    </div>
    @endforeach

</div>

@endsection
