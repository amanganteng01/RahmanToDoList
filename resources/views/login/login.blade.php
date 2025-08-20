<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
</head>
<body>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @elseif(session('danger'))
    <div class="alert alert-danger alert-dismissible">
        {{ session('danger') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    <div class="container d-flex justify-content-center align-items-center mt-5">
        <div class="card shadow-sm mt-5">
          <div class="login-box">
             <div class="card-header text-center text-bg-info">
                <h4 class="text-white mb-0">Login Page</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('auth') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Username:</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa-regular fa-user"></i>
                            </span>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Masukan username">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Password:</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa-solid fa-lock"></i>
                            </span>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-outline-info">Login</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</body>
</html>
<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('assets/fontawesome/js/fontawesome.js') }}"></script>

