<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Asian College - Student Management System</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
    }

    /* Navbar */
    nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 30px;
      background-color: #004080;
      color: #fff;
      flex-wrap: wrap;
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    nav .logo {
      font-size: 1.5em;
      font-weight: bold;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    nav .contact-info {
      display: flex;
      gap: 20px;
      align-items: center;
      flex-wrap: wrap;
      margin-top: 10px;
    }

    nav .contact-info div {
      display: flex;
      align-items: center;
      gap: 5px;
    }

    nav .social-icons a {
      color: #fff;
      margin-left: 10px;
      text-decoration: none;
      font-size: 1em;
      transition: 0.3s;
    }

    nav .social-icons a:hover {
      color: #ffcc00;
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
      padding: 5px 15px;
      border-radius: 5px;
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
      text-decoration: none;
    }

    /* Hero Section */
    .hero {
      background: linear-gradient(rgba(0, 64, 128, 0.7), rgba(0, 64, 128, 0.7)),
        url('https://images.unsplash.com/photo-1596495577886-d920f4c5a182?auto=format&fit=crop&w=1470&q=80') center/cover no-repeat;
      color: #fff;
      min-height: 500px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 0 20px;
    }

    .hero h1 {
      font-size: 3em;
      margin-bottom: 20px;
      animation: fadeInDown 1s ease-in-out;
    }

    .hero p {
      font-size: 1.3em;
      margin-bottom: 30px;
      max-width: 700px;
      animation: fadeInUp 1s ease-in-out;
    }

    .hero .btn {
      padding: 15px 30px;
      font-size: 1.1em;
      background-color: #ffcc00;
      color: #004080;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s;
      font-weight: bold;
      margin: 5px;
    }

    .hero .btn:hover {
      background-color: #e6b800;
    }

    @keyframes fadeInDown {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Statistics Cards */
    .stats {
      display: flex;
      justify-content: center;
      gap: 30px;
      padding: 60px 20px;
      flex-wrap: wrap;
      background-color: #f0f4f8;
    }

    .card {
      background-color: #fff;
      flex: 1 1 250px;
      max-width: 300px;
      padding: 30px 20px;
      border-radius: 10px;
      text-align: center;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      transition: 0.3s;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    .card i {
      font-size: 3em;
      color: #004080;
      margin-bottom: 15px;
    }

    .card h3 {
      margin-bottom: 10px;
      font-size: 1.5em;
      color: #004080;
    }

    .card p {
      font-size: 1em;
      color: #555;
    }

    /* Footer / Contact Form */
    footer {
      background-color: #004080;
      color: #fff;
      padding: 60px 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    footer h3 {
      margin-bottom: 20px;
      font-size: 1.8em;
    }

    footer form {
      display: flex;
      flex-direction: column;
      width: 100%;
      max-width: 500px;
      gap: 15px;
      background-color: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      color: #333;
    }

    footer input,
    footer textarea,
    footer select {
      padding: 12px 15px;
      border-radius: 6px;
      border: 1px solid #ccc;
      font-size: 1em;
      width: 100%;
    }

    footer input:focus,
    footer textarea:focus,
    footer select:focus {
      outline: 2px solid #ffcc00;
    }

    footer button {
      padding: 12px;
      border: none;
      border-radius: 6px;
      background-color: #ffcc00;
      color: #004080;
      font-weight: bold;
      font-size: 1em;
      cursor: pointer;
      transition: 0.3s;
    }

    footer button:hover {
      background-color: #e6b800;
    }

    .success-msg {
      background-color: #d4edda;
      color: #155724;
      padding: 12px;
      border-radius: 8px;
      margin-bottom: 15px;
      text-align: center;
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

      .from-registration {
        gap: 10px;
      }

      .hero h1 {
        font-size: 2.2em;
      }

      .hero p {
        font-size: 1.1em;
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
      <i class="fas fa-graduation-cap"></i>
      Asian College
    </div>
    <div class="contact-info">
      <div><i class="fas fa-map-marker-alt"></i> Ekantakuna Kathmandu, Nepal</div>
      <div><i class="fas fa-phone"></i> 01-5912727</div>
      <div class="social-icons">
        <a href="#"><i class="fab fa-facebook-f"></i> Facebook</a>
        <a href="#"><i class="fab fa-instagram"></i> Instagram</a>
        <a href="#"><i class="fab fa-tiktok"></i> TikTok</a>
      </div>
      <div class="from-registration">
        <div>
          <a href="{{ route('login') }}">
            <i class="fas fa-sign-in-alt"></i> Login
          </a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <h1>Welcome to Asian College</h1>
    <p>Your complete student management system for courses, exams, results, and more. Simplifying academic
      administration with modern tools and real-time insights.</p>
    <div>
      <button class="btn" onclick="window.location='{{ route('login') }}'">Get Started</button>
      <button class="btn" style="background-color:#fff;color:#004080;" onclick="document.getElementById('stats').scrollIntoView({behavior:'smooth'});">Learn More</button>
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

    <input type="text" name="full_name" placeholder="Your Name" required maxlength="255">
    <input type="email" name="email" placeholder="Your Email" required maxlength="255">

    <div class="custom-select">
        <select name="request_type" required>
            <option value="" disabled selected>Select your request</option>
            <option value="general">General</option>
            <option value="technical">Technical</option>
            <option value="payment">Payment</option>
            <option value="feedback">Feedback</option>
        </select>
    </div>

    <textarea name="message" rows="5" placeholder="Your Message" required></textarea>

    <button type="submit"><i class="fas fa-paper-plane"></i> Send Message</button>
</form>

  </footer>
</body>

</html>