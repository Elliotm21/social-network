<!DOCTYPE html>
<html lang="en">
  <style>

    .margin, h1 {
      margin-left: 220px;
    }

    h1 {
      font-family: Georgia, serif;
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

    .iconDetails2 {
      height:100px;
      width:100px; 
      border-radius: 50%;
      border: 2px solid #808080;
    } 

    .container2 {
      width:100%;
    }

    .table1 {
      border-collapse:separate;
      border-spacing:0 15px;
      width:80%;
    }

    .table2 {
      border-collapse:separate;
      border-spacing:0 15px;
      width:40%;
    }

    .comment {
      background-color: #F5F5F5;
    }

    .small-font {
      font-size: 12px;
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
      font-family: Georgia, serif;
    }

    .logout-button {
      margin-left: 10px;
      margin-bottom: 10px;
      position: fixed;
      bottom: 0px;
    }

    .sidenav a:hover {
      color: black;
    }

    .main {
      margin-left: 20px; 
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

    <title>@yield('title')</title>

  </head>

  <body>

    <!-- Navigation bar -->

    <div class="sidenav">

      <br>
      <a href="/dashboard">Home</a>
      <a href="/dashboard/create">New Post</a>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <div class="logout-button">
          <input type="submit" value="LOG OUT" class="btn btn-secondary">
        </div>
      </form>
    </div>

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