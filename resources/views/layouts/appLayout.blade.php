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
    <link rel="stylesheet" href="{{ asset('css/judgePages.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sasPages.css') }}">

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

                    @if(request()->is('admin/*'))

                        <div class="user-role">ADMIN</div>

                    @elseif(request()->is('judge/*'))

                        <div class="user-role">JUDGE</div>

                    @elseif(request()->is('sas/*'))

                        <div class="user-role">SAS</div>

                    @endif

                </div>

            </div>

        </div>

        <div class="app-layout">

            <aside class="sidebar">

                <nav class="sidebar-nav">

                    {{-- ═══ ADMIN NAV ═══ --}}
                    @if(request()->is('admin/*'))

                        <span class="nav-section-label">Main</span>

                        <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                            <span class="nav-icon">📊</span> Dashboard

                        </a>

                        <a href="{{ route('admin.user-roles') }}" class="nav-item {{ request()->routeIs('admin.user-roles') ? 'active' : '' }}">

                            <span class="nav-icon">👤</span> User Roles

                        </a>

                        <a href="{{ route('admin.events') }}" class="nav-item {{ request()->routeIs('admin.events*') ? 'active' : '' }}">

                            <span class="nav-icon">🎭</span> Events

                        </a>

                        <span class="nav-section-label">Operations</span>

                        <a href="#" class="nav-item">

                            <span class="nav-icon">📋</span> Tabulation

                        </a>

                    {{-- ═══ JUDGE NAV ═══ --}}
                    @elseif(request()->is('judge/*'))

                        <span class="nav-section-label">Main</span>

                        <a href="{{ route('judge.dashboard') }}" class="nav-item {{ request()->routeIs('judge.dashboard') ? 'active' : '' }}">

                            <span class="nav-icon">📊</span> Dashboard

                        </a>

                        <a href="#" class="nav-item">

                            <span class="nav-icon">📝</span> Scoring

                        </a>

                        <a href="#" class="nav-item">

                            <span class="nav-icon">🏆</span> Leaderboard

                        </a>

                    {{-- ═══ SAS NAV ═══ --}}
                    @elseif(request()->is('sas/*'))

                        <span class="nav-section-label">Main</span>

                        <a href="{{ route('sas.dashboard') }}" class="nav-item {{ request()->routeIs('sas.dashboard') ? 'active' : '' }}">

                            <span class="nav-icon">📊</span> Dashboard

                        </a>

                        <a href="{{ route('sas.contestants') }}" class="nav-item {{ request() -> routeIs('sas.contestants') ? 'active' : '' }}">

                            <span class="nav-icon">👥</span> Contestants

                        </a>

                        <a href="#" class="nav-item">

                            <span class="nav-icon">🏆</span> Leaderboard

                        </a>

                        <span class="nav-section-label">Operations</span>

                        <a href="#" class="nav-item">

                            <span class="nav-icon">📋</span> Reports

                        </a>

                    @endif

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
