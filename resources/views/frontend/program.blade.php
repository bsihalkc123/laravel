@extends('frontend.app')

@section('title', 'Programs')

@section('content')
<h1 style="text-align:center; margin:2rem 0;">Our Programs</h1>

<div class="programs-container" style="display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:2rem; padding:0 2rem 4rem;">
    @php
        $programs = [
            ['title'=>'BCA','desc'=>'Learn computer applications, programming, and software development skills for IT careers.','img'=>'https://via.placeholder.com/400x150?text=BCA'],
            ['title'=>'BSC CSIT','desc'=>'Bachelor of Science in Computer Science & IT focusing on programming, networking, and databases.','img'=>'https://via.placeholder.com/400x150?text=BSC+CSIT'],
            ['title'=>'BBS','desc'=>'Bachelor of Business Studies with focus on accounting, finance, and management skills.','img'=>'https://via.placeholder.com/400x150?text=BBS'],
            ['title'=>'BBM','desc'=>'Bachelor of Business Management preparing students for leadership, entrepreneurship, and management careers.','img'=>'https://via.placeholder.com/400x150?text=BBM'],
        ];
    @endphp

    @foreach($programs as $program)
    <div class="program-card" style="background:white;border-radius:10px;box-shadow:0 4px 12px rgba(0,0,0,0.1);overflow:hidden;transition:0.3s;">
        <img src="{{ $program['img'] }}" alt="{{ $program['title'] }}" style="width:100%;height:150px;object-fit:cover;">
        <div class="program-card-content" style="padding:1rem;">
            <h2>{{ $program['title'] }}</h2>
            <p>{{ $program['desc'] }}</p>
            <a href="#">Learn More</a>
        </div>
    </div>
    @endforeach
</div>
@endsection
