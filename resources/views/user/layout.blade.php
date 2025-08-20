<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
</head>
<body>
    <header class="navbar navbar-expand-sm bg-utama">
    <div class="container">
        <a class="navbar-brand text-white" href="#">Navbar</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <form class="d-flex ms-auto w-100 me-2" action="" method="GET">
                <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

            @if (Auth::user())
                <a href="{{ route('logout') }}" class="btn btn-danger ms-2">Logout</a>
            @endif
        </div>
    </div>
</header>

    <div class="row" style="height: 100vh;">
        <div class="col-sm-2 bg-utama">
            <nav>
                <div class="container mt-5">
                    <div class="container-fluid d-flex justify-content-center border rounded-2">
                        <div class="container-fluid card bg-utama m-4 border-0" style="width:18rem;">
                          <img src="{{ asset('assets/foto/profile.jpg') }}" class="rounded-circle" loading="eager">
                          <div class="card-body">
                            <h6 class="card-title text-bold text-center">{{ Auth::user()->name }}</h6>
                          </div>
                        </div>
                    </div>
                    <div class="container row-cols-sm-auto mt-4">
                        <a href="" style="text-decoration: none">
                            <div class="d-flex  gap-2 text-black">
                                <span>
                                    <i class="fa fa-dashboard" aria-hidden="true"></i>
                                </span>
                                <div class="bg-utama">
                                    <p>Dashboard</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="col-sm-10">
            @yield('content')
        </div>
    </div>
</body>
</html>
<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('assets/fontawesome/js/fontawesome.js') }}"></script>
