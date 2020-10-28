<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="ojabo e.s">

  <title>CRAPP | Criminal Records App</title>

  <!-- Bootstrap core CSS -->
  <link href="/searches/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="/searches/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="/searches/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="/searches/css/landing-page.css" rel="stylesheet">

</head>

<body style="
  background-color: #212529;   
  background: url('/searches/img/slider-1-1-1.jpg'); 
  no-repeat center center;
  background-size: cover;
">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="{{url('/')}}">CRAPP</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
      </li>  
      <li class="nav-item active">
        <a class="nav-link" href="{{url('login')}}">Sign In <span class="sr-only">(current)</span></a>
      </li>      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Find Records
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{url('prison-case')}}">Prison Records</a>
          <a class="dropdown-item" href="{{url('court-case')}}">Court Records</a>           
        </div>
      </li>
      
    </ul>
    <form class="form-inline my-2 my-lg-0" method="POST" action="{{ route('login') }}">
    @csrf
      <input class="form-control mr-sm-2" name="email" type="email" placeholder="Email..." aria-label="email">&nbsp;
      <input class="form-control mr-sm-2" name="password" type="password" placeholder="password..." aria-label="password">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Sign In</button>
    </form>
  </div>
</nav>
  <!-- <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
      <a class="nav-brand" href="{{url('/')}}">CRAPP</a>
      <a class="nav-link" href="{{url('court-case')}}">Court Cases</a>
      <a class="nav-link" href="{{url('prison-case')}}">Prison Cases</a>
      <a class="btn btn-primary" href="{{url('login')}}">Sign In</a>
      <a class="btn btn-primary" href="{{url('login')}}">Sign In</a>
    </div>
  </nav> -->

  
  @yield('content')
  <!-- Footer -->
   

  <!-- Bootstrap core JavaScript -->
  <script src="/searches/vendor/jquery/jquery.min.js"></script>
  <script src="/searches/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
