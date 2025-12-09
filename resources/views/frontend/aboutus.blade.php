<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us - Asian College</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">

  <style>
    * { margin:0; padding:0; box-sizing:border-box; font-family:'Poppins', sans-serif; }
    body { background:#f5f5f5; color:#333; line-height:1.6; }
    nav { display:flex; justify-content:space-between; align-items:center; padding:15px 30px; background:linear-gradient(135deg,#004080,#0066cc); color:#fff; flex-wrap:wrap; box-shadow:0 4px 15px rgba(0,0,0,0.1); position:sticky; top:0; z-index:1000; }
    nav .logo-img { max-height:70px; object-fit:contain; }
    nav ul { list-style:none; display:flex; gap:25px; align-items:center; flex-wrap:wrap; margin:0; padding:0; }
    nav ul li a { color:#fff; text-decoration:none; font-weight:600; transition:0.3s; padding:8px 10px; border-radius:5px; }
    nav ul li a:hover { background:#ffcc00; color:#004080; }
    .from-registration div a { color:#004080; font-weight:600; text-decoration:none; background:#ffcc00; padding:8px 15px; border-radius:6px; transition:0.3s; display:flex; align-items:center; gap:8px; }
    .from-registration div a:hover { background:#e6b800; }
    
    .about-us { background:#f0f4f8; color:#333; padding:60px 20px; }
    .about-us img { max-width:100%; height:auto; border-radius:15px; box-shadow:0 8px 20px rgba(0,0,0,0.1); }
    .about-us h2 { font-size:2.2em; margin-bottom:20px; color:#004080; }
    .about-us h3 { font-size:1.5em; margin-bottom:10px; color:#0066cc; }
    .about-us p { margin-bottom:15px; }
    .about-us ul { list-style:disc; margin-left:20px; line-height:1.6; }
    .social-icons a { display:inline-flex; justify-content:center; align-items:center; width:45px; height:45px; border-radius:50%; background:#004080; color:#fff; margin-right:15px; transition:all 0.3s; font-size:1.2em; }
    .social-icons a:hover { background:#ffcc00; color:#004080; transform:scale(1.1); }

    @media (max-width:768px) { 
      nav { flex-direction:column; gap:20px; } 
      .about-us div { flex:1 1 100% !important; text-align:center; } 
    }
  </style>
</head>
<body>

  <!-- NAVBAR -->
  <nav>
    <div class="logo">
      <a href="{{ route('frontdashboard') }}">
        <img src="{{ asset('images/college logo.webp') }}" class="logo-img" alt="Asian College Logo">
      </a>
    </div>

    <ul>
      <li><a href="{{ route('frontdashboard') }}">Home</a></li>
      <li><a href="#aboutus-heading">About Us</a></li>
      <li><a href="{{ route('programs') }}">Program</a></li>
      <li><a href="{{ route('news') }}">News & Events</a></li>
    </ul>

    <div class="from-registration">
      <div><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a></div>
    </div>
  </nav>

  <!-- ABOUT US SECTION -->
  <section class="about-us" id="aboutus-heading">
    <div style="max-width:1200px; margin:0 auto; display:flex; flex-wrap:wrap; gap:40px; align-items:flex-start; justify-content:center;">
      <div style="flex:1 1 300px; text-align:center;">
        <img src="{{ asset('images/college logo.webp') }}" alt="Asian College campus view">
      </div>
      <div style="flex:1 1 500px;">
        <h2>About Asian College</h2>
        <p>Asian College has been a hub of quality education and innovation for students seeking to excel academically and personally. Our college fosters an environment where learning goes beyond the classroom, preparing students for leadership, research, and career opportunities.</p>
        
        <h3>Vision</h3>
        <p>To be a premier educational institution recognized for excellence in academic achievement, research, and holistic student development.</p>
        
        <h3>Mission</h3>
        <p>To provide quality education, innovative learning experiences, and opportunities for personal growth to empower our students to become responsible global citizens.</p>
        
        <h3>Key Highlights</h3>
        <ul>
          <li>Experienced and qualified faculty members</li>
          <li>State-of-the-art labs and learning facilities</li>
          <li>Diverse academic programs and courses</li>
          <li>Active cultural, sports, and co-curricular activities</li>
          <li>Strong placement and career guidance support</li>
        </ul>

        <div class="social-icons" style="margin-top:20px;">
          <a href="https://www.facebook.com/achscollege" target="_blank" title="Facebook"><i class="fab fa-facebook"></i></a>
          <a href="https://www.instagram.com/achscollege/" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
          <a href="https://www.tiktok.com/@achscollege" target="_blank" title="TikTok"><i class="fab fa-tiktok"></i></a>
        </div>
      </div>
    </div>
  </section>

</body>
</html>
