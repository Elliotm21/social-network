<!DOCTYPE html>
<html lang="en">
    <style>
        p {
            margin-left: 20px;
        }

        h1 {
            margin-left: 20px;
        }

        input[type="submit"] {
            margin-left: 20px;
        }

        .iconDetails {
          margin-left:2%;
          float:left; 
          height:70px;
          width:70px; 
        } 

        .container2 {
            width:100%;
        }

    </style>
    <head>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

  <title>@yield('title')</title>

    </head>
    <body class="font-sans antialiased">

          <!-- navigation bar -->
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-6 offset-sm-3 col-md-6 offset-md-3">
        
        <ul class="nav justify-content-center">
          <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/posts/create">New Post</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- navigation bar ends here -->

    <br>

    <h1>@yield('title')</h1>

    <hr>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

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