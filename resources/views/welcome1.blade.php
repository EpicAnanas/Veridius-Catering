<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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

            .head {
                margin-top: 10px;
                padding-bottom: 30px;
                border-bottom: black 3px solid;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .loginlink {
                font-size: 13px;
            }

            .headlink {
                font-size: 20px;
            }
        </style>
    </head>
    <body>
      <div class="head">
          @if (Route::has('login'))
              <div class="top-right loginlink links">
                  @auth
                      <a href="{{ url('/home') }}">Home</a>
                  @else
                      <a href="{{ route('login') }}">Login</a>

                      @if (Route::has('register'))
                          <a href="{{ route('register') }}">Register</a>
                      @endif
                  @endauth
              </div>
          @endif

          <div class="title">
              Logo
          </div>

          <div class="flex-center position-ref headlink">
            <div class="links">
                <a href="#">|Home|</a>
                <a href="#">|Contact|</a>
            </div>
          </div>
      </div>

          <div class="flex-center position-ref full-height">
            <div class="content">
                ConTent
            </div>
        </div>
    </body>
</html>
