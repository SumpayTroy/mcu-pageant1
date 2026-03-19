<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Manila Central University: Pageant System – Login</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;900&family=DM+Sans:wght@300;400;500;600&display=swap">
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
        @vite(['resources/css/app.css'])

    </head>

    <body>

        <div class="loginPageBackground">

            {{-- MCU watermark logo top right --}}
            <div class="watermark">
                <img src="{{ asset('images/mcuLogo1.png') }}" class="watermark-img">
                <div class="watermark-text">Manila Central<br>University</div>
            </div>

            <div class="loginCard">

                {{-- Header --}}
                <div class="card-header">
                    <img class="mcuLogo1" src="{{ asset('images/mcuLogo1.png') }}">
                </div>

                <div class="divider"></div>

                <div class="pick-title">Pick an account</div>

                {{-- Account options --}}
                <div class="account-list">

                    <a href="{{ route('auth.microsoft') }}" class="account-item">
                        <div class="account-avatar account-avatar--person">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="20" height="20">
                                <circle cx="12" cy="8" r="4" fill="currentColor"/>
                                <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div class="account-info">
                            <div class="account-name">Sign in with Microsoft</div>
                            <div class="account-email">Use your MCU Microsoft 365 account</div>
                        </div>
                        <div class="account-arrow">
                            <svg viewBox="0 0 20 20" width="16" height="16" fill="none">
                                <circle cx="10" cy="10" r="9" stroke="currentColor" stroke-width="1.2"/>
                                <path d="M8 7l3 3-3 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </a>

                    <a href="#" class="account-item account-item--other" onclick="handleLogin(event, 'other')">
                        <div class="account-avatar account-avatar--plus">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none">
                                <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div class="account-info">
                            <div class="account-name">Use another account</div>
                        </div>
                    </a>

                </div>

                <div class="login-note">
                    MCU Faculty &amp; Staff only &middot; Unauthorized access is prohibited
                </div>

            </div>

        </div>

        <script>
            function handleLogin(e, type) {
                e.preventDefault();
                if (type === 'microsoft') {
                    window.location.href = '{{ route("auth.microsoft") }}';
                }
            }
        </script>

    </body>

</html>
