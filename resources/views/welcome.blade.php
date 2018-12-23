<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Donate OAM</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <!-- TODO: Move these to the css folder before this file explodes. -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway';
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            /* .homepage-image {
                background: url("/images/homepage.jpg");
                background-size: cover;
                opacity: 0.75;
            } */

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                /* color: black;
                mix-blend-mode: difference; */
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                /* color: black;
                mix-blend-mode: difference; */
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-transform: uppercase;
                text-decoration: none;
            }
            
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <!-- <div class="flex-center position-ref full-height homepage-image"> -->
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                    <a href="https://openarmsministry.org">Homepage</a>
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Donate Open Arms Ministry
                </div>

                <div class="links">
                  <a href="/faq">FAQ</a>
                    <a href="{{url('home')}}">Manage your Donations</a>
                </div>
            </div>
        </div>
    </body>
</html>
