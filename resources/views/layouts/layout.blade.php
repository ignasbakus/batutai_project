<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link href="/frameworks/bootstrap-5.3.3/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="/frameworks/jquery-ui-1.13.2/jquery-ui.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="/frameworks/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css" rel="stylesheet"
          crossorigin="anonymous">
    <link href="/css/layout/layout.css" rel="stylesheet" crossorigin="anonymous">
    @yield('custom_css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .navbar-lightblue {
            background-color: #4E91FD; /* Blue color */
        }

        .navbar-lightblue .navbar-brand,
        .navbar-lightblue .nav-link {
            color: white; /* White text color for contrast */
        }
    </style>
</head>
<body>
<div id="page-container">
    <nav class="navbar navbar-expand-lg navbar-lightblue mb-3">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
                    aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">op-op</a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Batutai</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kontaktai</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="content-wrap">
        @yield('content')
    </div>

    <footer id="footer" class="navbar navbar-lightblue">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Fixed bottom</a>
        </div>
    </footer>

    <script src="/frameworks/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
    <script src="/frameworks/jquery-ui-1.13.2/jquery-ui.min.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@popperjs/core@2" crossorigin="anonymous"></script>
    <script src="/frameworks/bootstrap-5.3.3/js/bootstrap.bundle.js" crossorigin="anonymous"></script>
    @yield('custom_js')
</div>
</body>
</html>
