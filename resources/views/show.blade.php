<!DOCTYPE html>
<html lang="en">
<head>
  <title>Veridius-Catering|Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }

    /* Remove the jumbotron's default bottom margin */
     .jumbotron {
      margin-bottom: 0;
    }

    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }

    .plop {
      float: left;
      width: 40%;
      /* height: 300px; /* only for demonstration, should be removed */ */
      background: #ccc;
    }

    article {
        float: right;
        padding: 20px;
        width: 60%;
        background-color: #f1f1f1;
    }

    /* Clear floats after the columns */
    section:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
    @media (max-width: 600px) {
            nav, article {
            width: 100%;
            height: auto;
        }
    }
  </style>
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Veridius-Catering</h1>
    <p>Bread for every rat</p>
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/">Home</a></li>
        <li><a href="#">Deals</a></li>
        <li><a href="/contact">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          @if (Route::has('login'))
            @auth
                <a onclick="uitloggen()"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }} <span class="caret"></span></a>
            @else
                <a onclick="inloggen()"><span class="glyphicon glyphicon-user"></span> Login</a>
            @endauth
          @endif

          <div style="display:none;" id="uitloggen">
            <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-4">
                <div style="color:white;">Eerdere bestellingen bekijken</div>
                  <button class="btn btn-primary">
                       Klik hier
                  </button>

                <div style="color:white;">of</div>
                  <button class="btn btn-primary" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </button>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
            </div>
          </div>

          <div style="display:none;" id="inloggen">
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label text-md-right" style="color:#9D9D9D;">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right" style="color:#9D9D9D;">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember" style="color:#9D9D9D;">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            <button class="btn btn-primary">
                              <a href="{{ route('register') }}" style="color:white; text-decoration: none;">Register</a>
                            </button>

                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
          </div>

          <script>
            function inloggen() {
                var x = document.getElementById("inloggen");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }

            function uitloggen() {
                var x = document.getElementById("uitloggen");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
          </script>
        </li>
        <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
      </ul>
    </div>
  </div>
</nav>

<section>
  <div class="container plop">
    <div class="row">
        <div class="col-sm-4">
          <div class="panel panel-primary">{{--success / dager--}}
            <div class="panel-heading">{{$bread->name}}</div>
            <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
            <div class="panel-footer">{{$bread->description}}</div>
          </div>
        </div>
    </div>
  </div><br><br>

  <article>
    <h1>{{$bread->name}}</h1>
    <p>{{$bread->description}}</p>
    {{-- <form action="{{route('bread.update', $bread)}}" method="POST">
        @csrf
        Amount:
        <input type="text" name="amount" value="amount">
        <input type="submit" value="Bestel">
    </form> --}}
    {{-- {{Form::open(['route' => 'user.store', 'files' => true])}}

    {{Form::label('user_photo', 'User Photo',['class' => 'control-label'])}}
    {{Form::file('user_photo')}}
    {{Form::submit('Save', ['class' => 'btn btn-success'])}}

    {{Form::close()}} --}}
  </article>
</section><br><br><br><br><br><br>

<footer class="container-fluid text-center">
  <p>Online Store Copyright</p>
  <form class="form-inline">Get deals:
    <input type="email" class="form-control" size="50" placeholder="Email Address">
    <button type="button" class="btn btn-danger">Sign Up</button>
  </form>
</footer>

</body>
</html>
