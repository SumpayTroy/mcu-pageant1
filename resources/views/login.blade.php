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

            <div class="pageLayout">

                <div class="loginCard">

                    <div class="mcuImageWrapper">

                        <img class="mcuLogo1" src="{{ asset('images/mcuLogo1.png') }}">

                    </div>

                    <div class="divider"></div>

                    <div class="login-title">Sign in to continue</div>

                    <div class="login-subtitle">

                        Use the University's Microsoft 365 account to access the system.

                    </div>

                    <button class="btn-login">

                        Sign in with Microsoft

                        <svg class="ms-icon" viewBox="0 0 21 21" xmlns="http://www.w3.org/2000/svg">

                            <rect x="1"  y="1"  width="9" height="9" fill="#F25022"/>
                            <rect x="11" y="1"  width="9" height="9" fill="#7FBA00"/>
                            <rect x="1"  y="11" width="9" height="9" fill="#00A4EF"/>
                            <rect x="11" y="11" width="9" height="9" fill="#FFB900"/>

                        </svg>

                    </button>

                    <div class="login-note">

                        MCU Faculty & Staff only . Unauthorized access is prohibited

                    </div>

                </div>

            </div>

        </div>

    </body>

</html>
