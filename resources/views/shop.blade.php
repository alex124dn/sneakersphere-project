<!DOCTYPE html>
<html>
<head>
    <title>Sneakersphere Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
    <div class="container">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="#" style="color: white;">Sneakersphere</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}" style="color: white;">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" style="color: white;">Services</a>
        </li>
    </ul>
    <div class="container" style="margin-left: 850px;">
        <a class="btn btn-outline-dark" href="{{route('mycart') }}">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge bg-danger">{{ count((array) session('cart')) }}</span>
        </a>
        <a class="btn btn-outline-dark" href="{{route('login')}}">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
        </a>
    </div>
  </div>
</nav>
<div class="container mt-4">
    <h2 class="mb-3 text-center">Welcome, We Are The Sneakersphere!</h2>
    <p class="text-center mb-5">Select your favorite shoes and buy them now!</p>
    @if (Session::has('success'))
    <div class="alert alert-success text-center" role="alert">
        {{Session::get('success')}}
    </div>
    @endif
    @yield('content')
</div>
   
@yield('scripts')
</body>
</html>