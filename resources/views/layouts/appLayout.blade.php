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

                        <a href="{{ route('sas.contestants') }}" class="nav-item {{ request()->routeIs('sas.contestants') ? 'active' : '' }}">
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

                {{-- ── User profile at bottom of sidebar ── --}}
                <div class="sidebar-user">

                    <div class="sidebar-user-avatar">
                        <img src="{{ asset('images/user.png') }}" alt="User">
                    </div>

                    <div class="sidebar-user-info">
                        <div class="sidebar-user-name">{{ Auth::user()?->name ?? 'Test User' }}</div>
                        <div class="sidebar-user-role">
                            @if(request()->is('admin/*')) ADMIN
                            @elseif(request()->is('judge/*')) JUDGE
                            @elseif(request()->is('sas/*')) SAS
                            @endif
                        </div>
                    </div>

                    <form method="POST" action="{{ route('auth.logout') }}">
                        @csrf
                        <button type="button" class="sidebar-logout-btn" title="Logout" onclick="openLogoutModal()">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <polyline points="16,17 21,12 16,7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <line x1="21" y1="12" x2="9" y2="12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </form>

                </div>

            </aside>

            <main class="main-content">
                @yield('content')
            </main>

        </div>

    </div>

            {{-- ── Logout Confirmation Modal ── --}}
        <div id="logoutModal" class="modal-overlay" style="display:none;">
            <div class="modal">

                <div class="modal-header">
                    <h3>Confirm Logout</h3>
                    <button class="modal-close" onclick="closeLogoutModal()">×</button>
                </div>

                <div class="modal-body" style="text-align:center; padding: 2rem 1.5rem;">
                    <div style="font-size: 2.5rem; margin-bottom: 1rem;">👋</div>
                    <p style="font-size: 0.95rem; color: #555; line-height: 1.6;">
                        Are you sure you want to log out of <strong>MCU Pageant System</strong>?
                    </p>
                </div>

                <div class="modal-footer">
                    <button class="btn btn--outline" onclick="closeLogoutModal()">
                        Cancel
                    </button>
                    <form method="POST" action="{{ route('auth.logout') }}" style="margin:0;">
                        @csrf
                        <button type="submit" class="btn" style="background: var(--danger); color: #fff; border: none;">
                            Yes, Logout
                        </button>
                    </form>
                </div>

            </div>
        </div>

    @stack('scripts')

    <script>
        function openLogoutModal() {
            document.getElementById('logoutModal').style.display = 'flex';
            }

        function closeLogoutModal() {
            document.getElementById('logoutModal').style.display = 'none';
            }

        // Close on backdrop click
        document.getElementById('logoutModal').addEventListener('click', function(e) {
            if (e.target === this) closeLogoutModal();
            });
    </script>

</body>

</html>
