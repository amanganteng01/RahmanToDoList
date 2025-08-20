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
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">

</head>
<body>
    <header class="navbar navbar-expand-sm bg-utama">
    <div class="container">
        <a class="navbar-brand text-white" href="#">MyList</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
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
                        <div class="container-fluid card bg-utama border-0" style="width:18rem;">
                          <div class="card-body">
                            <h6 class="card-title text-bold text-center">{{ Auth::user()->name }}</h6>
                            <p class="text-center">{{ Auth::user()->username }}</p>
                          </div>
                        </div>
                    </div>
                    <div class="container row-cols-sm-auto mt-4">
                        <a href="{{ route('homepage') }}" style="text-decoration: none">
                            <div class="d-flex  gap-2 text-black">
                                <span>
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                </span>
                                <div class="bg-utama">
                                    <p>Home</p>
                                </div>
                            </div>
                        </a>
                        <a href="{{ route('finished-view') }}" style="text-decoration: none">
                            <div class="d-flex  gap-2 text-black">
                                <span>
                                    <i class="fa fa-tasks" aria-hidden="true"></i>
                                </span>
                                <div class="bg-utama">
                                    <p>Task Finished</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="col-sm-10">
            @yield('content')
            @include('sweetalert::alert')
        </div>
    </div>
</body>
</html>
<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('assets/fontawesome/js/fontawesome.js') }}"></script>
