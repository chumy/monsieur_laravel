<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.css" integrity="sha256-CNwnGWPO03a1kOlAsGaH5g8P3dFaqFqqGFV/1nkX5OU=" crossorigin="anonymous" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Monsieur Recetas</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
                  
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/usuarios') }}">Usuarios</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{ url('/recetas') }}">Recetas</a>
          </li>
          @if (Route::has('login'))
          <li class="nav-item">
              @auth
                  <a class="nav-link" href="{{ url('/home') }}">Home</a>
              @else
                  <a class="nav-link" href="{{ route('login') }}">Login</a>

                  @if (Route::has('register'))
                      <a class="nav-link" href="{{ route('register') }}">Register</a>
                  @endif
              @endauth
          </li>
      @endif
        </ul>
      </div>
    </div>
  </nav>


<!-- Begin page content -->
<div  class="container">
       
    
    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8" id="app">

                @yield('content')

        </div>

          <!-- Sidebar Widgets Column ->
          <div class="col-md-4">

            <!-- Search Widget ->

           @yield('sidebar')
    
        </div-->
    </div>



  <!-- Footer -->
  <footer class="py-4 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Monsieur Recetas</p>
    </div>
    <!-- /.container -->
  </footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>