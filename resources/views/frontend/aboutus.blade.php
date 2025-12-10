@extends('frontend.app')

@section('title', 'About Us')

@push('styles')
<style>
/* SLIDER */
.slider {
    width: 100%;
    height: 500px; /* adjust height as needed */
    overflow: hidden;
    position: relative;
}

.slides {
    display: flex;
    width: 100%;
    height: 100%;
    transition: transform 0.7s ease-in-out;
}

.slides img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    flex-shrink: 0;
}

/* ABOUT US SECTIONS */
.about-us { padding: 60px 20px; background:#f0f4f8; }
.section-block {
    max-width: 1200px;
    margin: 0 auto 60px;
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
    align-items: center;
}
.section-block img {
    max-width: 100%;
    height: auto;
    border-radius: 15px;
    box-shadow:0 8px 20px rgba(0,0,0,0.1);
}
.section-text { flex: 1 1 500px; }
.section-text h2 { font-size:2em; margin-bottom:15px; color:#004080; }
.section-text p, .section-text ul { margin-bottom:15px; }
.section-text ul { list-style: disc; margin-left:20px; line-height:1.6; }

.social-icons a {
    display:inline-flex;
    justify-content:center;
    align-items:center;
    width:45px; height:45px;
    border-radius:50%;
    background:#004080;
    color:#fff;
    margin-right:15px;
    font-size:1.2em;
    transition: all 0.3s;
}
.social-icons a:hover {
    background:#ffcc00;
    color:#004080;
    transform: scale(1.1);
}

/* Responsive */
@media(max-width:768px){
    .section-block { flex-direction: column; text-align:center; }
    .section-block img, .section-text { flex:1 1 100%; }
}
</style>
@endpush

@section('content')

<!-- SLIDER -->
<div class="slider">
    <div class="slides">
        <img src="{{ asset('images/slider/aboutsus1.jpg') }}" alt="Campus Slide 1">
        <img src="{{ asset('images/slider/aboutsus2.jpg') }}" alt="Campus Slide 2">
        <img src="{{ asset('images/slider/aboutsus3.jpg') }}" alt="Campus Slide 3">
    </div>
</div>

<!-- ABOUT US SECTIONS -->
<section class="about-us">
       <!-- Mission -->
    <div class="section-block">
        <div>
            <img src="{{ asset('images/mission.png') }}" alt="Mission Image">
        </div>
        <div class="section-text">
            <h2 style="color: burlywood">Our Mission</h2>
            <p>
                The mission of the ACHS Education Foundation is to develop citizens of integrity with the managerial expertise,
                vision, pragmatism, and ethical sensibility to succeed professionally and personally, both independently and collaboratively.
                Additionally, we intend to prepare leaders to face the challenges of a dynamic and diverse world, grounded in our ideals
                of excellence in education, the importance of community, and a commitment to service.
            </p>
        </div>
    </div>


 <!-- Vision -->
    <div class="section-block" style="flex-direction: row-reverse;">
        <div><img src="{{ asset('images/vision.png') }}" alt="Vision Image"></div>
        <div class="section-text">
            <h2 style="color: burlywood">Our Vision</h2>
            <p>
                To be an innovative global leader in imparting competitive, quality education by transforming lives that will
                change the world for the better, at whatever level of human endeavor they are involved in.
            </p>
        </div>
    </div>

    <div class="section-block">
        <div><img src="{{ asset('images/objective.png') }}" alt="Objectives Image"></div>
        <div class="section-text">
            <h2 style="color: burlywood">Our Objectives</h2>
            <ul>
                <li>Provide high-quality education in various disciplines.</li>
                <li>Encourage innovation, research, and critical thinking.</li>
                <li>Promote ethical, social, and cultural values.</li>
                <li>Foster leadership and personal development in students.</li>
                <li>Strengthen community engagement and global awareness.</li>
            </ul>
        </div>
    </div>

      <!-- Chairman Message -->
    <div class="section-block" style="flex-direction: row-reverse;">
        <div><img src="{{ asset('images/chairman.png') }}" alt="Chairman Image"></div>
        <div class="section-text">
            <h2 style="color: burlywood">Message from the Chairman</h2>
            <p>
                Welcome to the Asian College of Higher Studies (ACHS), an innovative learning center.
                As Chairman, I'm delighted and grateful to be part of ACHS. Here, you're not just an individual;
                you're part of a supportive family that stands by you through every joy and challenge.
                ACHS offers more than IT and Management studies. Students engage in Guest Lectures, Workshops, Seminars,
                and Co-curricular activities for holistic growth. Our scientific approach, from infrastructure to teaching methods,
                shapes students into market-ready professionals. Ethics and morality are vital in today's world. ACHS emphasizes these values,
                fostering better individuals and professionals who catalyze positive societal and national change.
                ACHS is dedicated to its goals. With experienced faculty and committed management, we're reaching new heights.
                Join us in our innovative journey to transform our nation.
            </p>
            <p><strong>Mr Dinesh Chandra Nakarmi - Chairman, Asian College</strong></p>
        </div>
    </div>

    <div class="section-block" style="justify-content:center; margin-top:20px;">
        <div class="social-icons">
            <a href="https://www.facebook.com/achscollege" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com/achscollege/" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.tiktok.com/@achscollege" target="_blank"><i class="fab fa-tiktok"></i></a>
        </div>
    </div>
</section>

@push('scripts')
<script>
const slides = document.querySelector('.slides');
const images = document.querySelectorAll('.slides img');
let index = 0;

function nextSlide() {
    index++;
    if(index >= images.length) index = 0;
    slides.style.transform = `translateX(-${index * 100}vw)`;
    slides.style.transition = 'transform 0.7s ease-in-out';
}

setInterval(nextSlide, 4000);

window.addEventListener('resize', () => {
    slides.style.transition = 'none';
    slides.style.transform = `translateX(-${index * 100}vw)`;
});
</script>
@endpush

@endsection
