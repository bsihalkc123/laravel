<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Asian College - Student Management System</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Roboto:wght@400;500&display=swap"
    rel="stylesheet">
  <style>
    /* General Reset */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
    }

    body {
      line-height: 1.6;
      background-color: #f5f5f5;
      color: #333;
      scroll-behavior: smooth;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    /* Navbar */
    nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 30px;
      background-color: #004080;
      color: #fff;
      position: sticky;
      top: 0;
      z-index: 1000;
      box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
      flex-wrap: wrap;
    }

    nav .logo {
      font-size: 1.7em;
      font-weight: bold;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    nav .contact-info {
      display: flex;
      gap: 25px;
      align-items: center;
      flex-wrap: wrap;
      margin-top: 10px;
    }

    nav .contact-info div {
      display: flex;
      align-items: center;
      gap: 5px;
      font-size: 0.95em;
    }

    nav .social-icons a {
      color: #fff;
      margin-left: 10px;
      font-size: 0.9em;
      transition: 0.3s;
      position: relative;
    }

    nav .social-icons a::after {
      content: '';
      position: absolute;
      width: 0%;
      height: 2px;
      left: 0;
      bottom: -2px;
      background-color: #ffcc00;
      transition: 0.3s;
    }

    nav .social-icons a:hover::after {
      width: 100%;
    }

    .from-registration {
      display: flex;
      gap: 15px;
    }

    .from-registration div {
      display: flex;
      align-items: center;
      gap: 5px;
      cursor: pointer;
      padding: 7px 18px;
      border-radius: 6px;
      transition: 0.3s;
      background-color: #0066cc;
      color: #fff;
      font-size: 0.9em;
    }

    .from-registration div:hover {
      background-color: #0052a3;
    }

    .from-registration div a {
      color: #fff;
    }

    /* Navbar Logo Styling */
    .logo {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .logo-img {
      height: 130px;
      width: auto;
      object-fit: contain;
      transition: 0.3s;
    }

    @media (max-width: 600px) {
      .logo-img {
        height: 50px;
      }
    }

    /* Slider Section */
    .hero-slider {
      position: relative;
      width: 100%;
      max-height: 550px;
      overflow: hidden;
    }

    .slides-container {
      position: relative;
      width: 100%;
      height: 100%;
    }

    .slide {
      display: none;
      width: 100%;
      height: 550px;
    }

    .slide img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .slide.active {
      display: block;
      animation: fade 1s ease-in-out;
    }

    @keyframes fade {
      from {
        opacity: 0.4;
      }
      to {
        opacity: 1;
      }
    }

    /* Arrows */
    .arrow {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      font-size: 2em;
      color: #ffcc00;
      padding: 10px;
      cursor: pointer;
      z-index: 10;
      user-select: none;
    }

    .prev {
      left: 20px;
    }

    .next {
      right: 20px;
    }

    .arrow:hover {
      color: #fff;
    }

    /* Dots */
    .dots {
      text-align: center;
      position: absolute;
      bottom: 15px;
      width: 100%;
      z-index: 10;
    }

    .dot {
      height: 12px;
      width: 12px;
      margin: 0 5px;
      display: inline-block;
      border-radius: 50%;
      background-color: rgba(255, 255, 255, 0.5);
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .dot.active {
      background-color: #ffcc00;
    }

    /* Statistics Cards */
    .stats {
      display: flex;
      justify-content: center;
      gap: 30px;
      padding: 80px 20px;
      flex-wrap: wrap;
      background-color: #f0f4f8;
    }

    .card {
      background: linear-gradient(135deg, #004080, #0066cc);
      flex: 1 1 250px;
      max-width: 300px;
      padding: 35px 20px;
      border-radius: 15px;
      text-align: center;
      color: #fff;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
      transition: 0.5s;
      position: relative;
      overflow: hidden;
    }

    .card i {
      font-size: 3.5em;
      margin-bottom: 15px;
      transition: 0.3s;
    }

    .card h3 {
      margin-bottom: 10px;
      font-size: 1.5em;
    }

    .card p {
      font-size: 1em;
      color: #f0f0f0;
    }

    .card:hover {
      transform: translateY(-8px) rotate(1deg);
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
    }

    /* Footer / Contact Form */
    footer {
      background-color: #004080;
      color: #fff;
      padding: 70px 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    footer h3 {
      margin-bottom: 25px;
      font-size: 2em;
      font-weight: 600;
    }

    footer form {
      display: flex;
      flex-direction: column;
      width: 100%;
      max-width: 500px;
      gap: 20px;
      background-color: #fff;
      padding: 35px;
      border-radius: 15px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
      color: #333;
    }

    footer .form-group {
      position: relative;
    }

    footer input,
    footer textarea,
    footer select {
      padding: 14px 15px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 1em;
      width: 100%;
      outline: none;
      transition: 0.3s;
    }

    footer input:focus,
    footer textarea:focus,
    footer select:focus {
      border-color: #004080;
      box-shadow: 0 0 5px #ffcc00;
    }

    footer label {
      position: absolute;
      top: -8px;
      left: 12px;
      background-color: #fff;
      padding: 0 5px;
      font-size: 0.85em;
      color: #004080;
      font-weight: 500;
    }

    footer button {
      padding: 14px;
      border: none;
      border-radius: 8px;
      background: linear-gradient(135deg, #ffcc00, #e6b800);
      color: #004080;
      font-weight: bold;
      font-size: 1em;
      cursor: pointer;
      transition: 0.4s;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    footer button:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
    }

    .success-msg {
      background-color: #d4edda;
      color: #155724;
      padding: 12px;
      border-radius: 8px;
      margin-bottom: 15px;
      text-align: center;
      font-weight: 500;
    }

    /* Responsive */
    @media (max-width: 768px) {
      nav {
        flex-direction: column;
        align-items: flex-start;
      }

      nav .contact-info {
        flex-direction: column;
        gap: 10px;
        margin-top: 10px;
      }

      .stats {
        flex-direction: column;
        align-items: center;
      }
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav>
    <div class="logo">
      <img src="{{ asset('logo.png') }}" alt="Asian College Logo" class="logo-img">
      <span>Asian College</span>x
    </div>
    <div class="contact-info">
      <div><i class="fas fa-map-marker-alt"></i> Ekantakuna Kathmandu, Nepal</div>
      <div><i class="fas fa-phone"></i> 01-5912727</div>
      <div class="social-icons">
        <a href="https://www.facebook.com/achscollege"><i class="fab fa-facebook-f"></i> Facebook</a>
        <a href="https://www.instagram.com/achscollege/"><i class="fab fa-instagram"></i> Instagram</a>
        <a href="https://www.tiktok.com/@achscollege"><i class="fab fa-tiktok"></i> TikTok</a>
      </div>
      <div class="from-registration">
        <div>
          <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a>
        </div>
      </div>
    </div>
  </nav>

 <!-- Slider Section -->
<section class="hero-slider">
  <div class="slides-container">
    <div class="slide active">
      <img src="{{ asset('images/slider/graduation.jpg') }}" alt="Graduation">
    </div>
    <div class="slide">
      <img src="{{ asset('images/slider/culturalfest.jpg') }}" alt="Cultural Festa">
    </div>
    <div class="slide">
      <img src="{{ asset('images/slider/defenseproject.jpg') }}" alt="Defense Project">
    </div>
    <div class="slide">
      <img src="{{ asset('images/slider/holi.jpg') }}" alt="Holi Celebration">
    </div>
    <div class="slide">
      <img src="{{ asset('images/slider/orientation.jpg') }}" alt="Orientation">
    </div>

    <!-- Arrows -->
    <div class="arrow prev">&#10094;</div>
    <div class="arrow next">&#10095;</div>

    <!-- Navigation Dots -->
    <div class="dots">
      <span class="dot active"></span>
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
    </div>
  </div>
</section>


  <!-- Statistics Cards -->
  <section class="stats" id="stats">
    <div class="card">
      <i class="fas fa-user-graduate"></i>
      <h3>Students</h3>
      <p>1,250 enrolled students across all programs</p>
    </div>
    <div class="card">
      <i class="fas fa-book"></i>
      <h3>Courses</h3>
      <p>45 academic courses covering multiple disciplines</p>
    </div>
    <div class="card">
      <i class="fas fa-file-alt"></i>
      <h3>Exams & Results</h3>
      <p>100% exam tracking with instant result notifications</p>
    </div>
  </section>

  <!-- Footer / Contact Form -->
  <footer>
    <h3>Contact Us</h3>

    @if(session('success'))
    <div class="success-msg">
      {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('contactus.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="full_name" placeholder="Your Name" required maxlength="255">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" placeholder="Your Email" required maxlength="255">
      </div>
      <div class="form-group">
        <label>Request Type</label>
        <select name="request_type" required>
          <option value="" disabled selected>Select your request</option>
          <option value="general">General</option>
          <option value="technical">Technical</option>
          <option value="payment">Payment</option>
          <option value="feedback">Feedback</option>
        </select>
      </div>
      <div class="form-group">
        <label>Message</label>
        <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
      </div>
      <button type="submit"><i class="fas fa-paper-plane"></i> Send Message</button>
    </form>
  </footer>

  <!-- Slider JS -->
  <script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');

    function showSlide(index) {
      if (index >= slides.length) currentSlide = 0;
      else if (index < 0) currentSlide = slides.length - 1;
      else currentSlide = index;

      slides.forEach((slide, i) => {
        slide.classList.toggle('active', i === currentSlide);
        dots[i].classList.toggle('active', i === currentSlide);
      });
    }

    document.querySelector('.next').addEventListener('click', () => showSlide(currentSlide + 1));
    document.querySelector('.prev').addEventListener('click', () => showSlide(currentSlide - 1));

    dots.forEach((dot, i) => {
      dot.addEventListener('click', () => showSlide(i));
    });

    setInterval(() => showSlide(currentSlide + 1), 5000);
  </script>
</body>

</html>
