<!doctype html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Appz | {{ $title }}</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    {{-- Feather Icons --}}
    <script src="https://unpkg.com/feather-icons"></script>

    {{-- Box Icons --}}
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    {{-- Sidebar CSS --}}
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/blog.css">

    {{-- Fake Loader --}}
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/fakeLoader.css">

    {{-- Fonts Style --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,300;0,600;1,600&display=swap"
        rel="stylesheet">

</head>

<body>
    <div class="fakeLoader"></div>

    <div class="container p-1">
        <div class="row justify-content-center align-items-center">
            <div class="col">
                <a href="{{ url($index) }}" style="text-decoration: none">
                    <h1>{{ $title }}</h1>
                </a>
            </div>
            @auth
                <div class="col d-flex justify-content-end g-2">
                    <div class="dropdown p-1">
                        <a class="justify-content-end" style="text-decoration: none;" type="button"
                            data-bs-toggle="dropdown">
                            <h5>Page of. <span style="font-weight: bold">{{ auth()->user()->name }}</span></h5>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ url('/') }}">Home</a></li>
                            <li><a class="dropdown-item" href="{{ url('dashboard') }}">Dashboard</a></li>
                            <hr>
                            <li><a class="dropdown-item" href="{{ url('logout') }}">Logout</a></li>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <button class="btn nav-link" type="button" data-bs-toggle="dropdown"><i
                                class="bi bi-sun-fill theme-icon-active" data-theme-icon-active="bi-sun-fill"></i></button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <button class="dropdown-item d-flex align-items-center" type="button"
                                data-bs-theme-value="light"><i class="bi bi-sun-fill me-2 opacity-50"
                                    data-theme-icon="bi-sun-fill"></i>
                                Light
                            </button>
                            <button class="dropdown-item d-flex align-items-center" type="button"
                                data-bs-theme-value="dark"><i class="bi bi-moon-fill me-2 opacity-50"
                                    data-theme-icon="bi-moon-fill"></i>
                                Dark
                            </button>
                            <button class="dropdown-item d-flex align-items-center" type="button"
                                data-bs-theme-value="auto"><i class="bi bi-circle-half me-2 opacity-50"
                                    data-theme-icon="bi-circle-half"></i>
                                Auto
                            </button>
                        </ul>
                    </div>
                </div>
            @else
                <div class="col d-flex justify-content-end g-2">
                    <div class="dropdown p-1">
                        <a class="justify-content-end" style="text-decoration: none;" type="button"
                            data-bs-toggle="dropdown">
                            <i data-feather="user"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('login') }}">Login</a></li>
                            <li><a class="dropdown-item" href="{{ url('register') }}">Register</a></li>
                            <li>
                                <hr>
                            </li>
                            <li><a class="dropdown-item" href="{{ url('/') }}">Back To Home</a></li>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <button class="btn nav-link" type="button" data-bs-toggle="dropdown"><i
                                class="bi bi-sun-fill theme-icon-active" data-theme-icon-active="bi-sun-fill"></i></button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <button class="dropdown-item d-flex align-items-center" type="button"
                                data-bs-theme-value="light"><i class="bi bi-sun-fill me-2 opacity-50"
                                    data-theme-icon="bi-sun-fill"></i>
                                Light
                            </button>
                            <button class="dropdown-item d-flex align-items-center" type="button"
                                data-bs-theme-value="dark"><i class="bi bi-moon-fill me-2 opacity-50"
                                    data-theme-icon="bi-moon-fill"></i>
                                Dark
                            </button>
                            <button class="dropdown-item d-flex align-items-center" type="button"
                                data-bs-theme-value="auto"><i class="bi bi-circle-half me-2 opacity-50"
                                    data-theme-icon="bi-circle-half"></i>
                                Auto
                            </button>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container my-3">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <h3>All Posts</h3>
                    <form action="/{{ $active }}">
                        <div class="input-group my-3">
                            <input type="text" class="form-control" placeholder="Search.." autocomplete="off"
                                name="search" value="{{ request('search') }}">
                            <button type="submit" class="input-group-text" id="button">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endauth

    @yield('content')

    <footer>
        <div class="container my-4">
            <div class="credit">
                <p>Created by <a href="https://www.instagram.com" target="_blank" style="text-decoration: none">Awas
                        Galeri</a>. | &copy; 2023
                </p>
            </div>
        </div>
    </footer>


    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    {{-- Chart --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    {{-- Sidebar JS --}}
    <script src="{{ url('/') }}/assets/js/blog.js"></script>

    {{-- Movie JS --}}
    <script src="{{ url('/') }}/assets/js/movies.js"></script>

    {{-- Feather Icons --}}
    <script>
        feather.replace()
    </script>

    {{-- Fake Loader --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ url('/') }}/assets/js/fakeLoader.js"></script>

    <script>
        $(document).ready(function() {
            $.fakeLoader({
                timeToHide: 1400,
                // bgColor: "#3498db",
                bgColor: "black",
                spinner: "spinner3"
            });
        });
    </script>

</body>
