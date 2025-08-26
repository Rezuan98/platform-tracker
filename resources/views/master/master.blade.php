<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
<link rel="icon" type="image/png" sizes="80x80" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="80x80" href="{{ asset('favicon.ico') }}">
    <style>
    body {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }
    
    .navbar {
        background-color: #1F70C1; /* Unilever Blue */
    }
    
    .navbar-brand img {
        height: 60px;
        filter: brightness(0) invert(1); /* Makes the logo white */
    }
    
    .main-content {
        flex: 1;
    }
    
    footer {
        margin-top: auto;
    }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="{{asset('images/ubl.png')}}" alt="Unilever">
        </a>

        <!-- Responsive Toggle -->
        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Content -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
              <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="btn btn-light">
                Logout
            </button>
        </form>
                {{-- <a class="btn btn-light" href="#"></a> --}}
            </li>
            </ul>
        </div>
        </div>
    </nav>

    <div class="main-content">
        @yield('mezba')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    
    <footer class="bg-primary text-white text-center py-3" style="background-color: #1F70C1 !important;">
        <div class="container">
            <p class="mb-1">© 2025 Unilever. All rights reserved.</p>
            <p class="mb-0">
                <a href="#" class="text-white text-decoration-none me-3">Privacy Policy</a>
                <a href="#" class="text-white text-decoration-none">Terms of Service</a>
            </p>
        </div>
    </footer>
</body>
</html>