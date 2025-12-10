<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Asian College</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <style>
        /* COMMON STYLES */
        * { margin:0; padding:0; box-sizing:border-box; font-family:'Poppins', sans-serif; }
        body { background:#f5f5f5; color:#333; line-height:1.6; }

        /* NAVBAR */
        nav {
            display:flex; justify-content:space-between; align-items:center; padding:15px 30px;
            background:linear-gradient(135deg,#004080,#0066cc); color:#fff; flex-wrap:wrap;
            box-shadow:0 4px 15px rgba(0,0,0,0.1); position:sticky; top:0; z-index:1000;
        }
        nav .logo-img { max-height:70px; object-fit:contain; }
        nav ul { list-style:none; display:flex; gap:25px; align-items:center; flex-wrap:wrap; margin:0; padding:0; }
        nav ul li a { color:#fff; text-decoration:none; font-weight:600; transition:0.3s; padding:8px 10px; border-radius:5px; }
        nav ul li a:hover { background:#ffcc00; color:#004080; }
        .from-registration div a { color:#004080; font-weight:600; text-decoration:none; background:#ffcc00; padding:8px 15px; border-radius:6px; transition:0.3s; display:flex; align-items:center; gap:8px; }
        .from-registration div a:hover { background:#e6b800; }

        /* FOOTER */
        footer { text-align:center; padding:2rem; background-color:#1f2937; color:white; }

        /* SLIDER */
        .slider { width:100vw; height:600px; overflow:hidden; position:relative; margin-bottom:40px; }
        .slides { display:flex; height:100%; transition:transform 0.7s ease-in-out; }
        .slides img { width:100vw; height:100%; object-fit:cover; }
        /* SLIDER STYLES */
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


        /* Responsive */
        @media (max-width:768px) { 
            nav { flex-direction:column; gap:20px; } 
            .slider { height:400px; }
        }
    </style>

    @stack('styles')
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
        <li><a href="{{ route('aboutus') }}">About Us</a></li>
        <li><a href="{{ route('programs') }}">Programs</a></li>
        <li><a href="{{ route('newsandevents') }}">News & Events</a></li>
    </ul>

    <div class="from-registration">
        <div>
            <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a>
        </div>
    </div>
</nav>

<!-- PAGE CONTENT -->
<main>
    @yield('content')
</main>

<!-- FOOTER -->
<footer>
    &copy; 2025 Asian College. All rights reserved.
</footer>

@stack('scripts')
</body>
</html>
