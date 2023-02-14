<!doctype html>
<html lang="en">

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
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/sidebar.css">

    {{-- My CSS --}}
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/style3.css">

    {{-- Fake Loader --}}
    {{-- <link rel="stylesheet" href="{{ url('/') }}/assets/css/fakeLoader.css"> --}}

    {{-- Fonts Style --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,300;0,600;1,600&display=swap"
        rel="stylesheet">

    {{-- Datatable --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" />


</head>

<body class="dark">
    {{-- <div class="fakeLoader"></div> --}}

    {{-- <div class="container p-1">
        <div class="row justify-content-center align-items-center">
            <div class="col">
                <a href="#" style="text-decoration: none">
                    <h1>Appz</h1>
                </a>
            </div>
            <div class="col d-flex justify-content-end g-2">
                <div class="dropdown p-1">
                    <a class="justify-content-end" style="text-decoration: none;" type="button"
                        data-bs-toggle="dropdown">
                        <h5>{{ $user->name }}</h5>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Setting</a></li>
                        <li>
                            <hr>
                        </li>
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
        </div>
    </div> --}}

    @include('layouts.sidebar')

    <section id="content">
        <nav>
            <i class='bx bx-menu toggle-sidebar'></i>
            <span>Welcome back, {{ auth()->user()->name }}
            </span>
            <form action="#">
                {{-- <div class="form-group">
                    <input type="text" placeholder="Search...">
                    <i class='bx bx-search icon'></i>
                </div> --}}
            </form>
            {{-- <a href="" class="nav-link">
                <i class='bx bxs-bell icon'></i>
                <span class="badge">5</span>
            </a> --}}
            {{-- <a href="#" class="nav-link">
                <i class='bx bxs-message-square-dots icon'></i>
                <span class="badge">8</span>
            </a> --}}
            <input type="checkbox" id="mode" hidden>
            <label for="mode"></label>

            <div class="profile">
                <img src="{{ auth()->user()->photo ?? 'https://source.unsplash.com/200x200?person' }}" alt="">
                <ul class="profile-link">
                    <li><a href="{{ url('profile') }}"><i class='bx bxs-user-circle icon'></i> Profile</a></li>
                    {{-- <li><a href="{{ url('setting') }}"><i class='bx bxs-cog'></i> Settings</a></li> --}}
                    <li><a href="{{ url('logout') }}"><i class='bx bxs-log-out-circle'></i> Logout</a></li>
                </ul>
            </div>
            <span class="divider"></span>
        </nav>
        @yield('content')

    </section>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    {{-- Chart --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    {{-- Datatable --}}
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('/') }}/assets/js/datatable.js"></script>

    {{-- Sidebar JS --}}
    <script src="{{ url('/') }}/assets/js/sidebar.js"></script>

    {{-- Feather Icons --}}
    <script>
        feather.replace()
    </script>

    @yield('js')

    {{-- Fake Loader --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
    </script> --}}
</body>
