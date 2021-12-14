<!DOCTYPE html>
<html lang="en">
    <style>
      p, h1, input[type="submit"] {
        margin-left: 20px;
      }

      table {
                border-collapse: collapse;
            }

            td {
                text-align:center;
                background-color: #F5F5F5;
            }

        .iconDetails {
          margin-left:50px;
          margin-right:50px;
          float:left; 
          height:70px;
          width:70px; 
          border-radius: 50%;
          border: 2px solid #808080;
        } 

        .right {
          position: fixed;
  right: 0;
        }

        .container2 {
            width:100%;
        }

        .logoutLblPos{
          position:fixed;
          right:10px;
          top:5px;
        }

        .gfg {
                border-collapse:separate;
                border-spacing:0 15px;
                width:100%;
            }

        .btn-group button {
  background-color: #04AA6D; /* Green background */
  border: 1px solid green; /* Green border */
  color: white; /* White text */
  padding: 10px 24px; /* Some padding */
  cursor: pointer; /* Pointer/hand icon */
  float: left; /* Float the buttons side by side */
}

.btn-group button:not(:last-child) {
  border-right: none; /* Prevent double borders */
}

/* Clear floats (clearfix hack) */
.btn-group:after {
  content: "";
  clear: both;
  display: table;
}

/* Add a background color on hover */
.btn-group button:hover {
  background-color: #3e8e41;
}

  .comment {
    background-color: #F5F5F5;
  }

  .small-font {
    font-size: 12px;
  }

    </style>
    <head>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

  <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

  <title>@yield('title')</title>

    </head>
    <body class="font-sans antialiased">

          <!-- navigation bar -->
          <div class="comment">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-6 offset-sm-3 col-md-6 offset-md-3">
        
        <ul class="nav justify-content-center">
          <li class="nav-item">
            <a class="nav-link" href="/posts">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/posts/create">New Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('users.show', Auth::user()) }}">My Profile</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  </div>
  <!-- navigation bar ends here -->

  <form method="POST" action="{{ route('logout') }}">
        @csrf
        <input type="submit" value="LOG OUT" class="logoutLblPos">
    </form>

    <br>

    <h1>@yield('title')</h1>

    <hr>

        @if ($errors->any())
            <div>
                Errors:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('message'))
            <p><b>{{ session('message') }}</b></p>
        @endif

        <div>
            @yield('content')
        </div>

    </body>
</html>