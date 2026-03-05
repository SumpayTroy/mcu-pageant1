<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin') — MCU Pageant</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Montserrat:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;900&family=DM+Sans:wght@300;400;500;600&display=swap">

    <link rel="stylesheet" href="{{ asset('css/appLayout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminPages.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')

</head>

<body>

    <div class="app-bg">

        <div class="topHeader">

                <img class="mcuLogo1" src="{{ asset('images/mcuLogo1.png') }}">

                <div class="user-pill">

                    <div class="user-avatar">

                        <img class="userProfilePicture" src="{{ asset('images/user.png') }}">

                    </div>

                    <div class="user-info">

                        <div class="user-name">Test D. Luffy</div>
                        <div class="user-role">ADMIN</div>

                    </div>

                </div>

        </div>

        <div class="app-layout">

            <aside class="sidebar">

                <nav class="sidebar-nav">

                    <span class="nav-section-label">Main</span>

                    <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <span class="nav-icon">📊</span> Dashboard
                    </a>

                    {{-- <a href="#contestants" class="nav-item">
                        <span class="nav-icon">👥</span> Contestants
                    </a>

                    <a href="#scoring" class="nav-item">
                        <span class="nav-icon">📝</span> Scoring
                    </a>

                    <a href="#leaderboard" class="nav-item">
                        <span class="nav-icon">🏆</span> Leaderboard
                    </a> --}}

                    <a href="{{ route('admin.user-roles') }}" class="nav-item {{ request()->routeIs('admin.user-roles') ? 'active' : '' }}">
                        <span class="nav-icon">👤</span> User Roles
                    </a>

                    <span class="nav-section-label">Operations</span>

                    <a href="#tabulation" class="nav-item">
                        <span class="nav-icon">📋</span> Tabulation
                    </a>

                </nav>

            </aside>

            <main class="main-content">
                @yield('content')
            </main>

        </div>

    </div>

    @stack('scripts')

</body>

</html>
