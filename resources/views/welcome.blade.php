<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Share It</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

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
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-top: 0px;
                margin-bottom: 30px;
            }

            .footer {
                font-size: 11px;
                padding-top: 30%;
            }

            .footer > a{
                font-size: 10px;
                text-transform: none;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Share It!
                </div>

                <div class="links">
                    @auth
                        <a href="/home">Home</a>
                        <a href="/product">Products</a>
                        <a href="/item">Items</a>
                    @else
                        <a href="/register">Register</a>
                        <a href="/login">Login</a>
                    @endauth
                        <a href="/help">Help</a>
                </div>
                <div>
                    <br>     
                </div>
                <div class="links footer">
                    <a href="https://brunofontes.net">By Bruno Fontes</a>
                    <p>© 2018 Bruno Fontes All Rights Reserved</p>
                </div>
            </div>
        </div>
    </body>
</html>
