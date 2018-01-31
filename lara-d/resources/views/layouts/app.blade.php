<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/material.css') }}" rel="stylesheet">
    <link href="{{ asset('css/top.css') }}" rel="stylesheet">
</head>
<body>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Top</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Information</a>
                            </li>
                            <li class="dropdown nav-item">
                                <a href="#" class="nav-link" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Search
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="">Team Data</a>
                                    </li>
                                    <li>
                                        <a href="">Match Data</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown nav-item">
                                <a href="#" class="nav-link" data-toggle="dropdown" role="button" aria-expanded="false">
                                    SUM DL
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="">DL Team</a>
                                    </li>
                                    <li>
                                        <a href="">DL Match</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Simple Upload</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Video</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Links</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav nav-right">
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    Login
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    Register
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        @yield('content')

        <script src="{{ asset('js/material.js') }}"></script>
</body>
</html>
