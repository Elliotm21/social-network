<!DOCTYPE html>
<html lang="en">
    <style>

      .margin, h1 {
        margin-left: 220px;
      }

      table {
        margin-left: 220px;
                border-collapse: collapse;
            }

            td {
                text-align:center;
                background-color: #F5F5F5;
            }

        .iconDetails {
          height:70px;
          width:70px; 
          border-radius: 50%;
          border: 2px solid #808080;
        } 

        .image {
          height:70px;
          width:70px; 
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
                width:80%;
            }

            .card {
  /* Add shadows to create the "card" effect */
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

/* Add some padding inside the card container */
.container {
  padding: 2px 16px;
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

  body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 180px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #F5F5F5;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 6px 6px 32px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
}

.link {
  text-decoration: none;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: black;
}

.main {
  margin-left: 20px; /* Same as the width of the sidenav */
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

    </style>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

  <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

  <title>@yield('title')</title>

    </head>
    <body>

  <div class="sidenav">
  <a href="/posts">Home</a>
  <a href="/posts/create">New Post</a>
  <a href="{{ route('users.show', Auth::user()) }}">My Profile</a>
</div>

  <form method="POST" action="{{ route('logout') }}">
        @csrf
        <input type="submit" value="LOG OUT" class="logoutLblPos">
    </form>

    <br>

    <h1>@yield('title')</h1>

    <hr>

        @if ($errors->any())
            <div class="margin">
                Errors:
                <ul>
                    @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('message'))
          <div class="margin">
            <p><b>{{ session('message') }}</b></p>
          </div>
        @endif

        <div>
            @yield('content')
        </div>

    </body>
</html>