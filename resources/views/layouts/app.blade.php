<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CineVerse')</title>
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    @livewireStyles
    <style>
        :root {
            /* Modern Teal/Cyan Theme - Cinema Style */
            --primary-color-light: #14b8a6;
            --primary-color-dark: #0d9488;
            --primary-gradient: linear-gradient(135deg, #14b8a6 0%, #06b6d4 100%);
            --accent-color: #f59e0b;
            --accent-gradient: linear-gradient(135deg, #fbbf24, #f59e0b);
            
            /* Modern Dark Backgrounds */
            --dark-blue: #0a0e17;
            --medium-blue: #1a1f2e;
            --light-blue: #2d3748;
            
            /* Text Colors */
            --text-color: #f8fafc;
            --text-muted: #94a3b8;
            --text-secondary: #cbd5e1;
            
            /* Layout */
            --sidebar-width: 90px;
            --bottom-bar-height: 70px;
        }

        body {
            background: linear-gradient(135deg, #0a0e17 0%, #0f1419 50%, #0a0e17 100%);
            color: var(--text-color);
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }

        /* --- LAYOUT UTAMA --- */
        .main-wrapper {
            display: flex;
            min-height: 100vh;
        }

        .main-content {
            margin-left: var(--sidebar-width);
            width: calc(100% - var(--sidebar-width));
            padding: 2rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* --- SIDEBAR DESKTOP --- */
        .sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(180deg, #1a1f2e 0%, #141824 100%);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 1.5rem;
            border-right: 1px solid rgba(20, 184, 166, 0.15);
            box-shadow: 4px 0 30px rgba(0, 0, 0, 0.5);
            z-index: 1000;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Container Logo */
        .sidebar-logo-container {
            margin-bottom: 2rem;
            width: 100%;
            padding: 0 15px;
            display: flex;
            justify-content: center;
        }

        /* Logo Styling - Circular & Modern */
        .logo-cineverse {
            width: 60px !important;
            height: 60px !important;
            border-radius: 50% !important;
            object-fit: cover !important;
            border: 3px solid rgba(20, 184, 166, 0.3) !important;
            box-shadow: 0 4px 15px rgba(20, 184, 166, 0.2),
                        0 0 30px rgba(20, 184, 166, 0.1) !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
            background: linear-gradient(135deg, #1a1f2e, #0a0e17);
            padding: 5px;
        }

        .logo-cineverse:hover {
            transform: scale(1.1) rotate(5deg);
            border-color: rgba(20, 184, 166, 0.6);
            box-shadow: 0 6px 25px rgba(20, 184, 166, 0.4),
                        0 0 40px rgba(20, 184, 166, 0.2);
        }

        .logo-placeholder {
            width: 60px;
            height: 60px;
            background: var(--primary-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
            border: 3px solid rgba(20, 184, 166, 0.3);
            box-shadow: 0 4px 15px rgba(20, 184, 166, 0.2);
            transition: all 0.3s ease;
        }

        .logo-placeholder:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 25px rgba(20, 184, 166, 0.4);
        }

        /* Link Styles */
        .sidebar .nav-link {
            color: var(--text-muted);
            text-align: center;
            font-size: 0.75rem;
            padding: 1rem 0;
            width: 100%;
            border-left: 3px solid transparent;
            border-top: 3px solid transparent;
            border-radius: 0;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .sidebar .nav-link i {
            font-size: 1.5rem;
            margin-bottom: 0.3rem;
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .sidebar .nav-link span {
            font-size: 0.7rem;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        /* Active & Hover States */
        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            color: var(--primary-color-light);
            background: linear-gradient(90deg, rgba(6, 182, 212, 0.15) 0%, transparent 100%);
            border-left-color: var(--primary-color-light);
        }

        .sidebar .nav-link.active {
            box-shadow: 0 0 20px rgba(6, 182, 212, 0.2);
        }

        .sidebar .nav-link:hover i {
            transform: scale(1.15) translateY(-2px);
        }

        /* --- UTILITIES --- */
        .section-title {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 700;
            margin-bottom: 2rem;
        }

        .movie-card {
            background: linear-gradient(135deg, var(--medium-blue) 0%, #1a2533 100%);
            border: 1px solid var(--light-blue);
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .movie-card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 20px 40px rgba(6, 182, 212, 0.3),
                        0 0 0 2px rgba(6, 182, 212, 0.1);
            border-color: var(--primary-color-light);
        }

        .btn-primary {
            background: var(--primary-gradient);
            border: none;
            color: #ffffff;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .btn-primary:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-primary:hover:before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(6, 182, 212, 0.4),
                        0 0 30px rgba(6, 182, 212, 0.2);
            color: #ffffff;
        }

        .btn-primary:active {
            transform: translateY(-1px);
        }

        .panel-card {
            background: linear-gradient(135deg, var(--medium-blue) 0%, #1a2533 100%);
            border: 1px solid var(--light-blue);
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .panel-card:hover {
            box-shadow: 0 8px 30px rgba(6, 182, 212, 0.15);
        }

        .form-label {
            color: var(--text-secondary);
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .form-control {
            background-color: rgba(15, 23, 42, 0.6);
            border: 1.5px solid var(--light-blue);
            color: var(--text-color);
            border-radius: 8px;
            padding: 0.75rem 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .form-control:focus {
            background-color: rgba(15, 23, 42, 0.8);
            color: var(--text-color);
            border-color: var(--primary-color-light);
            box-shadow: 0 0 0 4px rgba(6, 182, 212, 0.15),
                        0 0 20px rgba(6, 182, 212, 0.2);
            transform: translateY(-1px);
        }

        .form-control:disabled, .form-control[readonly] {
            background-color: rgba(51, 65, 85, 0.3);
            opacity: 0.7;
        }

        /* --- MOBILE RESPONSIVE (BOTTOM BAR) --- */
        @media (max-width: 992px) {
            .main-content {
                margin-left: 0;
                width: 100%;
                padding: 1rem;
                padding-bottom: calc(var(--bottom-bar-height) + 30px);
            }

            .sidebar {
                width: 100%;
                height: var(--bottom-bar-height);
                min-height: auto;
                top: auto;
                bottom: 0;
                flex-direction: row;
                justify-content: space-between;
                padding: 0;
                border-right: none;
                border-top: 1px solid var(--light-blue);
                box-shadow: 0 -5px 30px rgba(0, 0, 0, 0.5);
                background: linear-gradient(0deg, var(--medium-blue) 0%, #1a2332 100%);
            }

            .sidebar-logo-container {
                display: none;
            }

            .sidebar .nav {
                flex-direction: row !important;
                align-items: center;
                justify-content: space-around;
                height: 100%;
                width: auto;
                flex-grow: 1;
            }

            .sidebar .bottom-menu-group {
                flex-direction: row !important;
                width: auto !important;
                margin-top: 0 !important;
                border-left: 1px solid var(--light-blue);
                padding-left: 5px;
                padding-right: 5px;
                height: 100%;
                align-items: center;
                justify-content: center;
            }

            .sidebar .nav-link {
                padding: 0.5rem;
                height: 100%;
                border-left: none;
                border-top: 3px solid transparent;
                width: auto;
                min-width: 60px;
            }

            @media (max-width: 480px) {
                .sidebar .nav-link span {
                    display: none;
                }
                .sidebar .nav-link i {
                    margin-bottom: 0;
                    font-size: 1.4rem;
                }
            }

            .sidebar .nav-link.active,
            .sidebar .nav-link:hover {
                border-left: none;
                border-top-color: var(--primary-color-light);
                background: linear-gradient(to bottom, rgba(6, 182, 212, 0.2), transparent);
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="main-wrapper">
        @include('layouts.sidebar')

        <main class="main-content">
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @livewireScripts
    @stack('scripts')

    {{-- Modal Konfirmasi Logout --}}
    @auth
        <x-confirm-modal
            modalId="logoutModal"
            title="Konfirmasi Logout"
            body="Apakah Anda yakin ingin keluar dari sesi ini?"
            confirmText="Logout"
            cancelText="Batal"
            :confirmAction="route('logout')"
            confirmMethod="POST"
            iconClass="bi-box-arrow-right text-warning"
            confirmButtonClass="btn-danger"
        />
    @endauth
</body>
</html>
