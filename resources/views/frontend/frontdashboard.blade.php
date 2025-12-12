<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Asian College - Student Management System</title>
  
  <meta name="description" content="Asian College Student Management System - Ekantakuna, Kathmandu">
  <meta name="keywords" content="college, student management, education, Nepal, Kathmandu">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">

  <style>
    /* BASE STYLES */
    * { margin:0; padding:0; box-sizing:border-box; font-family: 'Poppins', sans-serif; }
    body { background: #f5f5f5; color:#333; line-height:1.6; scroll-behavior: smooth; }

    /* NAVBAR */
    nav { display:flex; justify-content:space-between; align-items:center; padding:15px 30px; background:linear-gradient(135deg,#004080,#0066cc); color:#fff; position:sticky; top:0; z-index:1000; flex-wrap:wrap; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
    nav .logo-img { height:auto; width:auto; max-height:70px; object-fit:contain; }
    .from-registration div { padding: 10px 20px; background: #ffcc00; border-radius:6px; transition:0.3s; min-width:100px; text-align:center; }
    .from-registration div:hover { background:#e6b800; transform:translateY(-2px); }
    .from-registration a { color:#004080; font-weight:600; text-decoration:none; display:flex; align-items:center; gap:8px; }

    /* SLIDER */
    .hero-slider { position: relative; width: 100%; max-height: 550px; overflow: hidden; }
    .slide { display: none; height: 550px; }
    .slide img { width: 100%; height: 100%; object-fit: cover; }
    .slide.active { display: block; animation: fade 1s ease-in-out; }
    @keyframes fade { from { opacity: 0.3; } to { opacity: 1; } }
    .arrow { position:absolute; top:50%; transform:translateY(-50%); color:#ffcc00; font-size:2.5rem; cursor:pointer; padding:10px 15px; background: rgba(0,0,0,0.3); border-radius:50%; z-index:10; transition: all 0.3s ease; }
    .arrow:hover { background: rgba(0,0,0,0.5); transform:translateY(-50%) scale(1.1); }
    .prev { left:20px; }
    .next { right:20px; }
    .dots { position:absolute; bottom:20px; width:100%; text-align:center; }
    .dot { height:14px; width:14px; background: rgba(255,255,255,0.5); border-radius:50%; display:inline-block; margin:0 8px; cursor:pointer; transition:all 0.3s ease; border:2px solid transparent; }
    .dot:hover { background: rgba(255,255,255,0.8); }
    .dot.active { background:#ffcc00; transform: scale(1.2); }

    /* STATS */
    .stats { display:flex; gap:30px; justify-content:center; padding:80px 20px; flex-wrap:wrap; }
    .card { background: linear-gradient(135deg,#004080,#0066cc); color:#fff; width:300px; padding:35px 20px; border-radius:15px; text-align:center; box-shadow:0 8px 25px rgba(0,0,0,0.1); transition:all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
    .card:hover { transform: translateY(-8px) scale(1.02); box-shadow:0 15px 35px rgba(0,0,0,0.2); }
    .card i { font-size:3.5em; margin-bottom:15px; }
    .card h3 { font-size:1.8em; margin-bottom:10px; }
    .card p { font-size:1.1em; opacity:0.9; }

    /* FOOTER CONTACT FORM */
    footer { background:#004080; color:white; padding:70px 20px; text-align:center; }
    footer h3 { font-size:2.2em; margin-bottom:40px; color:#ffcc00; }
    footer form { width:100%; max-width:500px; margin:0 auto 40px; background:white; padding:35px; border-radius:15px; color:#333; box-shadow:0 8px 25px rgba(0,0,0,0.15); }
    footer label { display:block; text-align:left; margin:15px 0 5px; font-weight:600; color:#004080; }
    footer input, footer textarea, footer select { width:100%; padding:14px; border-radius:8px; border:1px solid #ccc; margin-top:5px; outline:none; font-size:1em; transition:border 0.3s ease; }
    footer input:focus, footer textarea:focus, footer select:focus { border:2px solid #0066cc; outline:none; }
    footer input:invalid, footer select:invalid, footer textarea:invalid { border-color:#dc3545; }
    footer button { background:linear-gradient(135deg,#ffcc00,#e6b800); border:none; padding:16px; width:100%; border-radius:8px; margin-top:20px; font-size:1.1em; color:#004080; cursor:pointer; transition: all 0.3s ease; font-weight:600; display:flex; align-items:center; justify-content:center; gap:10px; }
    footer button:hover { transform:translateY(-2px); box-shadow:0 5px 15px rgba(255,204,0,0.3); }
    footer button:active { transform:translateY(0); }
    footer button:focus { outline:3px solid #004080; outline-offset:2px; }

    /* MESSAGES */
    .success-msg { background:#d4edda; color:#155724; padding:15px; border-radius:8px; margin-bottom:20px; border-left:4px solid #28a745; }
    .error-msg { background:#f8d7da; color:#721c24; padding:10px; border-radius:4px; margin-top:5px; font-size:0.9em; border-left:4px solid #dc3545; }

    /* ABOUT US */
    .about-us { background:#f0f4f8; color:#333; padding:60px 20px; }
    .about-us img { max-width:100%; height:auto; border-radius:15px; box-shadow:0 8px 20px rgba(0,0,0,0.1); }
    .about-us h2 { font-size:2.2em; margin-bottom:20px; color:#004080; }
    .about-us h3 { font-size:1.5em; margin-bottom:10px; color:#0066cc; }
    .about-us h4 { font-size:1.5em; margin-top:20px; color:#0066cc; }
    .about-us ul { list-style: disc; margin-left: 20px; line-height: 1.6; }

    /* SOCIAL BUBBLES */
    .social-bubble {
      display:flex; align-items:center; justify-content:center;
      width:50px; height:50px; background:#004080; color:#fff;
      border-radius:50%; font-size:1.5em; transition: all 0.3s ease;
      text-decoration:none; box-shadow:0 4px 10px rgba(0,0,0,0.2);
    }
    .social-bubble:hover {
      background:#ffcc00; color:#004080;
      transform: scale(1.2) rotate(10deg);
      box-shadow:0 6px 15px rgba(0,0,0,0.3);
    }

    /* RESPONSIVE */
    @media (max-width: 768px) { nav { flex-direction: column; gap: 20px; } }
  </style>
</head>

<body>

 <!-- NAVBAR -->
<nav aria-label="Main navigation">
  <div class="logo">
    <a href="{{ route('frontdashboard') }}" aria-label="Go to homepage">
      <img src="{{ asset('images/college logo.webp') }}" class="logo-img" alt="Asian College Logo" loading="lazy">
    </a>
  </div>

  <!-- NAVIGATION LINKS -->
  <ul style="list-style:none; display:flex; gap:25px; align-items:center; flex-wrap:wrap; margin:0; padding:0;">
    <li><a href="{{ route('frontdashboard') }}" style="color:yellow; text-decoration:none; font-weight:600;">Home</a></li>
    <li><a href="{{ route('aboutus') }}" style="color:yellow; text-decoration:none; font-weight:600;">About Us</a></li>
    <li><a href="{{ route('programs') }}" style="color:yellow; text-decoration:none; font-weight:600;">Program</a></li>
    <li><a href="{{ route('newsandevents') }}" style="color:yellow; text-decoration:none; font-weight:600;">News & Events</a></li>
  </ul>

  <div class="from-registration">
    <div><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a></div>
  </div>
</nav>

  <main id="main-content">

    <!-- SLIDER -->
    <section class="hero-slider" aria-label="Image carousel">
      <div class="slide active"><img src="{{ asset('images/slider/graduation.jpg') }}" alt="Graduation ceremony" loading="lazy"></div>
      <div class="slide"><img src="{{ asset('images/slider/culturalfest.jpg') }}" alt="Cultural festival" loading="lazy"></div>
      <div class="slide"><img src="{{ asset('images/slider/defenseproject.jpg') }}" alt="Final year project defense" loading="lazy"></div>
      <div class="slide"><img src="{{ asset('images/slider/holi.jpg') }}" alt="Holi celebration" loading="lazy"></div>
      <div class="slide"><img src="{{ asset('images/slider/orientation.jpg') }}" alt="New student orientation" loading="lazy"></div>
      <div class="arrow prev" tabindex="0" role="button">&#10094;</div>
      <div class="arrow next" tabindex="0" role="button">&#10095;</div>
      <div class="dots">
        <span class="dot active" tabindex="0"></span>
        <span class="dot" tabindex="0"></span>
        <span class="dot" tabindex="0"></span>
        <span class="dot" tabindex="0"></span>
        <span class="dot" tabindex="0"></span>
      </div>
    </section>

    <!-- STATS -->
    <section class="stats">
      <div class="card"><i class="fas fa-user-graduate"></i><h3>Students</h3><p>1,250 enrolled students</p></div>
      <div class="card"><i class="fas fa-book"></i><h3>Courses</h3><p>45 academic courses</p></div>
      <div class="card"><i class="fas fa-file-alt"></i><h3>Exams & Results</h3><p>100% exam tracking</p></div>
    </section>

    <!-- CONTACT FORM -->
    <footer>
      <h3>Contact Us</h3>
      @if(session('success'))
        <div class="success-msg"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
      @endif
      @if($errors->any())
        <div class="error-msg"><i class="fas fa-exclamation-circle"></i>
          @foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach
        </div>
      @endif
<footer>


    {{-- Success message --}}
    @if(session('success'))
        <div class="success-msg">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    {{-- Validation errors --}}
    @if($errors->any())
        <div class="error-msg">
            <i class="fas fa-exclamation-circle"></i>
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    {{-- Contact form --}}
    <form method="POST" action="{{ route('contactus.store') }}" enctype="multipart/form-data">
        @csrf
        {{-- Honeypot for spam --}}
        <input type="text" name="honeypot" style="display:none;" tabindex="-1" autocomplete="off">

        <label for="full_name">Name *</label>
        <input type="text" id="full_name" name="full_name" required minlength="2" maxlength="100"
               value="{{ old('full_name') }}">

        <label for="email">Email *</label>
        <input type="email" id="email" name="email" required value="{{ old('email') }}">

        <label for="request_type">Request Type *</label>
        <select id="request_type" name="request_type" required>
            <option value="" disabled {{ old('request_type') ? '' : 'selected' }}>Select a request type</option>
            <option value="general" {{ old('request_type')=='general'?'selected':'' }}>General Inquiry</option>
            <option value="technical" {{ old('request_type')=='technical'?'selected':'' }}>Technical Support</option>
            <option value="payment" {{ old('request_type')=='payment'?'selected':'' }}>Payment Issue</option>
            <option value="feedback" {{ old('request_type')=='feedback'?'selected':'' }}>Feedback/Suggestion</option>
            <option value="admission" {{ old('request_type')=='admission'?'selected':'' }}>Admission Query</option>
        </select>

        <label for="message">Message *</label>
        <textarea id="message" name="message" rows="5" required minlength="10" maxlength="500">{{ old('message') }}</textarea>
        <div style="text-align:right; font-size:0.9em; color:#666; margin-top:5px;">
            <span id="charCount">500 characters remaining</span>
        </div>

        {{-- File attachment --}}
        <label for="attachment">Attach File (optional)</label>
        <input type="file" id="attachment" name="attachment" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx">

        <button type="submit"><i class="fas fa-paper-plane"></i> Send Message</button>
        <small style="display:block; margin-top:10px; color:#444;">* Required fields</small>
    </form>

</footer>

    <!-- ABOUT US -->
    <section class="about-us" aria-labelledby="aboutus-heading">
      <div style="max-width:1200px; margin:0 auto; display:flex; flex-wrap:wrap; gap:40px; align-items:flex-start; justify-content:center;">
        <div style="flex:1 1 300px; text-align:center;">
          <img src="{{ asset('images/college logo.webp') }}" alt="Asian College campus view" loading="lazy">
          <span style="display:block; margin-top:10px; font-size:24px; font-weight:700;">
           Asian College of Higher Studies
          </span>
          <!-- Partners Section -->
  <h3 style="margin-top:30px; color:#004080;">Our Accreditation & Partners</h3>
  <p style="color:#444; max-width:280px; margin:10px auto 20px auto; font-size:0.95em;">
    ACHS College, a leading IT and business college in Nepal, is accredited by top educational bodies.
  </p>
  <div style="display:flex; flex-wrap:wrap; gap:15px; justify-content:center; align-items:center;">
    <img src="{{ asset('images/Ekbana.png') }}" alt="EKbana" style="height:50px; object-fit:contain;">
    <img src="{{ asset('images/cloudhimalaya.png') }}" alt="Cloud Himalaya" style="height:50px; object-fit:contain;">
    <img src="{{ asset('images/inficare.png') }}" alt="Inficare" style="height:50px; object-fit:contain;">
  </div>
        </div>
        <div style="flex:1 1 400px;">
          <h2 id="aboutus-heading">About Asian College</h2>
          <h3>Programs</h3>
          <ul>
            <li><a href="{{ route('programs.csit') }}" style="color:#cc0000">BSC.CSIT</a></li>
            <li><a href="{{ route('programs.bca') }}" style="color:#cc0000">BCA</a></li>
            <li><a href="{{ route('programs.bbm') }}" style="color:#cc0000">BBM</a></li>
            <li><a href="{{ route('programs.bbs') }}" style="color:#cc0000">BBS</a></li>
          </ul>
          <h3>Quick Links</h3>
          <ul>
          <li><a href="{{ route('aboutus') }}" style="color:#cc0000">About</a></li>
          <li><a href="{{ route('newsandevents') }}" style="color:#cc0000">News & Events</a></li>
          <li><a href="{{ route('programs') }}" style="color:#cc0000">Programs</a></li>
          </ul>
          <h3>Contact Info</h3>
        <ul style="list-style:none; padding:0; margin:0; line-height:1.8;">
        <li><strong>Email:</strong> <span style="color:#cc0000;">info@achs.edu.np</span></li>
        <li><strong>Phone:</strong> <span style="color:#cc0000;">01-5912727</span></li>
        <li><strong>Mobile:</strong> <span style="color:#cc0000;">+977-9765341484</span></li>
        </ul>

          <h4 id="location" style="margin-top:20px; color:#0066cc; font-weight:700;">Location</h4>
          <p style="color:#444;">Ekantakuna, Kathmandu, Nepal</p>

          <div class="social-icons" style="margin-top:20px; display:flex; gap:15px;">
            <a href="https://www.facebook.com/achscollege" target="_blank" class="social-bubble"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com/achscollege/" target="_blank" class="social-bubble"><i class="fab fa-instagram"></i></a>
            <a href="https://www.tiktok.com/@achscollege" target="_blank" class="social-bubble"><i class="fab fa-tiktok"></i></a>
          </div>
        </div>
      </div>
    </section>

  </main>

  <script>
    // CHARACTER COUNT
    const textarea = document.getElementById('message');
    const charCount = document.getElementById('charCount');
    textarea.addEventListener('input', () => {
      const remaining = 500 - textarea.value.length;
      charCount.textContent = remaining + ' characters remaining';
    });

    // SLIDER
    let slideIndex = 0;
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');
    const showSlide = n => { slides.forEach((s,i)=>s.classList.toggle('active',i===n)); dots.forEach((d,i)=>d.classList.toggle('active',i===n)); };
    const nextSlide = () => { slideIndex = (slideIndex+1)%slides.length; showSlide(slideIndex); };
    const prevSlide = () => { slideIndex = (slideIndex-1+slides.length)%slides.length; showSlide(slideIndex); };
    document.querySelector('.next').addEventListener('click', nextSlide);
    document.querySelector('.prev').addEventListener('click', prevSlide);
    dots.forEach((dot,i)=>dot.addEventListener('click',()=>{slideIndex=i; showSlide(i);}));
    setInterval(nextSlide, 7000);
  </script>

</body>
</html>
