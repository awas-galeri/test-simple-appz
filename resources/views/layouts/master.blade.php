<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Appz | {{ $title }}</title>

    {{-- Bootstrap CSS --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    {{-- Feather Icons --}}
    <script src="https://unpkg.com/feather-icons"></script>

    {{-- My Style --}}
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/style.css">

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

    @include('layouts.navbar')

    @yield('content')

    {{-- Footer --}}
    <footer>
        <div class="sosmeds">
            <a href="#"><i data-feather="instagram"></i></a>
            <a href="#"><i data-feather="twitter"></i></a>
            <a href="#"><i data-feather="facebook"></i></a>
        </div>
        <div class="links">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#project">Project</a>
            <a href="#contact">Contact</a>
        </div>
        <div class="credit">
            <p>Created by <a href="#">Awas Galeri</a>. | &copy; 2023</p>
        </div>
    </footer>
    {{-- /Footer --}}


    {{-- Bootstrap JS --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> --}}

    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    {{-- Feather Icons --}}
    <script>
        feather.replace()
    </script>

    {{-- My Script --}}
    <script src="{{ url('/') }}/assets/js/script.js"></script>

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
