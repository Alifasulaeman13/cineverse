<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineVerse - Your Ultimate Cinema Experience</title>
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-teal: #14b8a6;
            --primary-cyan: #06b6d4;
            --dark-bg: #0a0e17;
            --medium-bg: #1a1f2e;
            --accent-gold: #fbbf24;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0a0e17 0%, #0f1419 50%, #0a0e17 100%);
            color: #f8fafc;
            overflow-x: hidden;
        }

        /* === NAVIGATION === */
        .navbar-custom {
            background: rgba(26, 31, 46, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(20, 184, 166, 0.15);
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .navbar-custom.scrolled {
            background: rgba(15, 20, 25, 0.98);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.3);
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, #14b8a6 0%, #06b6d4 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-link-custom {
            color: #94a3b8 !important;
            margin: 0 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link-custom::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(135deg, #14b8a6 0%, #06b6d4 100%);
            transition: width 0.3s ease;
        }

        .nav-link-custom:hover {
            color: #14b8a6 !important;
        }

        .nav-link-custom:hover::after {
            width: 100%;
        }

        .btn-auth {
            padding: 0.5rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .btn-login {
            color: #14b8a6;
            border-color: rgba(20, 184, 166, 0.3);
        }

        .btn-login:hover {
            background: rgba(20, 184, 166, 0.1);
            border-color: #14b8a6;
        }

        .btn-register {
            background: linear-gradient(135deg, #14b8a6 0%, #06b6d4 100%);
            color: white;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(20, 184, 166, 0.3);
        }

        /* === HERO SECTION === */
        .hero-section {
            margin-top: 80px;
            min-height: 90vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 50%, rgba(20, 184, 166, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 50%, rgba(6, 182, 212, 0.15) 0%, transparent 50%);
            z-index: 0;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-title {
            font-size: 4rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            animation: fadeInUp 1s ease;
        }

        .gradient-text {
            background: linear-gradient(135deg, #14b8a6 0%, #06b6d4 50%, #fbbf24 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-subtitle {
            font-size: 1.3rem;
            color: #94a3b8;
            margin-bottom: 2rem;
            animation: fadeInUp 1s ease 0.2s both;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            animation: fadeInUp 1s ease 0.4s both;
        }

        .btn-primary-custom {
            padding: 1rem 2.5rem;
            background: linear-gradient(135deg, #14b8a6 0%, #06b6d4 100%);
            border: none;
            border-radius: 12px;
            color: white;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary-custom::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
        }

        .btn-primary-custom:hover::before {
            left: 100%;
        }

        .btn-primary-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(20, 184, 166, 0.4);
        }

        .btn-secondary-custom {
            padding: 1rem 2.5rem;
            background: transparent;
            border: 2px solid #14b8a6;
            border-radius: 12px;
            color: #14b8a6;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .btn-secondary-custom:hover {
            background: rgba(20, 184, 166, 0.1);
            transform: translateY(-3px);
        }

        /* === MOVIE CARDS === */
        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
            padding-bottom: 1rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(135deg, #14b8a6 0%, #06b6d4 100%);
            border-radius: 2px;
        }

        /* Movie Cards Container - Equal Height */
        .row.g-4 > [class*="col-"] {
            display: flex;
        }

        .movie-card {
            background: linear-gradient(135deg, #1a1f2e 0%, #1a2533 100%);
            border: 1px solid rgba(45, 55, 72, 0.8);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            height: 100%;
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .movie-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(20, 184, 166, 0.1) 0%, rgba(6, 182, 212, 0.1) 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: 1;
        }

        .movie-card:hover::before {
            opacity: 1;
        }

        .movie-card:hover {
            transform: translateY(-15px) scale(1.02);
            border-color: rgba(20, 184, 166, 0.5);
            box-shadow: 
                0 20px 40px rgba(6, 182, 212, 0.3),
                0 0 0 2px rgba(6, 182, 212, 0.1);
        }

        .movie-poster {
            width: 100%;
            height: 400px;
            object-fit: cover;
            position: relative;
            flex-shrink: 0;
        }

        .movie-card-body {
            padding: 1.5rem;
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .movie-title {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: #f8fafc;
            min-height: 2.6rem;
            line-height: 1.3;
        }

        .movie-genre {
            color: #94a3b8;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            min-height: 1.3rem;
        }

        .movie-rating {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .rating-stars {
            color: #fbbf24;
        }

        .btn-book {
            width: 100%;
            padding: 0.75rem;
            background: linear-gradient(135deg, #14b8a6 0%, #06b6d4 100%);
            border: none;
            border-radius: 10px;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
            margin-top: auto;
        }

        .btn-book:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(20, 184, 166, 0.4);
        }

        /* === FEATURES === */
        .features-section {
            padding: 5rem 0;
            background: linear-gradient(135deg, rgba(26, 31, 46, 0.5) 0%, rgba(26, 37, 51, 0.5) 100%);
        }

        .feature-card {
            background: linear-gradient(135deg, #1a1f2e 0%, #1a2533 100%);
            border: 1px solid rgba(45, 55, 72, 0.8);
            border-radius: 16px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            border-color: rgba(20, 184, 166, 0.5);
            box-shadow: 0 15px 30px rgba(6, 182, 212, 0.2);
        }

        .feature-icon {
            font-size: 3rem;
            background: linear-gradient(135deg, #14b8a6 0%, #06b6d4 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
        }

        .feature-title {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .feature-text {
            color: #94a3b8;
            line-height: 1.6;
        }

        /* === FOOTER === */
        .footer {
            background: linear-gradient(180deg, #1a1f2e 0%, #141824 100%);
            padding: 3rem 0 1rem;
            border-top: 1px solid rgba(20, 184, 166, 0.15);
        }

        .footer-brand {
            font-size: 1.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #14b8a6 0%, #06b6d4 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
        }

        .footer-text {
            color: #94a3b8;
            line-height: 1.6;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 0.5rem;
        }

        .footer-links a {
            color: #94a3b8;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: #14b8a6;
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            background: rgba(20, 184, 166, 0.1);
            border: 1px solid rgba(20, 184, 166, 0.3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #14b8a6;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .social-icon:hover {
            background: linear-gradient(135deg, #14b8a6 0%, #06b6d4 100%);
            color: white;
            transform: translateY(-3px);
        }

        .copyright {
            text-align: center;
            color: #94a3b8;
            padding-top: 2rem;
            margin-top: 2rem;
            border-top: 1px solid rgba(45, 55, 72, 0.5);
        }

        /* === ANIMATIONS === */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* === RESPONSIVE === */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
            }

            .hero-buttons {
                flex-direction: column;
            }

            .section-title {
                font-size: 2rem;
            }

            .movie-poster {
                height: 300px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-custom" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="/">CineVerse</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link-custom" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-custom" href="#movies">Movies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-custom" href="#features">Features</a>
                    </li>
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item ms-3">
                                <a href="{{ url('/dashboard') }}" class="btn btn-auth btn-register">
                                    <i class="bi bi-speedometer2 me-2"></i>Dashboard
                                </a>
                            </li>
                        @else
                            <li class="nav-item ms-3">
                                <a href="{{ route('login') }}" class="btn btn-auth btn-login">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item ms-2">
                                    <a href="{{ route('register') }}" class="btn btn-auth btn-register">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="hero-background"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1 class="hero-title">
                        Experience <span class="gradient-text">Cinema</span><br>
                        Like Never Before
                    </h1>
                    <p class="hero-subtitle">
                        Immerse yourself in the magic of movies with premium screens, 
                        comfortable seating, and an unforgettable atmosphere at CineVerse.
                    </p>
                    <div class="hero-buttons">
                        <a href="#movies" class="btn btn-primary-custom">
                            <i class="bi bi-film me-2"></i>Browse Movies
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-secondary-custom">
                            <i class="bi bi-person-plus me-2"></i>Join Now
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- Hero Image/Animation Space -->
                </div>
            </div>
        </div>
    </section>

    <!-- Now Showing Section -->
    <section class="py-5" id="movies">
        <div class="container">
            <h2 class="section-title">
                <span class="gradient-text">Now Showing</span>
            </h2>
            <div class="row g-4">
                <!-- Movie Card 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="movie-card">
                        <img src="https://placehold.co/400x600/1a1f2e/14b8a6?text=Movie+Poster" alt="Movie" class="movie-poster">
                        <div class="movie-card-body">
                            <h3 class="movie-title">The Quantum Legacy</h3>
                            <p class="movie-genre">Sci-Fi, Action</p>
                            <div class="movie-rating">
                                <span class="rating-stars">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>
                                </span>
                                <span>4.5/5</span>
                            </div>
                            <button class="btn btn-book">
                                <i class="bi bi-ticket-perforated me-2"></i>Book Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Movie Card 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="movie-card">
                        <img src="https://placehold.co/400x600/1a1f2e/06b6d4?text=Movie+Poster" alt="Movie" class="movie-poster">
                        <div class="movie-card-body">
                            <h3 class="movie-title">Echoes of Tomorrow</h3>
                            <p class="movie-genre">Drama, Mystery</p>
                            <div class="movie-rating">
                                <span class="rating-stars">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star"></i>
                                </span>
                                <span>4.0/5</span>
                            </div>
                            <button class="btn btn-book">
                                <i class="bi bi-ticket-perforated me-2"></i>Book Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Movie Card 3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="movie-card">
                        <img src="https://placehold.co/400x600/1a1f2e/fbbf24?text=Movie+Poster" alt="Movie" class="movie-poster">
                        <div class="movie-card-body">
                            <h3 class="movie-title">Guardian's Quest</h3>
                            <p class="movie-genre">Adventure, Fantasy</p>
                            <div class="movie-rating">
                                <span class="rating-stars">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </span>
                                <span>5.0/5</span>
                            </div>
                            <button class="btn btn-book">
                                <i class="bi bi-ticket-perforated me-2"></i>Book Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section" id="features">
        <div class="container">
            <h2 class="section-title">
                <span class="gradient-text">Why Choose CineVerse</span>
            </h2>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-display"></i>
                        </div>
                        <h3 class="feature-title">Premium Screens</h3>
                        <p class="feature-text">
                            Experience movies in stunning 4K resolution with state-of-the-art projection technology.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-volume-up"></i>
                        </div>
                        <h3 class="feature-title">Dolby Atmos</h3>
                        <p class="feature-text">
                            Immersive surround sound that transforms every scene into a cinematic masterpiece.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-armchair"></i>
                        </div>
                        <h3 class="feature-title">Luxury Seating</h3>
                        <p class="feature-text">
                            Relax in our ergonomic recliners with premium leather and personalized comfort.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-phone"></i>
                        </div>
                        <h3 class="feature-title">Easy Booking</h3>
                        <p class="feature-text">
                            Book your tickets instantly with our user-friendly mobile and web platform.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h3 class="footer-brand">CineVerse</h3>
                    <p class="footer-text">
                        Your ultimate destination for premium cinema experiences. 
                        We bring stories to life on the big screen.
                    </p>
                    <div class="social-links mt-3">
                        <a href="#" class="social-icon">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="bi bi-youtube"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 mb-4">
                    <h5 class="text-white mb-3">Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="#movies">Now Showing</a></li>
                        <li><a href="#features">Features</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4 mb-4">
                    <h5 class="text-white mb-3">Support</h5>
                    <ul class="footer-links">
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">FAQs</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4 mb-4">
                    <h5 class="text-white mb-3">Contact Us</h5>
                    <ul class="footer-links">
                        <li><i class="bi bi-geo-alt me-2"></i>123 Cinema Street</li>
                        <li><i class="bi bi-telephone me-2"></i>+62 812-3456-7890</li>
                        <li><i class="bi bi-envelope me-2"></i>info@cineverse.com</li>
                    </ul>
                </div>
            </div>

            <div class="copyright">
                <p>&copy; 2026 CineVerse. All rights reserved. Built with <i class="bi bi-heart-fill text-danger"></i> for movie lovers.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>
